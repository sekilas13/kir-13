<section>
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card shadow-lg bg-dark">
                <div class="card-body">
                    <div class="row text-light text-center">
                        <div class="col-4">
                            <h1 class="display-3">503</h1>
                        </div>
                        <div class="col-8">
                            <h3>Mohon Maaf</h3>
                            <p>
                                <?php if ($this->uri->segment(4) == 'sub') : ?>
                                    Sub Tab
                                <?php else : ?>
                                    Tab
                                <?php endif; ?>
                                yang anda tuju sedang ada perbaikan.Coba hubungi pemilik server.
                            </p>
                            <a href="<?= base_url('profil'); ?>" class="text-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>