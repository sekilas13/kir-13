<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tab extends CI_Controller
{
    private $_script;

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->_script = [
            [
                'src' => 'http://localhost/cdn/jquery/jquery.js'
            ],
            [
                'src' => 'http://localhost/cdn/bootstrap/js/bootstrap.bundle.js'
            ],
            [
                'src' => 'http://localhost/cdn/sweetalert/sweetalert2.all.js'
            ],
            [
                'src' =>  base_url('assets/js/logout.js')
            ],
            [
                'src' => base_url('assets/js/tab.js')
            ]
        ];
    }

    public function index()
    {
        $data['script'] = $this->_script;
        $data['judul'] = 'Tab Manejemen';
        $data['all_tab'] = $this->tab->all_tab();

        $this->load->view('log/header', $data);
        $this->load->view('logged/tab/index', $data);
        $this->load->view('log/footer', $data);
    }

    public function t_tambah()
    {
        $data['script'] = $this->_script;
        $data['judul'] = 'Tab Manejemen';

        $this->form_validation->set_rules('tab', 'Tab', 'required|trim');

        if ($this->form_validation->run()  == false) {
            $this->load->view('log/header', $data);
            $this->load->view('logged/tab/t_tambah', $data);
            $this->load->view('log/footer', $data);
        } else {
            $tab = [
                'nama' => $this->input->post('tab'),
                'aktif' => $this->input->post('aktif')
            ];

            $tab_ada = $this->tab->tab_exist($tab['nama']);

            if ($tab_ada) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tab sudah ada</div>');
                redirect('tab/tambah');
            } else {
                $this->db->insert('tab', $tab);

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Tab baru berhasil ditambahkan</div>');
                redirect('tab/index');
            }
        }
    }

    public function t_ubah($id = null)
    {
        if (!$id) redirect('tab');

        $data['script'] = $this->_script;
        $data['judul'] = 'Tab Manejemen';
        $data['tab_edit'] = $this->tab->tab($id);
        $data['id'] = $id;

        $this->form_validation->set_rules('tab', 'Tab', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('log/header', $data);
            $this->load->view('logged/tab/tab_ubah', $data);
            $this->load->view('log/footer', $data);
        } else {
            $ch = $this->input->post('aktif');
            $tab_baru = $this->input->post('tab');

            $this->db->set('nama', $tab_baru);
            $this->db->set('aktif', $ch);
            $this->db->where('id', $id);
            $this->db->update('tab');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Tab berhasil diperbarui</div>');
            redirect('tab');
        }
    }

    public function t_hapus($id = null)
    {
        if (!$id) redirect('tab');

        $this->db->where('id', $id);
        $this->db->delete('tab');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Tab berhasil dihapus</div>');
        redirect('tab');
    }

    public function sub_tab()
    {
        $data['script'] = $this->_script;
        $data['judul'] = 'Sub Tab Manejemen';
        $data['sub_all'] = $this->tab->all_sub_tab();

        $this->load->view('log/header', $data);
        $this->load->view('logged/tab/sub_tab', $data);
        $this->load->view('log/footer', $data);
    }

    public function sub_tambah()
    {
        $data['script'] = $this->_script;
        $data['judul'] = 'Tab Manejemen';
        $data['tab_tambah'] = $this->tab->all_tab();

        $this->form_validation->set_rules('n-sub', 'Nama Sub', 'required|trim');
        $this->form_validation->set_rules('tab', 'Tab', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('log/header', $data);
            $this->load->view('logged/tab/st_tambah', $data);
            $this->load->view('log/footer', $data);
        } else {
            $sub_tab = [
                'tab_id' => $this->input->post('tab'),
                'nama_sub' => $this->input->post('n-sub'),
                'url' => $this->input->post('url'),
                'aktif' => $this->input->post('aktif')
            ];

            $this->db->insert('sub_tab', $sub_tab);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Sub Tab baru berhasil ditambahkan</div>');
            redirect('tab/sub_tab');
        }
    }

    public function st_hapus($id = null)
    {
        if (!$id) redirect('tab/sub_tab');

        $this->db->where('id', $id);
        $this->db->delete('sub_tab');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Sub Tab berhasil dihapus</div>');
        redirect('tab/sub_tab');
    }

    public function st_ubah($id = null)
    {
        if (!$id) redirect('tab/sub_tab');

        $data['script'] = $this->_script;
        $data['judul'] = 'Tab Manejemen';
        $data['sub_ubah'] = $this->tab->sub_id($id);
        $data['tab_ubah'] = $this->tab->all_tab();
        $data['id'] = $id;

        $this->form_validation->set_rules('n-sub', 'Nama Sub', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('log/header', $data);
            $this->load->view('logged/tab/sub_ubah', $data);
            $this->load->view('log/footer', $data);
        } else {
            $sub_tab = [
                'tab_id' => $this->input->post('tab'),
                'nama_sub' => $this->input->post('n-sub'),
                'url' => $this->input->post('url'),
                'aktif' => $this->input->post('aktif')
            ];

            $this->db->where('id', $id);
            $this->db->update('sub_tab', $sub_tab);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Sub Tab berhasil diubah</div>');
            redirect('tab/sub_tab');
        }
    }
}
