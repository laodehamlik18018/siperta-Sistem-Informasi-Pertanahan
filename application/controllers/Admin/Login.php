<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {

        parent::__construct();

        $this->load->model('m_login');
    }
    public function index()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/login');
    }
    function aksi_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $where = array(
            'email' => $email,
            'password' => md5($password)
        );
        $cek = $this->m_login->cek_login("user", $where)->num_rows();
        if ($cek > 0) {

            $data_session = array(

                'email' => $email,
                'password' => md5($password)
            );

            $this->session->set_userdata($data_session);
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Berhasil</strong>Anda Berhasil Login
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>'
            );
            redirect(base_url("Admin/Beranda"));
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Gagal</strong> Silahkan masukan email dan password dengan benar
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>'
            );
            redirect(base_url("Admin/login"));
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Admin/login'));
    }
}
