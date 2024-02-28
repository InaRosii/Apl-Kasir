<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <span class="bi bi-linkedin d-none d-lg-block">aMart</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
          <span class="d-none d-md-block dropdown-toggle ps-2">
            <?= session()->get('nama_user'); ?>
          </span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>
              <?= session()->get('nama_user'); ?>
            </h6>
            <span>
              <?= session()->get('level'); ?>
            </span>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= site_url('profile'); ?>">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>

          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
          <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
              <i class="bi bi-box-arrow-right fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->