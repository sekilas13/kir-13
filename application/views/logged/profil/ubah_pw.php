<section>
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h2><?= $judul; ?></h2>
            </div>
        </div>
        <div class="card">
            <div class="card-body shadow">
                <?= form_open('profil/ubah_pw'); ?>
                <div class="form-group">
                    <label for="pw_lama">Kata sandi lama</label>
                    <input type="password" class="form-control" id="pw_lama" name="ks_lama">
                </div>
                <div class="form-group">
                    <label for="pw">Kata sandi baru</label>
                    <input type="password" class="form-control" id="pw" name="katasandi">
                </div>
                <div class="form-group">
                    <label for="pw_baru">Konfirmasi kata sandi</label>
                    <input type="password" class="form-control" id="pw_baru" name="katasandi-baru">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
                    <a href="<?= base_url('profil'); ?>" class="btn btn-success">Kembali</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>