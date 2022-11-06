<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_datatanah');
        $this->load->model('model_user');
        $this->load->model('m_informasi');


        if ($this->session->userdata('status') != "login") {
            redirect(base_url("Admin/login"));
        }
    }

    public function index()
    {
        $data['user'] = $this->model_user->tampil_data();
        $data['informasi'] = $this->m_informasi->tampil_data();
        $data['datatanah'] = $this->m_datatanah->tampil_data();
        $data['session_user'] = $this->db->get_where('user', [$this->session->userdata('id')])->row();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('admin/layout/footer');
    }
}
