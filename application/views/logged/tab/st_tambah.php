<section class="satu">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="card-body">
                        <?= form_open('tab/sub_tambah'); ?>
                        <div class="form-group">
                            <label for="nama-sub">Nama Sub Tab</label>
                            <input type="text" class="form-control" name="n-sub" id="nama" value="<?= set_value('n-sub'); ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tab">Tab</label>
                            <select name="tab" id="tab" class="form-control">
                                <option value="">-- PILIH TAB --</option>

                                <?php foreach ($tab_tambah as $t) : ?>
                                    <option value="<?= $t['id']; ?>">
                                        <?= $t['nama']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('tab', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" name="url" id="url" value="<?= set_value('url'); ?>">
                            <?= form_error('url', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="aktif" name="aktif" checked>
                                <label class="form-check-label" for="aktif">
                                    Aktif ?
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="<?= base_url('tab/sub_tab'); ?>" class="btn btn-success">Kembali</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>