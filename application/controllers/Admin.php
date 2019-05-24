<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data = [
            'judul' => 'Dashboard'
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

            if ($query->num_rows > 0) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Akun berhasil ditambahkan, silahkan aktifkan akun anda</div>');
                redirect('admin/daftar');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun gagal ditambahkan. mohon maaf</div>');
                redirect('admin/daftar');
            }
        }
    }
}
