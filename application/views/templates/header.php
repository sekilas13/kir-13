<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="http://localhost/cdn/bootstrap/css/bootstrap.css">

    <!-- MY CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

    <title><?= $judul; ?></title>
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a href="#home" class="navbar-brand smooth-scroll"><?= $judul; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#tentang" class="nav-link smooth-scroll">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a href="#portofolio" class="nav-link smooth-scroll">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a href="#login" class="nav-link smooth-scroll">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="#sejarah" class="nav-link smooth-scroll">Sejarah</a>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link btn btn-primary text-light jam">

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>