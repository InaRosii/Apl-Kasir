<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

  <section class="section">
    <div class="row">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">
              <span class="bi bi-linkedin d-none d-lg-block">Mart</span>
            </h5>

            <?php if (session()->getFlashdata('errors')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                <?php foreach (session('errors') as $error): ?>
                  <?= $error; ?>
                <?php endforeach; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif ?>

            <form action="<?= site_url('register'); ?>" method="POST" class="row g-3 needs-validation" novalidate>
              <div class="col-12">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
                <div class="invalid-feedback">Please, enter your name!</div>
              </div>

              <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group has-validation">
                  <input type="text" name="username" class="form-control" id="username" required>
                  <div class="invalid-feedback">Please choose a username.</div>
                </div>
              </div>

              <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
                <div class="invalid-feedback">Please enter your password!</div>
              </div>

              <div class="col-12">
                <label for="inputState" class="form-label">Level</label>
                <select id="inputState" name="level" class="form-select" required>
                  <option selected> </option>
                  <option value="Admin">Admin</option>
                  <option value="Kasir">Kasir</option>
                </select>
                <div class="invalid-feedback">Please choose your level!</div>
              </div>

              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Create Account</button>
              </div>

              <!-- <div class="col-12">
                <p class="small mb-0 text-center">Already have an account? <a href="pages-login.html">Log in</a>
                </p>
              </div> -->
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>