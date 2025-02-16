<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    protected $table = 'uathistory';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['ProjectManager', 'ProjectManagerId', 'Title', 'ProjectId', 'Status', 'Document'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = '';
    protected $updatedField  = 'DateAdded';
}

