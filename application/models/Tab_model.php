<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tab_model extends CI_Model
{
    public function tab($id = null)
    {
        if ($id) { } else {
            $role_id = $this->session->userdata('role_id');
            $query = "SELECT `tab`.`id`,`nama` FROM `tab` AS `t` 
                        JOIN `tab_access` AS `t_a` ON `t_a`.`tab_id` = `t`.`id`
                        WHERE `t_a`.`role_id` = $role_id AND `t`.`aktif` = 1
                    ";

            $result = $this->db->query($query)->result_array();
        }

        return $result;
    }

    public function sub_tab()
    { }
}
