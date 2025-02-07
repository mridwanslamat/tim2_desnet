<?php

namespace App\Controllers;

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
        return view('projectmanager/listproject', $this->sessionData);
    }
}