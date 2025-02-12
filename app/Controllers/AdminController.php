<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ProjectModel;
use App\Models\HistoryModel;


class AdminController extends BaseController
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
        return view('admin/dashboard', $this->sessionData);
    }

    public function addNewProject()
    {
        $userModel = new UserModel();
        $data['projectManagers'] = $userModel->getProjectManagers();

        // Gabungkan dengan sessionData untuk dikirim ke view
        $viewData = array_merge($this->sessionData ?? [], $data);
        
        return view('admin/addnewproject', $viewData);
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

    public function historyProject()
    {
        $session = session();

        // Query untuk mengambil data history project yang dikelola oleh PM yang login
        $historyModel = new HistoryModel();
        $data['historyprojects'] = $historyModel->findAll();

        // Gabungkan dengan sessionData untuk dikirim ke view
        $viewData = array_merge($this->sessionData ?? [], $data);
        
        return view('admin/history', $viewData);
    }

    public function updateHistoryProject()
    {
        $session = session();

        // // Query untuk mengambil data history project yang dikelola oleh PM yang login
        // $historyModel = new HistoryModel();
        // $data['historyprojects'] = $historyModel->findAll();

        // // Gabungkan dengan sessionData untuk dikirim ke view
        // $viewData = array_merge($this->sessionData ?? [], $data);
        
        return view('admin/updateproject', $this->sessionData);
    }
}
