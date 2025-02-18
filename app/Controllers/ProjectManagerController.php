<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ProjectModel;
use App\Models\HistoryModel;
use App\Models\FeatureUATModel;

use Dompdf\Dompdf;
use Dompdf\Options;

class ProjectManagerController extends BaseController
{
    protected $sessionData;
    protected $userModel;
    protected $projectModel;
    protected $historyModel;
    protected $featureModel;

    public function __construct()
    {
        $session = session();
        $this->sessionData = [
            'username' => $session->get('username'),
            'level'    => ($session->get('level') == 1) ? 'Admin' : 'Project Manager'
        ];

        // Inisialisasi model
        $this->userModel    = new UserModel();
        $this->projectModel = new ProjectModel();
        $this->historyModel = new HistoryModel();
        $this->featureModel = new FeatureUATModel();
    }

    public function index()
    {
        $userId = session()->get('id'); // Ambil ID user yang login
        $keyword = $this->request->getGet('search'); // Ambil kata kunci pencarian
    
        // Hitung total proyek yang diassign ke Project Manager
        $totalProjects = $this->projectModel->where('ProjectManagerId', $userId)->countAllResults();
    
        // Hitung proyek yang sudah "Finished"
        $finishedProjects = $this->historyModel
            ->where('ProjectManagerId', $userId)
            ->where('Status', 'Finish')
            ->countAllResults();
    
        // Ambil proyek dengan status "On Progress" sesuai pencarian
        if ($keyword) {
            $historyProjects = $this->historyModel
                ->where('ProjectManagerId', $userId)
                ->where('Status', 'On Progress')
                ->like('Title', $keyword) // Filter berdasarkan keyword di Title
                ->findAll();
        } else {
            $historyProjects = $this->historyModel
                ->where('ProjectManagerId', $userId)
                ->where('Status', 'On Progress')
                ->findAll();
        }
    
        // Kirim data ke view
        $data = [
            'historyprojects'  => $historyProjects,
            'totalProjects'    => $totalProjects,
            'finishedProjects' => $finishedProjects,
            'search'           => $keyword, // Kirimkan keyword ke view
        ];
    
        return view('projectmanager/dashboard', array_merge($this->sessionData ?? [], $data));
    }
    
    
    

    public function addNewProject()
    {
        $data['projectManagers'] = $this->userModel->getProjectManagers();
        return view('projectmanager/addnewproject', array_merge($this->sessionData ?? [], $data));
    }

    public function store()
    {
        $session = session();
    
        // Ambil data dari form
        $ProjectManager   = $this->request->getPost('ProjectManager');
        $Title           = $this->request->getPost('Title');
        $ClientCompany  = $this->request->getPost('ClientCompany');
        $ClientName      = $this->request->getPost('ClientName');
        $ProjectSchedule = $this->request->getPost('ProjectSchedule');
    
        // Validasi input
        if (empty($ProjectManager) || empty($Title) || empty($ClientCompany) || empty($ClientName) || empty($ProjectSchedule)) {
            $session->setFlashdata('error', 'Semua kolom harus diisi!');
            return redirect()->back()->withInput();
        }
    
        try {
            // Panggil procedure untuk menyimpan data
            $this->projectModel->addProjectUsingProcedure($ProjectManager, $Title, $ClientCompany, $ClientName, $ProjectSchedule);
            $session->setFlashdata('success', 'Proyek berhasil ditambahkan!');
        } catch (\Exception $e) {
            $session->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    
        return redirect()->back();
    }

    public function listProject()
    {
        $userId = session()->get('id'); // Ambil ID user yang login
        $keyword = $this->request->getGet('search'); // Ambil kata kunci pencarian
    
        if ($keyword) {
            $projects = $this->projectModel
                ->where('ProjectManagerId', $userId)
                ->like('Title', $keyword)
                ->findAll();
        } else {
            $projects = $this->projectModel
                ->where('ProjectManagerId', $userId)
                ->findAll();
        }
    
        // Kirimkan nilai pencarian ke view
        $data = [
            'projects' => $projects,
            'search'   => $keyword, // Tambahkan ini agar bisa digunakan di view
        ];
    
        return view('projectmanager/listproject', array_merge($this->sessionData ?? [], $data));
    }
    
    

    public function manageProject($projectId)
    {
        $project = $this->projectModel->find($projectId);

        if (!$project) {
            return redirect()->to('project-manager/listproject')->with('error', 'Project not found!');
        }

        $features = $this->featureModel->where('ProjectId', $projectId)->findAll();

        return view('projectmanager/manageproject', array_merge($this->sessionData ?? [], [
            'project' => $project,
            'features' => $features
        ]));
    }

    // Method untuk menyimpan fitur
    public function saveFeatures()
    {
        $session   = session();
        $projectId = $this->request->getPost('ProjectId');
        $features  = $this->request->getPost('Feature'); // Diambil dari input name="Feature[]" pada manageproject.php

        // Pastikan fitur dikirim sebagai array
        if (!is_array($features) || empty($features)) {
            $session->setFlashdata('error', 'Fitur tidak boleh kosong!');
            return redirect()->back();
        }

        try {
            foreach ($features as $feature) {
                $this->featureModel->save([
                    'ProjectId' => $projectId,
                    'Feature'   => $feature
                ]);
            }

            $session->setFlashdata('success', 'Fitur berhasil disimpan!');
        } catch (\Exception $e) {
            $session->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->to('/project-manager/manageproject/feature-uat/' . $projectId);
    }

    // Method untuk mengupdate fitur tersimpan
    public function updateFeature($id)
    {
        $feature = $this->request->getPost('Feature');

        if (empty($feature)) {
            return redirect()->back()->with('error', 'Fitur tidak boleh kosong!');
        }

        $this->featureModel->update($id, ['Feature' => $feature]);
        return redirect()->back()->with('success', 'Fitur berhasil diupdate!');
    }

    // Method untuk menghapus fitur tersimpan
    public function deleteFeature($id)
    {
        $this->featureModel->delete($id);
        return redirect()->back()->with('success', 'Fitur berhasil dihapus!');
    }

    // Method untuk menampilkan dan mengupdate fitur UAT yang sudah disimpan
    public function featureUAT($projectId = null)
    {
        if($this->request->getMethod() == 'PUT') {
            $features = $this->request->getPost();
            foreach ($features['FeatureId'] as $key => $featureId) {
                $this->featureModel->update($featureId, [
                    'UATDate'            => $features['UATDate'][$key],
                    'ValidationStatus'   => $features['ValidationStatus'][$key],
                    'ClientFeedbackStatus'=> $features['ClientFeedbackStatus'][$key],
                    'RevisionNotes'       => $features['RevisionNotes'][$key]
                ]);
            }
            return redirect()->back()->with('success', 'Data UAT berhasil disimpan!');
        }
        
        // Ambil data proyek dan fitur UAT berdasarkan ProjectId
        $data['features'] = $this->featureModel->where('ProjectId', $projectId)->findAll();

        // Ambil Informasi Project
        $data['project'] = $this->projectModel->find($projectId);

        if (!$data['project']) {
            return redirect()->back()->with('error', 'Project tidak ditemukan.');
        }
        
        return view('projectmanager/featureuat', array_merge($this->sessionData ?? [], $data));
    }

    // Method untuk menampilkan history project
    public function historyProject()
    {
        $userId = session()->get('id'); // Ambil ID user yang login
        $keyword = $this->request->getGet('search'); // Ambil kata kunci pencarian
    
        if ($keyword) {
            $historyProjects = $this->historyModel
                ->where('ProjectManagerId', $userId)
                ->like('Title', $keyword)
                ->findAll();
        } else {
            $historyProjects = $this->historyModel
                ->where('ProjectManagerId', $userId)
                ->findAll();
        }
    
        $data = [
            'historyprojects' => $historyProjects,
            'search'          => $keyword, // Kirimkan keyword ke view
        ];
    
        return view('projectmanager/history', array_merge($this->sessionData ?? [], $data));
    }
    
    // Method untuk mengupdate history project
    public function updateHistoryProject($Id = null)
    {
        if ($this->request->getMethod() == 'PUT') {
            $Id = $this->request->getPost('Id');
            
            $pdfFile = $this->request->getFile('Document');
            $uploadPath = WRITEPATH . 'uploads';

            $history = $this->historyModel->find($Id);
            if ($pdfFile && $pdfFile->isValid()) {
                $newName = $history['Title'] . '_' . $history['DateAdded'] . '.pdf';
                $pdfFile->move($uploadPath, $newName);
            }

            $this->historyModel->update($Id, [
                'Status'        => $this->request->getPost('ProjectStatus'),
                'Document'      => $newName ?? $history['Document']
            ]);

            return redirect()->to('/project-manager/history')->with('success', 'Data berhasil diupdate!');
        }
        
        $data['history'] = $this->historyModel->find($Id);
        return view('projectmanager/updateproject', array_merge($this->sessionData ?? [], $data));
    }

    // Method untuk download file
    public function download($Id)
{
    $history = $this->historyModel->find($Id);

    if (!$history || empty($history['Document'])) {
        return redirect()->back()->with('error', 'Dokumen tidak ditemukan.');
    }

    $filePath = WRITEPATH . 'uploads/' . $history['Document'];

    if (!file_exists($filePath)) {
        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }

    return $this->response->download($filePath, null)->setFileName($history['Document']);
}

    // Method untuk generate UAT
    public function generatePDF($projectId)
    {
        // Ambil data proyek dan fitur UAT berdasarkan ID proyek
        $project = $this->projectModel->find($projectId);
        $features = $this->featureModel->where('ProjectId', $projectId)->findAll();

        if (!$project) {
            return redirect()->to('/project-manager/listproject')->with('error', 'Project not found!');
        }

        // Load view ke dalam variabel
        $data = [
            'project' => $project,
            'features' => $features
        ];

        $html = view('projectmanager/pdf_view', $data);

        // Konfigurasi DomPDF
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf = new Dompdf($options);
        
        // Load HTML ke DomPDF
        $dompdf->loadHtml($html);
        
        // Set ukuran kertas dan orientasi
        $dompdf->setPaper('letter', 'landscape');
        
        // Render PDF
        $dompdf->render();
        
        // Download PDF
        $dompdf->stream('Project_UAT_Report.pdf', ['Attachment' => 0]); // 0 = tampil di browser, 1 = langsung download
    }
}