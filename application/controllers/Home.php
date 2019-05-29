<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        log_ok();

        $text = 'Some quick example text to build on the card title and make up the bulk of the card content.';

        $gambar = base_url('assets/img/thumbs/');

        $data = [
            'judul' => 'KIR SMPN 13 BEKASI',
            'portofolio' => [
                [
                    [
                        'src' => $gambar,
                        'text' => $text
                    ],
                    [
                        'src' => $gambar,
                        'text' => $text
                    ],
                    [
                        'src' => $gambar,
                        'text' => $text
                    ]
                ],
                [
                    [
                        'src' => $gambar,
                        'text' => $text
                    ],
                    [
                        'src' => $gambar,
                        'text' => $text
                    ],
                    [
                        'src' => $gambar,
                        'text' => $text
                    ]
                ]
            ]
        ];

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('kata-sandi', 'Kata Sandi', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('home/index', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $pengguna = $this->auth->user_email($email);
            $pw = $this->input->post('kata-sandi');

            if ($pengguna) {
                if ($pengguna['active_ok']) {
                    if (password_verify($pw, $pengguna['kata-sandi'])) {
                        // OK 
                        $userdata = ['email' => $email, 'role_id' => $pengguna['role_id']];
                        $this->session->set_userdata($userdata);

                        if ($this->session->userdata('role_id') == 1) {
                            redirect('admin/index');
                        } else {
                            redirect('profil/index');
                        }
                    } else {
                        $this->session->set_flashdata('pesan', 'Kata sandi yang anda masukkan salah');
                        $this->session->set_flashdata('email', $email);
                        redirect('home/index#login');
                    }
                } else {
                    $this->session->set_flashdata('pesan', 'Aktivasi akun anda terlebih dahulu');
                    redirect('home/index#login');
                }
            } else {
                $this->session->set_flashdata('pesan', 'Akun anda belum terdaftar');
                redirect('home/index#login');
            }
        }
    }

    public function blocked()
    {
        $this->load->view('block/terblokir');
    }

    public function keluar()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        redirect('home');
    }
}
