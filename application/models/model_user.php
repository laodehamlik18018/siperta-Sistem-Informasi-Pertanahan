<?php defined('BASEPATH') or exit('No direct script access allowed');

class model_user extends CI_Model
{
    public function tampil_data()
    {

        return $this->db->get('user')->result_array();
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

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function update_yes($id, $data = [])
    {
        $ubah = array(
            'nama'  => $data['nama'],
            'jabatan'  => $data['jabatan'],
            'email'  => $data['email'],
            'password'  => $data['password'],
            'foto'  => $data['foto'],
        );

        $this->db->where('id', $id);
        $this->db->update('user', $ubah);
    }

    public function update_no($id, $data = [])
    {
        $ubah = array(
            'nama'  => $data['nama'],
            'jabatan'  => $data['jabatan'],
            'email'  => $data['email'],
            'password'  => $data['password'],

        );

        $this->db->where('id', $id);
        $this->db->update('user', $ubah);
    }
}
