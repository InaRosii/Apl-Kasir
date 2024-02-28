<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Aplikasi Kasir</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/img/favicon.png'); ?>" rel="icon">
    <link href="<?= base_url('assets/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/quill/quill.snow.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/quill/quill.bubble.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/simple-datatables/style.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



    <!-- Header -->
    <?= $this->include('layout/header'); ?>

    <!-- Sidebar -->
    <?= $this->include('layout/sidebar'); ?>

    <!-- Begin Page Content -->
    <?= $this->renderSection('content'); ?>

    <!-- Footer -->
    <?= $this->include('layout/footer'); ?>



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/vendor/apexcharts/apexcharts.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/chart.js/chart.umd.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/echarts/echarts.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/quill/quill.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/simple-datatables/simple-datatables.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/tinymce/tinymce.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/php-email-form/validate.js'); ?>"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>



    <!-- Panggil jQuery Mask -->
    <script src="<?= base_url('assets/jquery/jquery.js'); ?>"></script>
    <script src="<?= base_url('assets/jquery-mask/jquery.mask.js'); ?>"></script>

    <script>
        $(document).ready(function () {

            //Merubah angka menjadi font uang
            $('.uang').mask('000.000.000.000.000', { reverse: true });

            //Merubah angka menjadi format produk stok
            $('.produk').mask('000.000', { reverse: true });

        });
    </script>

    <script>
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });

        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            periksaKeterkaitanDataSatuan();
            periksaKeterkaitanDataKategori();

            // Periksa keterkaitan satuan
            function periksaKeterkaitanDataSatuan() {
                let daftarIdData = [];
                let buttons = document.querySelectorAll('#hapusSatuan');
                buttons.forEach(function (button) {
                    daftarIdData.push(button.dataset.id);
                });

                daftarIdData.forEach(function (idData) {
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', '<?= site_url('cek-satuan-digunakan/'); ?>' + idData, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {

                                // Respons berhasil diterima
                                let response = JSON.parse(xhr.responseText);

                                if (response.has_keterkaitan) {
                                    let tombol = document.querySelector('#hapusSatuan[data-id="' + idData + '"]');
                                    tombol.disabled = true;

                                    let pesan = document.createElement('span');
                                    pesan.classList.add('pesan-error');
                                    pesan.textContent = 'Data sudah digunakan dan tidak bisa dihapus';

                                    pesan.style.display = 'inline-block';
                                    pesan.style.color = 'red';
                                    pesan.style.marginLeft = '10px';
                                    pesan.style.backgroundColor = 'rgba(255, 0, 0, 0.1)';

                                    tombol.parentNode.insertBefore(pesan, tombol.nextSibling);
                                }
                            } else {
                                // Respons gagal
                                console.error('Terjadi kesalahan saat melakukan permintaan AJAX');
                            }
                        }
                    };
                    xhr.send();
                });
            }

            // Periksa keterkaitan kategori
            function periksaKeterkaitanDataKategori() {
                let daftarIdData = [];
                let buttons = document.querySelectorAll('#hapusKategori');
                buttons.forEach(function (button) {
                    daftarIdData.push(button.dataset.id);
                });

                daftarIdData.forEach(function (idData) {
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', '<?= site_url('cek-kategori-digunakan/'); ?>' + idData, true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {

                                // Respons berhasil diterima
                                let response = JSON.parse(xhr.responseText);

                                if (response.has_keterkaitan) {
                                    let tombol = document.querySelector('#hapusKategori[data-id="' + idData + '"]');
                                    tombol.disabled = true;

                                    let pesan = document.createElement('span');
                                    pesan.classList.add('pesan-error');
                                    pesan.textContent = 'Data sudah digunakan dan tidak bisa dihapus';

                                    pesan.style.display = 'inline-block';
                                    pesan.style.color = 'red';
                                    pesan.style.marginLeft = '10px';
                                    pesan.style.backgroundColor = 'rgba(255, 0, 0, 0.1)';

                                    tombol.parentNode.insertBefore(pesan, tombol.nextSibling);
                                }
                            } else {
                                // Respons gagal
                                console.error('Terjadi kesalahan saat melakukan permintaan AJAX');
                            }
                        }
                    };
                    xhr.send();
                });
            }
        });
    </script>



</body>

</html>