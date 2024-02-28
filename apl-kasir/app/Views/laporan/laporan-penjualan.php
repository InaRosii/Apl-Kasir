<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Laporan Stok Barang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Laporan</li>
                <li class="breadcrumb-item active">Stok</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-md-2">
                                <a class="btn btn-danger" aria-current="true" href="<?= site_url('/pdf-penjualan') ?>">

                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    <span class="text">Download PDF</span>
                                </a>
                            </div>
                        </div>
                        <!-- Floating Labels Form -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Faktur</th>
                                    <th>Tanggal Penjualan</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($dataPenjualan as $row): ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $row['no_faktur']; ?>
                                        </td>
                                        <td>
                                            <?= $row['tanggal_penjualan']; ?>
                                        </td>
                                        <td>
                                            <?= $row['total']; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>