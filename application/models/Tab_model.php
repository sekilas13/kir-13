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
            $query = "SELECT `t`.`id`,`nama`,`aktif` FROM `tab` AS `t` 
                        JOIN `tab_access` AS `t_a` ON `t_a`.`tab_id` = `t`.`id`
                        WHERE `t`.`id` = $id
                    ";
            $result = $this->db->query($query)->row_array();
        } else {
            $role_id = $this->session->userdata('role_id');
            $query = "SELECT `t`.`id`,`nama` FROM `tab` AS `t` 
                        JOIN `tab_access` AS `t_a` ON `t_a`.`tab_id` = `t`.`id`
                        WHERE `t_a`.`role_id` = $role_id AND `t`.`aktif` = 1
                    ";

            $result = $this->db->query($query)->result_array();
        }

        return $result;
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
