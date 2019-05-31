<section class="satu">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-hover bg-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Sub tab</th>
                            <th scope="col">Tab</th>
                            <th scope="col">Url</th>
                            <th scope="col">aktif</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($sub_all as $st) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $st['nama_sub']; ?></td>
                                <td><?= $st['nama']; ?></td>
                                <td><?= $st['url']; ?></td>
                                <td>
                                    <?php if ($st['aktif'] == 1) : ?>
                                        Ya
                                    <?php else : ?>
                                        Tidak
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('tab/st_ubah/') . $st['id']; ?>" class="btn btn-primary">Ubah</a>
                                    <a href="<?= base_url('tab/st_hapus/') . $st['id']; ?>" class="btn btn-danger hapus-sub_tab" data-sub="<?= $st['nama_sub']; ?>">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-3">
                        <a href="<?= base_url('tab/sub_tambah'); ?>" class="btn btn-primary">Tambah Sub Tab</a>
                    </div>
                    <div class="col-9">
                        <?php if ($this->session->flashdata('pesan')) : ?>
                            <div class="mt-1">
                                <?= $this->session->flashdata('pesan'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>