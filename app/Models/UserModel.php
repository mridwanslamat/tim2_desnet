<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user'; // Sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'level', 'password'];

    public function getUser()
    {
        return $this->findAll(); // Mengambil semua data dari tabel users
    }
}
