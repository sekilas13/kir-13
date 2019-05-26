<section>
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
                        <?php if ($user['gambar'] == 'default.jpg') : ?>
                            <img src="<?= base_url('assets/img/profil/') . $user['gambar']; ?>" class="rounded img-thumbnail">
                        <?php else : ?>
                            <img src="<?= base_url('assets/img/profil/') . $user['gambar']; ?>" class="rounded img-thumbnail gambar-profil">
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                <?= form_open_multipart('profil/ubah'); ?>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                                    <?= form_error('nama', '<small class="alert alert-danger" role="alert">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                            <label class="custom-file-label" for="gambar">Cari Gambar</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Ubah Profil</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>