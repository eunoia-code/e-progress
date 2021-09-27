<?php

namespace App\Models;

use CodeIgniter\Model;

class Upload_model extends Model
{
    protected $table = "tb_file";
    protected $primaryKey = 'id_file';


    public function getById($id)
    {
        return $this->getWhere([$this->primaryKey => $id]);
    }

    public function getFile($id)
    {
        return $this->getWhere(['id_project' => $id]);
    }

    public function insertFile($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function deleteFile($id)
    {
        $query = $this->db->table($this->table)->delete(array($this->primaryKey => $id));
        return $query;
    }
}
