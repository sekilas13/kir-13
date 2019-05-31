<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Server extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) redirect('home');
    }
    public function error($param)
    {
        if (!$param) redirect('profil');

        if ($param == 503) {
            $data['judul'] = 'OOPS !!!';
            $sec['tab'] = $this->input->post('tab');
            $this->load->view('templates/h-server', $data);
        } else if ($param == 404) {
            $data['judul'] = 'TIDAK DITEMUKAN';
            $this->load->view('templates/h-server', $data);
        } else if ($param == 403) {
            $data['judul'] = 'TIDAK DITEMUKAN';
            $this->load->view('templates/h-server', $data);
        }

        $this->load->view("server/error/$param");
        $this->load->view('templates/f-server');
    }
}
