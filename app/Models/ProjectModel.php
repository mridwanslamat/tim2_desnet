<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'project'; // Nama tabel di database
    protected $primaryKey = 'Id'; // Primary key
    protected $allowedFields = ['ProjectManager', 'ProjectTitle', 'ClientName']; // Kolom yang bisa diisi
}