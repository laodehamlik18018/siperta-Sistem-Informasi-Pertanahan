<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_datatanah extends CI_Model
{
    public function tampil_datatanah()
    {
        return $this->db->get('data_tanah')->result_array();
    }
    public function tampil_data()
    {
        return $this->db->get('data_tanah')->result_array();
    }
    public function getdata_kategori()
    {
        $query = $this->db->query("SELECT * FROM kategori_tanah ORDER BY status_hak_tanah ASC");
        return $query->result();
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
    public function get_datatanah($limit, $star, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('no_hak', $keyword);
            $this->db->or_like('nama_pemilik_akhir', $keyword);
        }

        return $this->db->get('data_tanah', $limit, $star)->result_array();
    }
    public function countAlldatatanah()
    {
        return $this->db->get('data_tanah')->num_rows();
    }
    public function detail_tanah($id = null)
    {
        $query = $this->db->get_where('data_tanah', array('id_tanah' => $id))->row();
        return $query;
    }
}
