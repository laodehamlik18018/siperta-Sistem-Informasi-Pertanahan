<?php
class m_user extends CI_Model
{

    private $_table = "user";

    public $id;
    public $nama;
    public $jabatan;
    public $email;
    public $password;
    public $foto;


    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],

            [
                'field' => 'jabatan',
                'label' => 'jabatan',
                'rules' => 'required'
            ],

            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required'
            ],

            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_file',
                'label' => 'nama_file',
                'rules' => 'required'
            ]
        ];
    }

    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }
    public function upload()
    {
        $config['upload_path'] = './upload/user';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config); // Load konfigurasi uploadnya
        if ($this->upload->do_upload('input_gambar')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    // Fungsi untuk menyimpan data ke database
    public function save($upload)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'foto' => $upload['file']['file_name'],
            'ukuran_file' => $upload['file']['file_size'],
            'tipe_file' => $upload['file']['file_type']
        );

        $this->db->insert('user', $data);
    }
    public function hapus($table, $where)
    {
        $res = $this->db->delete($where, $table); // Kode ini digunakan untuk menghapus record yang sudah ada
        return $res;
    }
    public function getById($id)
    {
        return $this->db->get_where('user', array("id" => $id))->row();
    }

    public function update_yes($id, $data = [])
    {
        $ubah = array(
            'nama'  => $data['nama'],
            'jabatan'  => $data['jabatan'],
            'email'  => $data['email'],
            'password'  => $data['password'],
            'nama_file'  => $data['nama_file'],

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
            'password'  => $data['password']
        );

        $this->db->where('id', $id);
        $this->db->update('user', $ubah);
    }
}
