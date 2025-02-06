<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $session = session();
        $data['users'] = $this->userModel->getUser();

        // Ambil data dari session
        $data['username'] = $session->get('username');
        $data['level'] = ($session->get('level') == 1) ? 'Admin' : 'Project Manager';

        return view('admin/dashboard', $data);
    }
}