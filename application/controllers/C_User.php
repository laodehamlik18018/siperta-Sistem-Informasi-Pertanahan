<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Two_Way.php';
class C_User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_userinformasi'); //Load site_model
        $this->load->model('m_datatanah'); //Load site_model
    }
    public function index()
    {
        $data['data_tanah']= $this->m_datatanah->tampil_data();
        $this->load->view('user/layout/header');
        $this->load->view('user/Data_tanah/index', $data);
        $this->load->view('user/layout/footer');
    }

    public function cari()
    {
  
        $algo = new Two_Way();
        $data_tanah = $this->m_datatanah->tampil_datatanah();
        $data['hasil'] = [];
        $data['search'] = strtolower($this->input->post('search'));
        foreach ($data_tanah as $key) {
            $time_start = microtime(true); 
            if ($algo->algoritma(substr(strtolower($key['no_hak']), 0, 1) . strtolower($key['no_hak']), substr($data['search'], 0, 1) . $data['search'])) {
                array_push($data['hasil'], $key);
            }
            if ($algo->algoritma(substr(strtolower($key['nama_pemilik_akhir']), 0, 1) . strtolower($key['nama_pemilik_akhir']), substr($data['search'], 0, 1) . $data['search'])) {
                array_push($data['hasil'], $key);
            }
            $time_end = microtime(true);
            $data['execution_time'] = ($time_end - $time_start);
        }
        $this->load->view('user/Data_tanah/hasil_cari', $data);
    }
    public function hasil_cari()
    {
        $data['hasil'] = [];

        // $this->load->view('user/layout/header');
        $this->load->view('user/Data_tanah/hasil_cari', $data);
        $this->load->view('user/layout/footer');
    }
    public function detail_cari($id = true)
    {
        $detail = $this->m_datatanah->detail_tanah($id);
        $data['detail'] = $detail;
        $this->load->view('user/layout/header');
        $this->load->view('user/Data_tanah/detail_cari', $data);
        $this->load->view('user/layout/footer');
    }
    public function informasi()
    {
        $data['informasi'] = $this->m_userinformasi->tampil_data();
        $this->load->view('user/layout/header');
        $this->load->view('user/informasi/index', $data);
        $this->load->view('user/layout/footer');
    }
    function Detail_informasi()
    {
        $kode = $this->uri->segment(3);
        $x['data'] = $this->m_userinformasi->get_berita_by_kode($kode);
        $this->load->view('user/layout/header');
        $this->load->view('user/informasi/detail_informasi', $x);
        $this->load->view('user/layout/footer');
    }
    function tentang()
    {
        $this->load->view('user/layout/header');
        $this->load->view('user/tentang');
        $this->load->view('user/layout/footer');
    }
}
