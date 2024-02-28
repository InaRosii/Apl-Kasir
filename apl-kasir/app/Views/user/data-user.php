<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <!-- <li class="breadcrumb-item">Master Data</li> -->
                <li class="breadcrumb-item active">Pengguna</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body mt-4">

                        <!-- <h1 class="card-title">Data Kategori Produk</h1>
                        <p>Dibawah ini adalah data Kategori Produk.</p> -->

                        <?php if (session()->getFlashdata('pesan')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                <?= session()->getFlashdata('pesan'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>

                        <div class="row">
                            <div class="col mb-2">
                            <a href="<?= site_url('register'); ?>" type="button" class="btn btn-primary"><i class="bi bi-person-plus"></i> Registrasi</a>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table table-striped datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($listUser as $row): ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $row['nama_user']; ?>
                                        </td>
                                        <td>
                                            <?= $row['username']; ?>
                                        </td>
                                        <td>
                                            <?= $row['password']; ?>
                                        </td>
                                        <td>
                                            <?= $row['level']; ?>
                                        </td>
                                        <td>
                                            <a href="<?= site_url('edit-user/' . $row['id_user']); ?>"
                                                class="ri ri-edit-box-fill btn btn-outline-primary"></a>

                                            <form action="/user/<?= $row['id_user']; ?>" method="POST" class="d-inline">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit"
                                                    class="ri ri-delete-bin-5-fill btn btn-outline-primary"
                                                    onclick="return confirm('Apakah anda yakin ?');"></button>
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
        </div>
    </section>

</main><!-- End #main -->

<?= $this->endSection(); ?>