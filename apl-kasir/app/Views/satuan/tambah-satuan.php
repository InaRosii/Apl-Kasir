<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Satuan Produk</h5>

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
                        <form class="row g-3" action="<?= site_url('simpan-satuan'); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="txtNamaSatuan"
                                        placeholder="Masukkan satuan produk" name="txtNamaSatuan">
                                    <label for="txtNamaSatuan">Nama Satuan Produk</label>
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