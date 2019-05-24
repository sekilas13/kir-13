<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('admin/daftar'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email Siswa</label>
                        <input type="text" class="form-control" id="Email" name="email">
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <label for="pw-1">Kata Sandi Siswa</label>
                            <input type="password" class="form-control" id="pw-1" name="kata-sandi">
                        </div>
                        <div class="col-lg-6">
                            <label for="pw-2">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control" id="pw-2" name="kata-sandi2">
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