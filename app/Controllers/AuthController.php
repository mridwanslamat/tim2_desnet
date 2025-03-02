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
        $userModel = new UserModel();
    
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password'); 
        $password = sha1(sha1(md5($password)));
        
        $user = $userModel->where('username', $username)->first();
    
        if ($user) {
            // Periksa apakah password cocok
            if (strcmp($password, $user['password']) == 0) {
                // Simpan data user ke session
                $sessionData = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'level' => $user['level'], // 1 = Admin, 2 = Project Manager
                    'logged_in' => true,
                ];
                
                $session->set($sessionData);
    
                // Redirect berdasarkan level
                if ($user['level'] == 1) {
                    return redirect()->to('/admin/dashboard');
                } elseif ($user['level'] == 2) {
                    return redirect()->to('/project-manager/dashboard');
                }
            } else {
                // Password salah
                $session->setFlashdata('error', 'Invalid username or password');
                return redirect()->to('/');
            }
        } else {
            // Username tidak ditemukan
            $session->setFlashdata('error', 'Invalid username or password');
            return redirect()->to('/');
        }
    }    

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}