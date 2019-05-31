<?php
$tab = $this->tab->tab();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="http://localhost/cdn/bootstrap/css/bootstrap.css">

    <!-- MY CSS -->
    <style>
        body {
            margin-top: 50px;
            background-color: #eaeaea;
        }

        section.satu {
            min-height: 700px;
            margin-top: 80px;
        }

        .gambar-profil {
            transform: rotate(-90deg);
        }

        section {
            min-height: 476px;
            margin-top: 80px;
        }

        footer {
            min-height: 50px;
            padding-top: 12px;
        }
    </style>

    <title><?= $judul; ?></title>
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('kegiatan'); ?>">KIR SMPN 13 BEKASI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <!-- FOR3ACH -->
                    <?php foreach ($tab as $t) : ?>

                        <?php
                        $sub_tab = $this->tab->sub_tab($t['id']);

                        $sub_tab_url = $this->uri->segment(2);

                        if ($sub_tab_url == null) {
                            $sub_tab_url = 'index';
                        }

                        $sub_tab_url = strtolower($sub_tab_url);
                        ?>
                        <div class="nav-item dropdown">
                            <?php if (strtolower($this->uri->segment(1)) == strtolower($t['nama'])) : ?>
                                <a class="nav-link dropdown-toggle active" href="<?= base_url($t['nama']); ?>" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php else : ?>
                                    <a class="nav-link dropdown-toggle" href="<?= base_url($t['nama']); ?>" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php endif; ?>
                                    <?= $t['nama']; ?>
                                </a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                                    <?php foreach ($sub_tab as $s_t) : ?>
                                        <?php if (strtolower($this->uri->segment(1)) == strtolower($t['nama']) && $sub_tab_url == strtolower($s_t['url'])) : ?>
                                            <a class="dropdown-item text-light" href="">
                                            <?php else : ?>
                                                <a class="dropdown-item text-secondary" href="<?= base_url($t['nama'] . '/' . $s_t['url']) ?>">
                                                <?php endif; ?>
                                                <?= $s_t['nama_sub']; ?>
                                            </a>
                                        <?php endforeach; ?>
                                </div>
                        </div>
                    <?php endforeach; ?>

                    <a href="<?= base_url('home/keluar'); ?>" class="nav-item nav-link btn btn-danger keluar mr-1 active">Keluar</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<body>