<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Satuan Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= site_url('dashboard-admin'); ?>">Dashboard</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item active">Satuan Produk</li>
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
                                <a href="<?= site_url('tambah-satuan'); ?>" type="button" class="btn btn-primary"><i
                                        class="bi bi-plus-circle"></i> Tambah Satuan</a>
                            </div>
                        </div>

                        <!-- <h1 class="card-title">Data Kategori Produk</h1>
                        <p>Dibawah ini adalah data Kategori Produk.</p> -->

                        <!-- Table with stripped rows -->
                        <table class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($listSatuan as $row): ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $row['nama_satuan']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('edit-satuan/' . $row['id_satuan']); ?>"
                                                class="ri ri-edit-box-fill btn btn-outline-primary"></a>

                                            <form action="<?= site_url('hapus-satuan/' . $row['id_satuan']); ?>"
                                                method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <button type="submit"
                                                    class="ri ri-delete-bin-5-fill btn btn-outline-primary"
                                                    onclick="return confirm('Apakah anda yakin ?')" id="hapusSatuan"
                                                    data-id="<?= $row['id_satuan']; ?>"></button>
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
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>