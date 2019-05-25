<?php

function log_ok()
{
    $ci = get_instance();
    if ($ci->session->userdata('email')) {
        redirect('profil/index');
    }
}
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('home/index');
    } else {
        access();
    }
}

function access()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');
    $tab = $ci->uri->segment(1);

    if ($tab == null) {
        $tab = 'home';
    }

    $querytab = $ci->db->get_where('tab', ['nama' => $tab])->row_array();
    $tab_id = $querytab['id'];

    $userAccess = $ci->db->get_where('tab_access', [
        'role_id' => $role_id,
        'tab_id' => $tab_id
    ]);

    if ($userAccess->num_rows() < 1) {
        redirect('home/blocked');
    }
}
