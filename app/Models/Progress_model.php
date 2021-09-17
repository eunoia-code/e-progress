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
}
