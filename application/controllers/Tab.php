<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tab extends CI_Controller
{
    private $_script;

    private $_misc;

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
            ]
        ];

        $this->_misc = [
            'tab' => $this->tab->tab()
        ];
    }

    public function index()
    {
        $data['script'] = $this->_script;
        $data['judul'] = 'Tab Manejemen';
        $data['tab'] = $this->_misc['tab'];
        $data['all_tab'] = $this->tab->all_tab();

        var_dump($data);
        die;

        $this->load->view('log/header', $data);
        $this->load->view('logged/tab/index', $data);
        $this->load->view('log/footer', $data);
    }

    public function t_tambah()
    {
        $data['script'] = $this->_script;
        $data['judul'] = 'Tab Manejemen';
        $data['tab'] = $this->_misc['tab'];

        if ($this->form_validation->run()  == false) {
            $this->load->view('log/header', $data);
            $this->load->view('logged/tab/t_tambah', $data);
            $this->load->view('log/footer', $data);
        } else {
            $tab = [
                'nama' => $this->input->post('nama'),
                'aktif' => $this->input->post('aktif')
            ];

            $tab_ada = $this->tab->tab_exist($tab['nama']);

            if ($tab_ada) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tab sudah ada</div>');
                redirect('tab/tambah');
            } else { }
        }
    }

    public function t_ubah($id = null)
    {
        if (!$id) redirect('tab');

        $data['script'] = $this->_script;
        $data['judul'] = 'Tab Manejemen';
        $data['tab'] = $this->_misc['tab'];
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
}
