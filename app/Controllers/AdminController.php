<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ProjectModel;
use App\Models\HistoryModel;

class AdminController extends BaseController
{
    protected $session;
    protected $sessionData;
    protected $userModel;
    protected $projectModel;
    protected $historyModel;

    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
        $this->projectModel = new ProjectModel();
        $this->historyModel = new HistoryModel();

        $this->sessionData = [
            'username' => $this->session->get('username'),
            'level' => ($this->session->get('level') == 1) ? 'Admin' : 'Project Manager'
        ];
    }

    public function index()
    {
        $keyword = $this->request->getGet('search'); // Ambil kata kunci pencarian
    
        // Hitung total proyek yang diassign ke Project Manager
        $totalProjects = $this->projectModel->countAllResults();
    
        // Hitung proyek yang sudah "Finished"
        $finishedProjects = $this->historyModel
            ->where('Status', 'Finish')
            ->countAllResults();
    
        // Ambil proyek dengan status "On Progress" sesuai pencarian
        if ($keyword) {
            $historyProjects = $this->historyModel
                ->where('Status', 'On Progress')
                ->like('Title', $keyword) // Filter berdasarkan keyword di Title
                ->findAll();
        } else {
            $historyProjects = $this->historyModel
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
    
        return view('admin/dashboard', array_merge($this->sessionData ?? [], $data));
    }

    public function addNewProject()
    {
        $data['projectManagers'] = $this->userModel->getProjectManagers();
        
        return view('admin/addnewproject', array_merge($this->sessionData ?? [], $data));;
    }

    public function store()
    {
        // Ambil data dari form
        $ProjectManager = $this->request->getPost('ProjectManager');
        $Title = $this->request->getPost('Title');
        $ClientName = $this->request->getPost('ClientName');
        $ProjectSchedule = $this->request->getPost('ProjectSchedule');

        // Validasi input
        if (empty($ProjectManager) || empty($Title) || empty($ClientName) || empty($ProjectSchedule)) {
            $this->session->setFlashdata('error', 'Semua kolom harus diisi!');
            return redirect()->back()->withInput();
        }

        try {
            // Panggil procedure untuk menyimpan data
            $this->projectModel->addProjectUsingProcedure($ProjectManager, $Title, $ClientName, $ProjectSchedule);
            
            // Set flash message sukses
            $this->session->setFlashdata('success', 'Proyek berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Set flash message error jika terjadi kesalahan
            $this->session->setFlashdata('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

        return redirect()->back();
    }

    public function historyProject()
    {
        $keyword = $this->request->getGet('search'); // Ambil kata kunci pencarian
    
        if ($keyword) {
            $historyProjects = $this->historyModel
                ->like('Title', $keyword)
                ->findAll();
        } else {
            $historyProjects = $this->historyModel
                ->findAll();
        }
    
        $data = [
            'historyprojects' => $historyProjects,
            'search'          => $keyword, // Kirimkan keyword ke view
        ];
    
        return view('admin/history', array_merge($this->sessionData ?? [], $data));
    }

    public function updateHistoryProject($Id = null)
    {   
        if ($this->request->getMethod() == 'PUT') {
            $this->historyModel->update($this->request->getPost('Id'), [
                'Status'        => $this->request->getPost('ProjectStatus')
            ]);
            return redirect()->to('/admin/history')->with('success', 'Data berhasil diupdate!');
        }
        
        $data['history'] = $this->historyModel->find($Id);
        return view('admin/updateproject', array_merge($this->sessionData ?? [], $data));
    }
}