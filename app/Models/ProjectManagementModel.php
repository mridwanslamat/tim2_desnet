<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectManagementModel extends Model
{
    protected $table = 'projectmanagement';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['ProjectId', 'ProjectManagerId', 'ProjectTitle', 'ProjectSchedule', 'Feature', 'UATDate', 'ValidationStatus', 'ClientFeedbackStatus', 'RevisionNotes', 'UATHistoryId'];
}