<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <?php if (session()->get('level') == 'Admin'): ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= site_url('dashboard-admin'); ?>">
          <i class="bi bi-grid-1x2"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
    <?php endif; ?>

    <?php if (session()->get('level') == 'Kasir'): ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= site_url('dashboard-admin'); ?>">
          <i class="bi bi-grid-1x2"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
    <?php endif; ?>


    <?php if (session()->get('level') == 'Admin'): ?>
      <li class="nav-heading">Master Data</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= site_url('data-kategori'); ?>">
          <i class="bi bi-box-seam"></i>
          <span>Kategori Produk</span>
        </a>
    </li><!-- End Kategori Page Nav -->
    <?php endif; ?>

    <?php if (session()->get('level') == 'Admin'): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= site_url('data-satuan'); ?>">
        <i class="bi bi-card-list"></i>
        <span>Satuan Produk</span>
      </a>
    </li><!-- End Satuan Page Nav -->
    <?php endif; ?>

    <?php if (session()->get('level') == 'Admin'): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= site_url('data-produk'); ?>">
        <i class="bi bi-journal-text"></i>
        <span>Produk</span>
      </a>
    </li><!-- End Produk Page Nav -->
    <?php endif; ?>

    <?php if (session()->get('level') == 'Admin'): ?>
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= site_url('data-user'); ?>">
        <i class="bi bi-people"></i>
        <span>Pengguna</span>
      </a>
    </li><!-- End Pengguna Page Nav -->
    <?php endif; ?>

    <?php if (session()->get('level') == 'Kasir'): ?>
    <li class="nav-heading">Transaksi</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= site_url('transaksi-penjualan'); ?>">
        <i class="bi bi-basket"></i>
        <span>Penjualan</span>
      </a>
    </li><!-- End Kategori Page Nav -->
    <?php endif; ?>

    <?php if (session()->get('level') == 'Admin'): ?>
    <li class="nav-heading">Laporan</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= site_url('laporan'); ?>">
        <i class="bi bi-bar-chart-line"></i>
        <span>Stok Barang</span>
      </a>
    </li><!-- End Login Page Nav -->
    <?php endif; ?>

    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href=" ">
        <i class="bi bi-graph-up"></i>
        <span>Penjualan</span>
      </a>
    </li> -->

  </ul>

</aside><!-- End Sidebar-->