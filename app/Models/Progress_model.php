<?php

namespace App\Models;

use CodeIgniter\Model;

class Progress_model extends Model
{
    protected $table = "tb_project";
    protected $primaryKey = 'id_project';


    public function getProject($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere([$this->primaryKey => $id]);
        }
    }

    public function addProject($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateProject($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array($this->primaryKey => $id));
        return $query;
    }

    public function deleteProject($id)
    {
        $query = $this->db->table($this->table)->delete(array($this->primaryKey => $id));
        return $query;
    }

    public function countProject()
    {
        $query = $this->db->table($this->table)->countAllResults();
        return $query;
    }

    public function countOngoingProject()
    {
        $query = $this->db->table($this->table)->where('status', 0)->countAllResults();
        return $query;
    }

    public function countCompletedProject()
    {
        $query = $this->db->table($this->table)->where('status', 1)->countAllResults();
        return $query;
    }

    public function countTerminatedProject()
    {
        $query = $this->db->table($this->table)->where('status', 2)->countAllResults();
        return $query;
    }
}
