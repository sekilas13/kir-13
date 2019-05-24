<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function user_email($email)
    {
        return $this->db->get_where('pengguna', ['email' => $email])->row_array();
    }
}
