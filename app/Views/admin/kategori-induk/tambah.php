<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Tambah Kategori Induk</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('/admin-kategori-induk-store') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="mb-3">
                                <label class="form-label">Kategori Induk ID</label>
                                <input type="text" class="form-control" name="nama_kategori_induk" placeholder="Masukkan Kategori Induk ID" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori Induk EN</label>
                                <input type="text" class="form-control" name="nama_kategori_induk_en" placeholder="Masukkan Kategori Induk EN" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('admin-kategori-induk') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection(); ?>