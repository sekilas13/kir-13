<section class="satu">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="<?= base_url('tab/t_ubah/') . $id; ?>" method="post">
                            <div class="form-group">
                                <label for="tab">Tab</label>
                                <input type="text" class="form-control" id="tab" name="tab" value="<?= $tab_edit['nama']; ?>">
                                <?= form_error('tab', '<small class="alert alert-danger" role="alert">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <?php if ($tab_edit['aktif'] == 1) : ?>
                                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="aktif" checked>
                                    <?php else : ?>
                                        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="aktif">
                                    <?php endif; ?>
                                    <label class="form-check-label" for="defaultCheck1">
                                        Aktif ?
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="<?= base_url('tab'); ?>" class="btn btn-warning">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>