<?php

class PenggajianModel extends CI_Model
{
    public function getData($table)
    {
        return $this->db->get($table);
    }
    public function insertData($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    public function deleteData($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function insert_batch($table = null, $data=array()){
        $jumlah = count($data);
        if($jumlah > 0){
            $this->db->insert_batch($table, $data);
        }
    }
    // public function get_where($data){
    //     $query = $this->db->get_where('data_kehadiran', ['bulan' => $data]);
    //     return $query->row();
    // }
}
?>