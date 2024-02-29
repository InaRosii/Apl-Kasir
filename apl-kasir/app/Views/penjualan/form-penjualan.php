<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card md-12">
                    <div class="card-body">
                        <h1 class="card-title">Form Penjualan</h1>

                        <!-- Floating Labels Form -->
                        <form class="row g-3" method="POST" action="<?= site_url('transaksi-penjualan'); ?>">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" value="<?= $noFaktur; ?>" disabled>
                                    <input type="hidden" name="txtNoFaktur" value="<?= $noFaktur; ?>">
                                    <label for="floatingName">Nomor Faktur</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="email" class="form-control" value="<?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    echo date("Y-m-d H:i:s");
                                    ?>" disabled>
                                    <input type="hidden" name="" value="<?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    echo date("Y-m-d H:i:s");
                                    ?>">
                                    <label for="floatingEmail">Tanggal Penjualan</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control"
                                            value="<?= session()->get('nama_user'); ?>" disabled>
                                        <input type="hidden" name="" value="<?= session()->get('nama_user'); ?>">
                                        <label for="floatingCity">Kasir</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-floating">

                                    <select class="js-example-basic-single form-select" name="txtProduk">
                                        <?php if (isset($produkList)):
                                            foreach ($produkList as $row): ?>
                                                <option value="<?= $row->id_produk; ?>">
                                                    <?= $row->nama_produk; ?> |
                                                    <?= $row->stok; ?>
                                                    |
                                                    <?= number_format($row->harga_jual, 0, ',', '.'); ?>
                                                </option>
                                                <?php
                                            endforeach;
                                        endif; ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="txtTotal">
                                    <label for="floatingPassword">Jumlah</label>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <!-- <a type="reset" class="btn btn-secondary">Reset</a> -->
                            </div>
                        </form><!-- End floating Labels Form -->

                        <div class="row my-3">
                            <div class="col">
                                <!-- Default Table -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($detailPenjualan) && !empty($detailPenjualan)):
                                            $no = 1;
                                            foreach ($detailPenjualan as $detail): ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $detail['nama_produk']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $detail['qty']; ?>
                                                    </td>
                                                    <td>
                                                        <?= number_format($detail['total_harga'], 0, ',', '.'); ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach;
                                        else: ?>
                                            <tr>
                                                <td colspan="4">Tidak ada produk</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>

                                </table>
                                <!-- End Default Table Example -->
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card md-12">
                    <div class="card-body">
                        <h1 class="card-title">Form Pembayaran</h1>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control"
                                        value="<?= number_format($totalHarga, 0, ',', '.'); ?>">
                                    <label for="txtTotal">Total</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="txtbayar" name="txtbayar">
                                    <label for="floatingPassword">Bayar</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kembali" name="kembali">
                                    <label for="floatingPassword">Kembali</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="<?= site_url('pembayaran') ?>" class="btn btn-primary">
                            Simpan
                        </a>
                    </div>

                </div>
            </div>
    </section>

</main><!-- End #main -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil elemen-elemen yang diperlukan
        var txtBayar = document.getElementById('txtbayar');
        var kembali = document.getElementById('kembali');
        var totalHarga = <?= $totalHarga ?>; // Ambil total harga dari controller dan diteruskan ke view

        // Tambahkan event listener untuk memantau perubahan pada input bayar
        txtBayar.addEventListener('input', function () {
            // Ambil nilai yang dibayarkan
            var bayar = parseFloat(txtBayar.value);

            // Hitung kembaliannya
            var kembalian = bayar - totalHarga;

            // Tampilkan kembaliannya pada input kembali
            if (kembalian >= 0) {
                kembali.value = kembalian.toFixed(2).replace(/(\.00)+$/, ''); // Menampilkan hingga 2 digit desimal
            } else {
                kembali.value = '0'; // Jika kembalian negatif, tampilkan '0.00'
            }
        });
    });
</script>


<?= $this->endSection(); ?>