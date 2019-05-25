<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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
            'tab' => $this->tab->tab(),
            'user' => $this->auth->user_email($this->session->userdata('email'))
        ];
    }

    public function index()
    {
        $data['script'] = $this->_script;
        $data['judul'] = 'Profil Saya';
        $data['tab'] = $this->_misc['tab'];
        $data['user'] = $this->_misc['user'];

        $this->load->view('log/header', $data);
        $this->load->view('logged/profil/index', $data);
        $this->load->view('log/footer', $data);
    }

    public function ubah_pw()
    { }

    public function ubah()
    {
        $data['script'] = $this->_script;
        $data['judul'] = 'Profil Saya';
        $data['tab'] = $this->_misc['tab'];
        $data['user'] = $this->_misc['user'];

        if ($this->form_validation->run() == false) {
            $this->load->view('log/header', $data);
            $this->load->view('logged/profil/ubah', $data);
            $this->load->view('log/footer', $data);
        }
    }
}
