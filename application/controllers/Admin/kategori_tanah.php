<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_tanah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_kategori');

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("Admin/login"));
        }
    }
    public function index()
    {
        $data['session_user'] = $this->db->get_where('user', [$this->session->userdata('id')])->row();
        $data['kategori'] = $this->m_kategori->tampil_data();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/datatanah/kategori_tanah', $data);
        $this->load->view('admin/layout/footer');
    }
    function hapus_kategori($id)
    {
        $where = array('id_kategori' => $id);
        $this->m_kategori->hapus($where, 'kategori_tanah');
        redirect('admin/Kategori_tanah');
    }
    public function tambah_kategori()
    {
        $data['session_user'] = $this->db->get_where('user', [$this->session->userdata('id')])->row();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/datatanah/tambah_kategori', $data);
        $this->load->view('admin/layout/footer');
    }
    public function proses_tambah_kategori()
    {
        $status_tanah = $this->input->post('status_hak_tanah');
        $warna = $this->input->post('warna');
        $data = array(
            'status_hak_tanah' => $status_tanah,
            'warna' => $warna,
        );
        $this->m_kategori->input_data($data, 'kategori_tanah');

        redirect('admin/kategori_tanah');
    }
    public function edit_kategori($id)
    {
        $where = array('id_kategori' => $id);
        $data['kategori'] = $this->m_kategori->edit($where, 'kategori_tanah')->result();
        $data['session_user'] = $this->db->get_where('user', [$this->session->userdata('id')])->row();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/datatanah/edit_kategori', $data);
        $this->load->view('admin/layout/footer');
    }
    public function proses_edit_kategori()
    {
        $id = $this->input->post('id_kategori');
        $status_tanah = $this->input->post('status_hak_tanah');
        $warna = $this->input->post('warna');
        $data = array(
            'status_hak_tanah' => $status_tanah,
            'warna' => $warna,
        );
        $where = array(
            'id_kategori'  => $id
        );
        $this->m_kategori->update_data($where, $data, 'kategori_tanah');
        redirect('admin/Kategori_tanah');
    }
}
