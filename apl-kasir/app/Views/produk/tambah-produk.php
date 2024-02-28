<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <!-- <div class="pagetitle">
        <h1>Data Kategori Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item active">Kategori Produk</li>
            </ol>
        </nav>
    </div> -->
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Produk</h5>

                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-octagon me-1"></i>
                                <?php foreach (session('errors') as $error): ?>
                                    <?= $error; ?>
                                <?php endforeach; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?= site_url('simpan-produk'); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" value="<?= $kodeProduk; ?>" disabled>
                                    <input type="hidden" name="txtKodeProduk" value="<?= $kodeProduk; ?>">
                                    <label for="kodeProduk">Kode Produk</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="namaProduk" name="txtNamaProduk">
                                    <label for="namaProduk">Nama Produk</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" name="txtSatuan" aria-label="State">
                                        <option selected> </option>
                                        <?php if (isset($satuan)) {
                                            $no = null;
                                            foreach ($satuan as $row) {
                                                $no++;
                                                echo '<option value=' . $row['id_satuan'] . '">' . $row['nama_satuan'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Satuan Produk</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" name="txtKategori"
                                        aria-label="State">
                                        <option selected> </option>
                                        <?php if (isset($kategori)) {
                                            $no = null;
                                            foreach ($kategori as $row) {
                                                $no++;
                                                echo '<option value=' . $row['id_kategori'] . '">' . $row['nama_kategori'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <label for="floatingSelect">Kategori Produk</label>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-floating">
                                    <input type="text" class="form-control uang" id="hargaBeli" name="txtHargaBeli">
                                    <label for="hargaBeli">Harga Beli</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control uang" id="hargaJual" name="txtHargaJual">
                                    <label for="hargaJual">Harga Jual</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control produk" id="stok" name="txtStok">
                                    <label for="stok">Stok</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form><!-- End floating Labels Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>