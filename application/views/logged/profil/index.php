<?php

$role = $this->db->get_where('role', ['id' => $this->session->userdata('role_id')])->row_array();
$role = $role['role'];

?>

<section class="satu">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h2><?= $judul; ?></h2>
            </div>
        </div>
        <div class="card">
            <div class="card-body shadow">
                <div class="row">
                    <div class="col-lg-2">
                        <img src="<?= base_url('assets/img/profil/') . $user['gambar']; ?>" class="rounded img-thumbnail">
                    </div>
                    <div class="col-lg-10">
                        <ul class="list-group">
                            <li class="list-group-item">Nama : <?= $user['nama']; ?></li>
                            <li class="list-group-item">Email : <?= $user['email']; ?></li>
                            <li class="list-group-item">Akses : <?= $role; ?></li>
                        </ul>
                        <?= $this->session->flashdata('pesan'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>