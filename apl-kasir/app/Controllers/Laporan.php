<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Laporan extends BaseController
{
    public function index()
    {
        //
    }

    public function dataStok()
    {
        $data = [
            'dataStok' => $this->produk->getStok()
        ];
        return view('laporan/stok-produk', $data);
    }

    public function dataPenjualan()
    {
        $data = [
            'dataPenjualan' => $this->penjualan->getLaporanPenjualan()
        ];
        return view('laporan/laporan-penjualan', $data);
    }
}
