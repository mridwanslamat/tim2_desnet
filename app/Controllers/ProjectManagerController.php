<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ProjectManagementModel;

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

    public function listProject()
    {
        $session = session();
        $userId = $session->get('id'); // Ambil ID user yang login

        // Query untuk mengambil data project yang dikelola oleh PM yang login
        $manageprojectModel = new ProjectManagementModel();
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
}