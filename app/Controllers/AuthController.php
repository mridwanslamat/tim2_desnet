<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login'); // Tampilkan halaman login
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getVar('username');
        $password = ($this->request->getVar('password')); // Pastikan hashing sama dengan yang di database
        
        $user = $model->where('username', $username)->where('password', $password)->first();

        if ($user) {
            $session->set([
                'id' => $user['id'],
                'username' => $user['username'],
                'level' => $user['level'],
                'logged_in' => true
            ]);

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
