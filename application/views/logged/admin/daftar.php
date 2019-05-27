<section class="satu">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('admin/daftar'); ?>" method="post">
                        <div class="form-group">
                            <label for="nama">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <?= form_error('nama', '<small class="alert alert-danger" role="alert">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email Siswa</label>
                            <input type="text" class="form-control" id="Email" name="email">
                            <?= form_error('email', '<small class="alert alert-danger" role="alert">', '</small>'); ?>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label for="pw-1">Kata Sandi Siswa</label>
                                <input type="password" class="form-control" id="pw-1" name="kata-sandi">
                                <?= form_error('kata-sandi', '<small class="alert alert-danger" role="alert">', '</small>'); ?>
                            </div>
                            <div class="col-lg-6">
                                <label for="pw-2">Konfirmasi Kata Sandi</label>
                                <input type="password" class="form-control" id="pw-2" name="kata-sandi2">
                                <?= form_error('kata-sandi2', '<small class="alert alert-danger" role="alert">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Daftarkan Siswa Ini</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>