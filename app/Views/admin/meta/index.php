<?= $this->extend('admin/template/template'); ?>
<?= $this->Section('content'); ?>

<style>
    /* Styling untuk search tampilan B */
    .form {
        --input-bg: #FFF;
        --padding: 1.5em;
        --rotate: 80deg;
        --gap: 2em;
        --icon-change-color: #F2BF02;
        --height: 50px;
        width: 600px;
        /* Sesuaikan dengan tampilan A */
        padding-inline-end: 1em;
        background: var(--input-bg);
        position: relative;
        border-radius: 30px;
        /* Sesuaikan border-radius dari tampilan A */
        margin: 0 auto;
    }

    .form label {
        display: flex;
        align-items: center;
        width: 100%;
        height: var(--height);
    }

    .form input {
        width: 100%;
        padding-inline-start: calc(var(--padding) + var(--gap));
        outline: none;
        background: none;
        border: 0;
        font-size: 0.9rem;
    }

    .form svg {
        color: #111;
        transition: 0.3s cubic-bezier(.4, 0, .2, 1);
        position: absolute;
        height: 17px;
        /* Sesuaikan ukuran icon */
    }

    .icon {
        position: absolute;
        left: var(--padding);
        transition: 0.3s cubic-bezier(.4, 0, .2, 1);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swap-off {
        transform: rotate(-80deg);
        opacity: 0;
        visibility: hidden;
    }

    .close-btn {
        background: none;
        border: none;
        right: calc(var(--padding) - var(--gap));
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #111;
        padding: 0.1em;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        transition: 0.3s;
        opacity: 0;
        transform: scale(0);
        visibility: hidden;
    }

    .form input:focus~.icon {
        transform: rotate(var(--rotate)) scale(1.3);
    }

    .form input:focus~.icon .swap-off {
        opacity: 1;
        transform: rotate(-80deg);
        visibility: visible;
        color: var(--icon-change-color);
    }

    .form input:focus~.icon .swap-on {
        opacity: 0;
        visibility: visible;
    }

    .form input:valid~.icon {
        transform: scale(1.3) rotate(var(--rotate))
    }

    .form input:valid~.icon .swap-off {
        opacity: 1;
        visibility: visible;
        color: var(--icon-change-color);
    }

    .form input:valid~.icon .swap-on {
        opacity: 0;
        visibility: visible;
    }

    .form input:valid~.close-btn {
        opacity: 1;
        visibility: visible;
        transform: scale(1);
        transition: 0s;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form {
            width: 250px;
            --height: 45px;
        }
    }

    .table-hover tbody tr:hover {
        background-color: #f2f2f2;
    }

    .table thead th {
        background-color: #f8f9fa;
        font-weight: bold;
        border-bottom: 2px solid #dee2e6;
        text-align: center;
        white-space: nowrap;
    }

    .table tbody td {
        padding: 12px;
        vertical-align: middle;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Adding fixed width for certain columns */
    .col-fixed {
        width: 300px;
    }

    .btn-sm {
        font-size: 0.8rem;
        padding: 4px 8px;
    }

    .text-truncate-multiline {
        display: -webkit-box;
        -webkit-line-clamp: 5;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.2;
        /* Sesuaikan jarak antar-baris */
    }
</style>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
            <div class="col-auto">
                <h1 class="app-page-title mb-0" style="color: #03AADE;">Meta</h1>
            </div>

            <!-- Tengahkan form search -->
            <!-- <div class="col d-flex justify-content-center">
                <form class="form" action="<?= base_url('admin-search-member') ?>" method="GET">
                    <label for="search">
                        <input required="" autocomplete="off" placeholder="cari member" name="keyword" id="keyword"
                            type="text">
                        <div class="icon">
                            <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="swap-on">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linejoin="round"
                                    stroke-linecap="round"></path>
                            </svg>
                            <svg stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="swap-off">
                                <path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linejoin="round" stroke-linecap="round">
                                </path>
                            </svg>
                        </div>
                        <button type="reset" class="close-btn">
                            <svg viewBox="0 0 20 20" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </label>
                </form>
            </div> -->
        </div>
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">No</th>
                                        <th class="text-center align-middle">Meta Title Beranda ID</th>
                                        <th class="text-center align-middle">Meta Title Beranda EN</th>
                                        <th class="text-center align-middle">Meta Description Beranda ID</th>
                                        <th class="text-center align-middle">Meta Description Beranda EN</th>
                                        <th class="text-center align-middle">Meta Title Tentang ID</th>
                                        <th class="text-center align-middle">Meta Title Tentang EN</th>
                                        <th class="text-center align-middle">Meta Description Tentang ID</th>
                                        <th class="text-center align-middle">Meta Description Tentang EN</th>
                                        <th class="text-center align-middle">Meta Title Materi ID</th>
                                        <th class="text-center align-middle">Meta Title Materi EN</th>
                                        <th class="text-center align-middle">Meta Description Materi ID</th>
                                        <th class="text-center align-middle">Meta Description Materi EN</th>
                                        <th class="text-center align-middle">Meta Title Tutorial ID</th>
                                        <th class="text-center align-middle">Meta Title Tutorial EN</th>
                                        <th class="text-center align-middle">Meta Description Tutorial ID</th>
                                        <th class="text-center align-middle">Meta Description Tutorial EN</th>
                                        <th class="text-center align-middle">Meta Title Member ID</th>
                                        <th class="text-center align-middle">Meta Title Member EN</th>
                                        <th class="text-center align-middle">Meta Description Member ID</th>
                                        <th class="text-center align-middle">Meta Description Member EN</th>
                                        <th class="text-center align-middle">Meta Title Daftar ID</th>
                                        <th class="text-center align-middle">Meta Title Daftar EN</th>
                                        <th class="text-center align-middle">Meta Description Daftar ID</th>
                                        <th class="text-center align-middle">Meta Description Daftar EN</th>
                                        <th class="text-center align-middle">Aksi</th>
                                    </tr>
                                </thead>
                                <?php if (empty($meta)): ?>
                                    <tbody>
                                        <tr>
                                            <td colspan="26" class="text-center">Masih belum ada Data Meta.</td>
                                        </tr>
                                    </tbody>
                            </table>
                        <?php else: ?>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($meta as $item): ?>
                                    <tr>
                                        <td class="text-center align-middle"><?= $no++ ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title_beranda'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title_beranda_en'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_description_beranda'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_description_beranda_en'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title_tentang'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title_tentang_en'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_description_tentang'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_description_tentang_en'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title_materi'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title_materi_en'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_description_materi'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_description_materi_en'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title_tutorial'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title_tutorial_en'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_description_tutorial'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_description_tutorial_en'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title_member'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title_member_en'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_description_member'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_description_member_en'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title_daftar'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_title_daftar_en'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_description_daftar'] ?></td>
                                        <td class="text-center align-middle"><?= $item['meta_description_daftar_en'] ?></td>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="<?= base_url('admin-edit-meta') ?>" class="btn btn-sm text-white" style="background-color: #03AADE;">Ubah</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            </table>
                        <?php endif; ?>
                        </div>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
    </div><!--//container-fluid-->
</div><!--//app-content-->

<script>
    // Initialize tooltips
    document.addEventListener("DOMContentLoaded", function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(function(tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

<?= $this->endSection('content') ?>