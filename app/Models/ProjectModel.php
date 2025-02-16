<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['ProjectManager', 'ProjectManagerId', 'Title', 'ClientName', 'ProjectSchedule', 'UATHistoryId'];

    // Fungsi untuk memanggil procedure AddProject
    public function addProjectUsingProcedure($ProjectManager, $Title, $ClientName, $ProjectSchedule)
    {
        $db = \Config\Database::connect();
        $sql = "CALL AddProject(?, ?, ?, ?)";
        $db->query($sql, [$ProjectManager, $Title, $ClientName, $ProjectSchedule]);
    }

    public function searchProjects($keyword)
    {
        return $this->like('Title', $keyword)->findAll();
    }
}