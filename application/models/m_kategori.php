<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_kategori extends CI_Model
{
    public function tampil_data()
    {

        return $this->db->get('kategori_tanah')->result_array();
    }
    public function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function hapus($table, $where)
    {
        $res = $this->db->delete($where, $table); // Kode ini digunakan untuk menghapus record yang sudah ada
        return $res;
    }
    public function edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

}