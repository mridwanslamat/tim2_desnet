<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'level'];

    public function getProjectManagers()
    {
        return $this->where('level', 2)->findAll();
    }
}