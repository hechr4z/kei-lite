<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title" style="color: #03AADE;">Ubah Data Keuntungan Daftar</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin-update-keuntungan/' . $keuntungan['id_keuntungan']) ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Judul Keuntungan ID</label>
                                <input type="text" class="form-control" name="judul_keuntungan" value="<?= $keuntungan['judul_keuntungan'] ?>" placeholder="Masukkan Judul Keuntungan ID" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Judul Keuntungan EN</label>
                                <input type="text" class="form-control" name="judul_keuntungan_en" value="<?= $keuntungan['judul_keuntungan_en'] ?>" placeholder="Masukkan Judul Keuntungan EN" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Keuntungan ID</label>
                                <input type="text" class="form-control" name="deskripsi_keuntungan" value="<?= $keuntungan['deskripsi_keuntungan'] ?>" placeholder="Masukkan Deskripsi Keuntungan ID" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Keuntungan EN</label>
                                <input type="text" class="form-control" name="deskripsi_keuntungan_en" value="<?= $keuntungan['deskripsi_keuntungan_en'] ?>" placeholder="Masukkan Deskripsi Keuntungan EN" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('admin-keuntungan') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<?= $this->endSection('content') ?>