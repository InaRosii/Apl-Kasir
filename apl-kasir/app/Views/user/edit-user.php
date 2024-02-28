<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit data user</h5>

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="<?= site_url('simpan-edit'); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="txtNama" name="txtNama"
                                        value="<?= $user['nama_user']; ?>">
                                    <label for="txtNama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="txtUsername" name="txtUsername"
                                        value="<?= $user['username']; ?>">
                                    <label for="txtUsername">Username</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="txtPassword" name="txtPassword"
                                        value="<?= $user['password']; ?>">
                                    <label for="txtPassword">Password</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="opsiLevel" id="opsiLvel" aria-label="State"
                                        value="<?= $user['level']; ?>">
                                        <option selected> </option>
                                        <option value="Admin" <?php echo ($user['level'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                        <option value="Kasir" <?php echo ($user['level'] == 'Kasir') ? 'selected' : ''; ?>>Kasir</option>
                                    </select>
                                    <label for="opsiLvel">Level</label>
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