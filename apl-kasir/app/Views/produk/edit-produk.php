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
            <div class="col-lg-6">


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Produk</h5>

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?= site_url('update-produk/') . $produk['id_produk']; ?>"
                            method="POST">
                            <?= csrf_field(); ?>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" value="<?= $produk['kode_produk']; ?>" disabled>
                                    <input type="hidden" name="txtKodeProduk" value="<?= $produk['kode_produk']; ?>">
                                    <label for="kodeProduk">Kode Produk</label>
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="namaProduk" name="txtNamaProduk"
                                        value="<?= $produk['nama_produk']; ?>">
                                    <label for="namaProduk">Nama Produk</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" name="txtSatuan" aria-label="State">
                                        <option selected>Pilih Kategori Produk</option>
                                        <?php foreach ($satuan as $value): ?>
                                            <option value="<?= $value['id_satuan']; ?>"
                                                 <?= ($produk['id_satuan'] == $value['id_satuan']) ? 'selected' : '' ?>>
                                                <?= $value['nama_satuan']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="floatingSelect">Satuan Produk</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelect" name="txtKategori"
                                        aria-label="State">
                                        <option selected>Pilih Kategori Produk</option>
                                        <?php foreach ($kategori as $value): ?>
                                            <option value="<?= $value['id_kategori']; ?>"
                                                <?= ($produk['id_kategori'] == $value['id_kategori']) ? 'selected' : '' ?>>
                                                <?= $value['nama_kategori']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="floatingSelect">Kategori Produk</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control uang" id="hargaBeli" name="txtHargaBeli"
                                        value="<?= $produk['harga_beli']; ?>">
                                    <label for="hargaBeli">Harga Beli</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control uang" id="hargaJual" name="txtHargaJual"
                                        value="<?= $produk['harga_jual']; ?>">
                                    <label for="hargaJual">Harga Jual</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control produk" id="stok" name="txtStok"
                                        value="<?= $produk['stok']; ?>">
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