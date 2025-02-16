<?php

namespace App\Models;

use CodeIgniter\Model;

class FeatureUATModel extends Model
{
    protected $table = 'feature_uat';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['ProjectId', 'Feature', 'UATDate', 'ValidationStatus', 'ClientFeedbackStatus', 'RevisionNotes'];
}