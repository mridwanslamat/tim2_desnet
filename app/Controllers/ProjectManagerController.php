<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ProjectModel;
use App\Models\HistoryModel;

class ProjectManagerController extends BaseController
{
    protected $sessionData;

    public function __construct()
    {
        $session = session();
        $this->sessionData = [
            'username' => $session->get('username'),
            'level' => ($session->get('level') == 1) ? 'Admin' : 'Project Manager'
        ];
    }

    public function index()
    {
        return view('projectmanager/dashboard', $this->sessionData);
    }

    public function addNewProject()
    {
        $userModel = new UserModel();
        $data['projectManagers'] = $userModel->getProjectManagers();

        // Gabungkan dengan sessionData untuk dikirim ke view
        $viewData = array_merge($this->sessionData ?? [], $data);
        
        return view('projectmanager/addnewproject', $viewData);
    }

    public function store()
    {
        // Proses simpan data project baru
        $session = session();
        $projectModel = new ProjectModel();

        // Ambil data dari form
        $data = [
            'ProjectManager' => $this->request->getPost('ProjectManager'),
            'Title' => $this->request->getPost('Title'),
            'ClientName' => $this->request->getPost('ClientName'),
            'ProjectSchedule' => $this->request->getPost('ProjectSchedule')
        ];

        // Cek apakah ada field yang kosong
        if (empty($data['ProjectManager']) || empty($data['Title']) || empty($data['ClientName']) || empty($data['ProjectSchedule'])) {
            $session->setFlashdata('error', 'Semua kolom harus diisi!');
            return redirect()->back()->withInput();
        }

        // Simpan ke database
        $projectModel->insert($data);

        // Set flash message sukses
        $session->setFlashdata('success', 'Proyek berhasil ditambahkan!');
        return redirect()->back();
    }

    public function listProject()
    {
        $session = session();
        $userId = $session->get('id'); // Ambil ID user yang login

        // Query untuk mengambil data project yang dikelola oleh PM yang login
        $manageprojectModel = new ProjectModel();
        $data['projects'] = $manageprojectModel->where('ProjectManagerId', $userId)->findAll();

        // Gabungkan dengan sessionData untuk dikirim ke view
        $viewData = array_merge($this->sessionData ?? [], $data);
        
        return view('projectmanager/listproject', $viewData);
    }

    public function manageProject()
    {
        // $session = session();
        // $userId = $session->get('id'); // Ambil ID user yang login

        // // Query untuk mengambil data project yang dikelola oleh PM yang login
        // $manageprojectModel = new ProjectManagementModel();
        // $data['projects'] = $manageprojectModel->where('ProjectManagerId', $userId)->findAll();

        // // Gabungkan dengan sessionData untuk dikirim ke view
        // $viewData = array_merge($this->sessionData ?? [], $data);
        
        return view('projectmanager/manageproject', $this->sessionData);
    }

    public function historyProject()
    {
        $session = session();
        $userId = $session->get('id'); // Ambil ID user yang login

        // Query untuk mengambil data history project yang dikelola oleh PM yang login
        $historyModel = new HistoryModel();
        $data['historyprojects'] = $historyModel->where('ProjectManagerId', $userId)->findAll();

        // Gabungkan dengan sessionData untuk dikirim ke view
        $viewData = array_merge($this->sessionData ?? [], $data);
        
        return view('projectmanager/history', $viewData);
    }
}