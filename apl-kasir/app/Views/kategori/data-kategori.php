<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Kategori Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item active">Kategori Produk</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body mt-4">
                        <?php if (session()->getFlashdata('pesan')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                <?= session()->getFlashdata('pesan'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>
                        <div class="row">
                            <div class="col mb-2">
                                <a href="<?= site_url('tambah-kategori'); ?>" type="button" class="btn btn-primary"><i
                                        class="bi bi-plus-circle"></i> Tambah Kategori</a>
                            </div>
                        </div>

                        <!-- <h1 class="card-title">Data Kategori Produk</h1>
                        <p>Dibawah ini adalah data Kategori Produk.</p> -->

                        <!-- Table with stripped rows -->
                        <table class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori Produk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($listKategori as $row): ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $row['nama_kategori']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('edit-kategori/' . $row['id_kategori']); ?>"
                                                class="ri ri-edit-box-fill btn btn-outline-primary"></a>

                                            <form action="<?= site_url('hapus-kategori/' . $row['id_kategori']); ?>"
                                                method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <button type="submit"
                                                    class="ri ri-delete-bin-5-fill btn btn-outline-primary"
                                                    onclick="return confirm('Apakah anda yakin ?')" id="hapusKategori"
                                                    data-id="<?= $row['id_kategori']; ?>"></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>