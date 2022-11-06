<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Data_Tanah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_datatanah');
        $this->load->model('model_user');

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("Admin/login"));
        }
    }
    public function index()
    {
        //load pagination
        $this->load->library('pagination');
        //searching

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');;
        }
        //config
        $time_start = microtime(true);
        $this->db->like('no_hak', $data['keyword']);
        $this->db->or_like('nama_pemilik_akhir', $data['keyword']);
        $this->db->from('data_tanah');
        $config['total_rows'] = $this->db->count_all_results();
        $time_end = microtime(true);
        $data['execution_time'] = ($time_end - $time_start);
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(4);
        $data['data_tanah'] = $this->m_datatanah->get_datatanah($config['per_page'], $data['start'], $data['keyword']);
        $data['session_user'] = $this->db->get_where('user', [$this->session->userdata('id')])->row();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/datatanah/index', $data);
        $this->load->view('admin/layout/footer');
        // $this->load->view('admin/layout/header');
        // $this->load->view('admin/layout/navbar', $data);
        // $this->load->view('admin/layout/sidebar', $data);
        // $this->load->view('admin/datatanah/datatanah', $data);
        // $this->load->view('admin/layout/footer');
    }
    public function tambah_tanah()
    {
        $data['kategori'] = $this->m_datatanah->getdata_kategori();
        $data['session_user'] = $this->db->get_where('user', [$this->session->userdata('id')])->row();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/datatanah/tambah_data_tanah', $data);
        $this->load->view('admin/layout/footer');
    }
    public function proses_tambah_tanah()
    {
        $nama = $this->input->post('nama_pemilik_awal');
        $nama_akhir = $this->input->post('nama_pemilik_akhir');
        $no_hak = $this->input->post('no_hak');
        $surat_ukur = $this->input->post('surat_ukur');
        $nib = $this->input->post('nib');
        $luastanah = $this->input->post('luas_tanah');
        $statustanah = $this->input->post('status_hak_tanah');
        $statussertifikat = $this->input->post('status_sertifikat');
        $statussengketa = $this->input->post('status_sengketa');
        $warna_tanah = $this->input->post('warna_tanah');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $keterangan = $this->input->post('keterangan');
        $polygon = $_FILES['polygon'];
        if ($polygon = '') {
        } else {
            $config['upload_path']  = './upload/polygon';
            $config['allowed_types']   = '*';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('polygon')) {

                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Data polygon tidak Ditambahkan Ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>'
                );
                $data = array(
                    'nama_pemilik_awal' => $nama,
                    'nama_pemilik_akhir' => $nama_akhir,
                    'no_hak' => $no_hak,
                    'surat_ukur' => $surat_ukur,
                    'nib' => $nib,
                    'luas_tanah' => $luastanah,
                    'status_hak_tanah' => $statustanah,
                    'status_sertifikat' => $statussertifikat,
                    'status_sengketa' => $statussengketa,
                    'warna_tanah' => $warna_tanah,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'keterangan' => $keterangan,
                );
                $this->m_datatanah->input_data($data, 'data_tanah');

                redirect('admin/C_Data_Tanah');
            } else {

                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil Ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>'
                );
                $polygon = $this->upload->data('file_name');
            }
        }
        $data = array(
            'nama_pemilik_awal' => $nama,
            'nama_pemilik_akhir' => $nama_akhir,
            'no_hak' => $no_hak,
            'surat_ukur' => $surat_ukur,
            'nib' => $nib,
            'luas_tanah' => $luastanah,
            'status_hak_tanah' => $statustanah,
            'status_sertifikat' => $statussertifikat,
            'status_sengketa' => $statussengketa,
            'warna_tanah' => $warna_tanah,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'polygon' => $polygon,
            'keterangan' => $keterangan,

        );
        $this->m_datatanah->input_data($data, 'data_tanah');

        redirect('admin/C_Data_Tanah');
    }
    function hapus_data_tanah($id)
    {
        $where = array('id_tanah' => $id);
        $this->m_datatanah->hapus($where, 'data_tanah');
        redirect('admin/C_Data_Tanah');
    }
    public function edit_data_tanah($id)
    {

        $where = array('id_tanah' => $id);
        $data['kategori'] = $this->m_datatanah->getdata_kategori();
        $data['data_tanah'] = $this->m_datatanah->edit($where, 'data_tanah')->result();
        $data['session_user'] = $this->db->get_where('user', [$this->session->userdata('id')])->row();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/datatanah/edit_data_tanah', $data);
        $this->load->view('admin/layout/footer');
    }
    public function proses_edit_data_tanah()
    {
        $id = $this->input->post('id_tanah');
        $nama = $this->input->post('nama_pemilik_awal');
        $nama_akhir = $this->input->post('nama_pemilik_akhir');
        $no_hak = $this->input->post('no_hak');
        $surat_ukur = $this->input->post('surat_ukur');
        $nib = $this->input->post('nib');
        $luastanah = $this->input->post('luas_tanah');
        $statustanah = $this->input->post('status_hak_tanah');
        $statussertifikat = $this->input->post('status_sertifikat');
        $statussengketa = $this->input->post('status_sengketa');
        $latitude = $this->input->post('latitude');
        $longitude = $this->input->post('longitude');
        $warna_tanah = $this->input->post('warna_tanah');
        $keterangan = $this->input->post('keterangan');
        $polygon = $_FILES['polygon'];
        if ($polygon = '') {
        } else {
            $config['upload_path']  = './upload/polygon';
            $config['allowed_types']   = '*';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('polygon')) {
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil  DiUpdate</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>'
                );
                $data = array(
                    'nama_pemilik_awal' => $nama,
                    'nama_pemilik_akhir' => $nama_akhir,
                    'no_hak' => $no_hak,
                    'surat_ukur' => $surat_ukur,
                    'nib' => $nib,
                    'luas_tanah' => $luastanah,
                    'status_hak_tanah' => $statustanah,
                    'status_sertifikat' => $statussertifikat,
                    'status_sengketa' => $statussengketa,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'warna_tanah' => $warna_tanah,
                    'keterangan' => $keterangan,

                );
                $where = array(
                    'id_tanah'  => $id
                );
                $this->m_datatanah->update_data($where, $data, 'data_tanah');
                redirect('admin/C_Data_Tanah');
            } else {

                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil Diupdate</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>'
                );
                $polygon = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_pemilik_awal' => $nama,
            'nama_pemilik_akhir' => $nama_akhir,
            'no_hak' => $no_hak,
            'surat_ukur' => $surat_ukur,
            'nib' => $nib,
            'luas_tanah' => $luastanah,
            'status_hak_tanah' => $statustanah,
            'status_sertifikat' => $statussertifikat,
            'status_sengketa' => $statussengketa,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'warna_tanah' => $warna_tanah,
            'keterangan' => $keterangan,
            'polygon' => $polygon,

        );
        $where = array(
            'id_tanah'  => $id
        );
        $this->m_datatanah->update_data($where, $data, 'data_tanah');

        redirect('admin/C_Data_Tanah');
    }
    public function detail_data_tanah($id = true)
    {
        $detail = $this->m_datatanah->detail_tanah($id);
        $data['detail'] = $detail;
        $data['session_user'] = $this->db->get_where('user', [$this->session->userdata('id')])->row();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/datatanah/detail_data_tanah', $data);
        $this->load->view('admin/layout/footer');
    }
}
