<?php

namespace App\Models;

use CodeIgniter\Model;

class Member_model extends Model
{
    protected $table = "tb_member";
    protected $primaryKey = 'id_member';


    public function getMember($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere([$this->primaryKey => $id]);
        }
    }

    public function addMember($data)
    {
        $this->db->table($this->table)->insert($data);
        return $this->db->insertID();
    }

    public function updateMember($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array($this->primaryKey => $id));
        return $query;
    }

    public function deleteMember($id)
    {
        $query = $this->db->table($this->table)->delete(array($this->primaryKey => $id));
        return $query;
    }

    public function countMember()
    {
        $query = $this->db->table($this->table)->countAllResults();
        return $query;
    }

    public function countOngoingMember()
    {
        $query = $this->db->table($this->table)->where('status', 0)->countAllResults();
        return $query;
    }

    public function countCompletedMember()
    {
        $query = $this->db->table($this->table)->where('status', 1)->countAllResults();
        return $query;
    }

    public function countTerminatedMember()
    {
        $query = $this->db->table($this->table)->where('status', 2)->countAllResults();
        return $query;
    }
}
