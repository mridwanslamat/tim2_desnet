<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login'); // Tampilkan halaman login
        // return view('projectmanager/listproject');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password'); // Pastikan hashing sama dengan yang di database
        
        $user = $model->where('username', $username)->first();

        if ($user) {
            if ($password == $user['password']) {
            // Simpan data user ke session
            $sessionData = [
                'id' => $user['id'],
                'username' => $user['username'],
                'level' => $user['level'], // 1 = Admin, 2 = Project Manager
                'logged_in' => true
            ];
            
            $session->set($sessionData);
            }

            
            // Redirect berdasarkan level
            if ($user['level'] == 1) {
                return redirect()->to('/admin');
            } elseif ($user['level'] == 2) {
                return redirect()->to('/project-manager');
            }
        } else {
            $session->setFlashdata('error', 'Invalid username or password');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}