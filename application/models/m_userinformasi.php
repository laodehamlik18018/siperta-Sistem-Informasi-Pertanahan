<?php defined('BASEPATH') or exit('No direct script access allowed');

class m_userinformasi extends CI_Model
{

    public function tampil_data()
    {

        return $this->db->get('informasi')->result_array();
    }
    function get_berita_by_kode($kode)
    {
        $hsl = $this->db->query("SELECT * FROM informasi WHERE id_informasi='$kode'");
        return $hsl;
    }
    public function detail_informasi($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
