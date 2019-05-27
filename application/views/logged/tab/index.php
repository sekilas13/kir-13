<section class="satu">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-hover bg-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aktif</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($all_tab as $tall) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $tall['nama']; ?></td>
                                <td>
                                    <?php if ($tall['aktif']  == 1) : ?>
                                        Ya
                                    <?php else : ?>
                                        Tidak
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('tab/t_ubah/') . $tall['id']; ?>" class="btn btn-success">Ubah</a>
                                    <a href="<?= base_url('tab_/t_hapus/') . $tall['id']; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-3">
                        <a href="<?= base_url('tab/t_tambah'); ?>" class="btn btn-primary">Tambah Tab</a>
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