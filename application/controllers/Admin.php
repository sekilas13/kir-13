<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
                'src' => base_url('assets/js/jam.js')
            ]
        ];
        $this->_misc = [
            'tab' => $this->tab->tab()
        ];
    }
    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'tab' => $this->_misc['tab'],
            'script' => $this->_script
        ];

        $this->load->view('log/header', $data);
        $this->load->view('logged/admin/index');
        $this->load->view('log/footer');
    }

    public function daftar()
    {
        $data = [
            'judul' => 'Daftarkan Murid Baru'
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('kata-sandi', 'Kata Sandi', 'required|trim|matches[kata-sandi2]|min_length[5]|max_length[15]');
        $this->form_validation->set_rules('kata-sandi2', 'Konfirmasi Kata Sandi', 'required|trim|matches[kata-sandi]|min_length[5]|max_length[15]');

        if ($this->form_validation->run() == false) {
            $this->load->view('log/header', $data);
            $this->load->view('logged/admin/daftar');
            $this->load->view('log/footer');
        } else {
            $user = [
                'nama' => htmlspecialchars($this->input->post('nama', TRUE)),
                'email' => $this->input->post('email', TRUE),
                'gambar' => 'default.jpg',
                'kata-sandi' => password_hash(htmlspecialchars($this->input->post('kata-sandi', TRUE)), PASSWORD_DEFAULT),
                'role_id' => 3,
                'active_ok' => 0,
                'waktu_daftar' => time()
            ];

            $query = $this->db->insert('pengguna', $user);

            if ($query->num_rows()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akun berhasil ditambahkan, silahkan aktifkan akun anda</div>');
                redirect('admin/daftar');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun gagal ditambahkan. mohon maaf</div>');
                redirect('admin/daftar');
            }
        }
    }
}
