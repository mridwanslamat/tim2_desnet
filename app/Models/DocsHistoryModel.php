<?php

namespace App\Models;

use CodeIgniter\Model;

class DocsHistoryModel extends Model
{
    protected $table = 'document_history';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['ProjectId', 'Title', 'Document'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'DateAdded';
    protected $updatedField  = 'DateAdded';
}
