<!DOCTYPE <html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Download PDf Laporan</title>

</head>

<body>
    <h2>Data Laporan Penjualan</h2>
    <a href="<?php echo site_url('pdf/generate-penjualan') ?>">
        <button type="button" class="btn btn-danger">download</button>
    </a>
    <table border=1 width=80% cellpadding=2 cellspacing=0 style="margin-top: 5px; text-align:center">
        <thead>
            <tr bgcolor=silver align=center>
                <td width="5%">No</td>
                <td width="25%">No Faktur</td>
                <td width="50%">Tanggal Penjualan</td>
                <td width="50%">Total</td>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($listPenjualan)):
                $no = 0; // inisialisasi nomor
                foreach ($listPenjualan as $baris):
                    $no++;
                    ?>
                    <tr>
                        <td>
                            <?= $no ?>
                        </td>
                        <td>
                            <?= $baris->no_faktur ?>
                        </td>
                        <td>
                            <?= $baris->tanggal_penjualan ?>
                        </td>
                        <td>
                            <?= $baris->total ?>
                        </td>
                    </tr>
                    <?php
                endforeach;
            endif;
            ?>

        </tbody>
    </table>
</body>

</html>