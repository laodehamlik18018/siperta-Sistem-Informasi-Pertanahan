<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Data_Informasi extends CI_Controller
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
        $this->db->like('judul_informasi', $data['keyword']);
        $this->db->from('informasi');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4);
        $data['informasi'] = $this->m_informasi->get_datainformasi($config['per_page'], $data['start'], $data['keyword']);
        $data['session_user'] = $this->db->get_where('user', [$this->session->userdata('id')])->row();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/informasi/index', $data);
        $this->load->view('admin/layout/footer');
    }
    public function tambah_data_informasi()
    {
        $data['session_user'] = $this->db->get_where('user', [$this->session->userdata('id')])->row();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/informasi/tambah_informasi', $data);
        $this->load->view('admin/layout/footer');
    }
    public function proses_tambah_data_informasi()
    {
        $judul_informasi = $this->input->post('judul_informasi');
        $isi_informasi = $this->input->post('isi_informasi');
        // $tgl_informasi = $this->input->post('tgl_informasi');
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']  = './upload/informasi';
            $config['allowed_types']   = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Data Foto tidak Di Tambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>'
                );
                redirect('admin/C_Data_Informasi/tambah_data_informasi');
            } else {

                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil Ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>'
                );
                $foto = $this->upload->data('file_name');
            }
        }

        $data = array(
            'judul_informasi' => $judul_informasi,
            'isi_informasi' => $isi_informasi,
            'foto'     => $foto,
            // 'tgl_informasi'     => $tgl_informasi,

        );
        $this->m_informasi->input_data($data, 'informasi');

        redirect('admin/c_Data_Informasi');
    }
    function hapus_data_informasi($id)
    {
        $where = array('id_informasi' => $id);
        $this->m_informasi->hapus($where, 'informasi');
        redirect('admin/C_Data_Informasi');
    }
    public function edit_data_informasi($id)
    {
        $where = array('id_informasi' => $id);
        $data['informasi'] = $this->m_informasi->edit_data($where, 'informasi')->result();
        $data['session_user'] = $this->db->get_where('user', [$this->session->userdata('id')])->row();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/informasi/edit_data_informasi', $data);
        $this->load->view('admin/layout/footer');
    }
    public function proses_edit_data_informasi()
    {
        $config['upload_path'] = './upload/informasi/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if (!empty($_FILES['foto']['name'])) {
            if (!$this->upload->do_upload('foto')) {
                $this->upload->display_errors();
            } else {
                $id = $this->input->post('id_informasi');
                $foto = $this->input->post('foto');
                unlink("./upload/informasi/" . $foto);
                $data = [
                    'judul_informasi' => $this->input->post('judul_informasi'),
                    'foto' => $this->upload->data('file_name'),
                    // 'tgl_informasi' => $this->input->post('tgl_informasi'),
                    'isi_informasi' => $this->input->post('isi_informasi'),
                ];
                $this->m_informasi->update_yes($id, $data);
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Data Berhasil di Update</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>'
                );
                redirect('admin/C_Data_Informasi');
            }
        } else {
            $id = $this->input->post('id_informasi');
            $data = [
                'judul_informasi' => $this->input->post('judul_informasi'),
                'isi_informasi' => $this->input->post('isi_informasi'),

            ];
            $this->m_informasi->update_no($id, $data);
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil di Update</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>'
            );
            redirect('admin/C_Data_Informasi');
        }
    }
    public function detail_data_informasi($id = true)
    {
        $detail = $this->m_informasi->detail_informasi($id);
        $data['detail'] = $detail;
        $data['session_user'] = $this->db->get_where('user', [$this->session->userdata('id')])->row();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/layout/topbar', $data);
        $this->load->view('admin/informasi/Detail_Informasi', $data);
        $this->load->view('admin/layout/footer');
    }
}
