<div class="jumbotron" id="home">
    <div class="container text-center">
        <img src="<?= base_url('assets/img/jumbotron.jpg'); ?>" class="rounded-circle img-thumbnail">
        <h1 class="display-4">Karya Ilmiah Remaja</h1>
        <h4>SMPN 13 BEKASI</h4>
    </div>
</div>

<!-- About -->
<section class="tentang" id="tentang">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h2>Tentang</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam
                    expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus,
                    debitis.</p>
            </div>
            <div class="col-md-5">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, molestiae sunt doloribus error ullam
                    expedita cumque blanditiis quas vero, qui, consectetur modi possimus. Consequuntur optio ad quae possimus,
                    debitis earum.</p>
            </div>
        </div>
    </div>
</section>

<!-- PORTOFOLIO -->
<section class="portofolio bg-light" id="portofolio">
    <div class="container">
        <div class="row pt-4 mb-4">
            <div class="col text-center">
                <h2>Portofolio</h2>
            </div>
        </div>
        <div class="row">

            <?php $i = 1; ?>
            <?php foreach ($portofolio[0] as $p) : ?>
                <?php $source = $p['src']; ?>
                <div class="col-md mb-4">
                    <div class="card">
                        <a href="<?= $source . $i . '.jpg'; ?>" data-toggle="lightbox">
                            <img class="card-img-top" src="<?= $source . $i . '.jpg'; ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <p class="card-text"><?= $p['text']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>

        </div>
        <div class="row">
            <?php $a = 1; ?>
            <?php foreach ($portofolio[1] as $p) : ?>
                <?php $source = $p['src']; ?>
                <div class="col-md mb-4">
                    <div class="card">
                        <a href="<?= $source . $a . '.jpg'; ?>" data-toggle="lightbox">
                            <img class="card-img-top" src="<?= $source . $a . '.jpg'; ?>" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <p class="card-text"><?= $p['text']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="login" id="login">
    <div class="container">
        <div class="row pt-4 mb-4">
            <div class="col text-center">
                <h2>Login</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 ket">
                <h3 class="text-center">Keterangan</h3>
                <p>Jika akun anda telah ada, loginlah untuk mengetahui acara apa saja yang akan datang di KIR 13.</p>
                <?php if ($this->session->flashdata('pesan')) : ?>
                    <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('pesan'); ?></div>
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('home/index#login'); ?>" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="pl-3 text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="kata-sandi">Kata Sandi</label>
                                <input type="password" id="kata-sandi" name="kata-sandi" class="form-control">
                                <?= form_error('kata-sandi', '<small class="pl-3 text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Masuk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sejarah bg-light" id="sejarah">
    <div class="container">
        <div class="row pt-4 mb-4">
            <div class="col text-center">
                <h2>Sejarah</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae minus obcaecati sequi in temporibus id, quidem labore repudiandae ratione quia fuga omnis nam illum ea, inventore quod voluptatum doloribus quis.</p>
            </div>
            <div class="col-md-5">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae minus obcaecati sequi in temporibus id, quidem labore repudiandae ratione quia fuga omnis nam illum ea, inventore quod voluptatum doloribus quis.</p>
            </div>
        </div>
    </div>
</section>