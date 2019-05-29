<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tab_model extends CI_Model
{
    public function all_tab()
    {
        return $this->db->get('tab')->result_array();
    }

    public function tab($id = null)
    {
        if ($id) {
            $this->db->select('`t`.`id`,`nama`,`aktif`');
            $this->db->from('tab');
            $this->db->join('tab_access', 'tab_access.tab_id = tab.id');
            $this->db->where('tab.id', id);
            $query = $this->db->get();

            $result = $this->db->query($query)->row_array();
        } else {
            $role_id = $this->session->userdata('role_id');
            $this->db->select('`tab`.`id`,`nama`,`aktif`');
            $this->db->from('tab');
            $this->db->join('tab_access', 'tab_access.tab_id = tab.id');
            $this->db->where('tab_access.role_id', $role_id);
            $this->db->where('tab.aktif', 1);
            $query = $this->db->get();

            $result = $query->result_array();
        }

        return $result;
    }

    public function tab_exist($nama)
    {
        return $this->db->get_where('tab', ['nama' => $nama])->row_array();
    }

    public function sub_tab($id = null)
    {
        if (!$id) {
            $query = "SELECT `sub_tab`.*, `tab`.`nama`
                FROM `sub_tab` JOIN `tab`
                ON `sub_tab`.`tab_id` = `tab`.`id`
              ";
            $result = $this->db->query($query)->result_array();
        } else {
            $query = "SELECT `sub_tab`.*, `tab`.`nama`
                FROM `sub_tab` JOIN `tab`
                ON `sub_tab`.`tab_id` = `tab`.`id` 
                WHERE `sub_tab`.`tab_id` = $id AND `sub_tab`.`aktif` = 1
              ";
            $result = $this->db->query($query)->result_array();
        }

        return $result;
    }
}
