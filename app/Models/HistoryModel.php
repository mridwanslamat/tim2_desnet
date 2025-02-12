<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    protected $table = 'uathistory';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['ProjectManager', 'ProjectManagerId', 'Title', 'ProjectId', 'DateAdded', 'Status','Document'];
}