<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Kategori Produk</h5>

                        <!-- Floating Labels Form -->
                        <form action="<?= site_url('update-kategori') ?>" method="POST" class="row g-3">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" value="<?= $kategori['id_kategori']; ?>">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="txtNamaKategori" id="txtNamaKategori"
                                        placeholder="Masukkan kategori produk"
                                        value="<?= $kategori['nama_kategori']; ?>" autofocus>
                                    <label for="txtNamaKategori">Nama Kategori</label>
                                </div>
                            </div>
                            <div>
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