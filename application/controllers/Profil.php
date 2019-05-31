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
                'src' =>  base_url('assets/js/logout.js')
            ]
        ];

        $this->_misc = [
            'user' => $this->auth->user_email($this->session->userdata('email'))
        ];
    }

    public function index()
    {
        $data['script'] = $this->_script;
        $data['judul'] = 'Profil Saya';
        $data['user'] = $this->_misc['user'];

        $this->load->view('log/header', $data);
        $this->load->view('logged/profil/index', $data);
        $this->load->view('log/footer', $data);
    }

    public function ubah_pw()
    {
        $data['script'] = $this->_script;
        $data['judul'] = 'Ubah Kata Sandi';

        $this->load->view('log/header', $data);
        $this->load->view('logged/profil/ubah_pw', $data);
        $this->load->view('log/footer', $data);
    }

    public function ubah()
    {
        $data['script'] = $this->_script;
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->_misc['user'];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('log/header', $data);
            $this->load->view('logged/profil/ubah', $data);
            $this->load->view('log/footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $gambar_upload = $_FILES['gambar']['name'];

            if ($gambar_upload) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profil/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $gambar_lama = $data['user']['gambar'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }
                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('gambar', $gambar_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('pengguna');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profil Berhasil Diperbarui !</div>');
            redirect('profil');
        }
    }
}
