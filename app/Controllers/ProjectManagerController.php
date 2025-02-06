<?php

namespace App\Controllers;

class ProjectManagerController extends BaseController
{
    public function index()
    {
        $session = session();

        //Ambil data dari session
        $data['username'] = $session->get('username');
        $data['level'] = ($session->get('level') == 1) ? 'Admin' : 'Project Manager';

        return view('projectmanager/dashboard', $data);
    }
}