<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use Dompdf\Dompdf;
use App\Models\Mproduk;
use App\Models\Mpenjualan;

class PdfController extends BaseController
{
    public function index()
    {
        $data =[
            'listProduk'=>$this->produk->getLaporanProduk()
        ];
        return view('laporan/pdf', $data);
    }
    public function pdfPenjualan()
    {
        $data =[
            'listPenjualan'=>$this->penjualan->getPdfPenjualan()
        ];
        return view('laporan/pdf-penjualan', $data);
    }

    public function generate()
    {
        $filename = date('y-m-d-h-i-s'). '-laporan-stok';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $data =[
            'listProduk'=>$this->produk->getLaporanProduk()
        ];
        $html = view('laporan/pdf', $data);
        $dompdf->loadHtml($html);

        // (optimal) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as pdf
        $dompdf->render();

        // output the generate pdf
        $dompdf->stream($filename);
    }
    public function generatePenjualan()
    {
        $filename = date('y-m-d-h-i-s'). '-laporan-penjualan';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $data =[
            'listPenjualan'=>$this->penjualan->getPdfPenjualan()
        ];
        $html = view('laporan/pdf-penjualan', $data);
        $dompdf->loadHtml($html);

        // (optimal) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as pdf
        $dompdf->render();

        // output the generate pdf
        $dompdf->stream($filename);
    }
}
