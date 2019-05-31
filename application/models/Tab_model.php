<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tab_model extends CI_Model
{
    public function all_tab()
    {
        return $this->db->get('tab')->result_array();
    }

    public function all_sub_tab()
    {
        $this->db->select('`sub_tab`.`id`,`tab`.`nama`,`nama_sub`,`url`,`sub_tab`.`aktif`');
        $this->db->from('sub_tab');
        $this->db->join('tab', 'sub_tab.tab_id = tab.id');
        $this->db->order_by('sub_tab.id', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function tab($id = null)
    {
        if ($id) {
            $this->db->select('`tab`.`id`,`nama`,`aktif`');
            $this->db->from('tab');
            $this->db->join('tab_access', 'tab_access.tab_id = tab.id');
            $this->db->where('tab.id', $id);
            $query = $this->db->get();

            $result = $query->row_array();
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
            $this->db->select('`sub_tab`.`id`,`tab`.`nama`,`nama_sub`,`url`,`sub_tab`.`aktif`');
            $this->db->from('sub_tab');
            $this->db->join('tab', 'sub_tab.tab_id = tab.id');
            $query = $this->db->get();

            $result = $query->result_array();
        } else {
            $this->db->select('`sub_tab`.`id`,`sub_tab`.`tab_id`,`tab`.`nama`,`nama_sub`,`url`,`sub_tab`.`aktif`');
            $this->db->from('sub_tab');
            $this->db->join('tab', 'sub_tab.tab_id = tab.id');
            $this->db->where('tab.id', $id);
            $this->db->where('sub_tab.aktif', 1);
            $query = $this->db->get();

            $result = $query->result_array();
        }

        return $result;
    }

    public function sub_id($id)
    {
        $this->db->select('`sub_tab`.`id`,`sub_tab`.`tab_id`,`tab`.`nama`,`nama_sub`,`url`,`sub_tab`.`aktif`');
        $this->db->from('sub_tab');
        $this->db->join('tab', 'sub_tab.tab_id = tab.id');
        $this->db->where('sub_tab.id', $id);
        $query = $this->db->get();

        return $query->row_array();
    }
}
