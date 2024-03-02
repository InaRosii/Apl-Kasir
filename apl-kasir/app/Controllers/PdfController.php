<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use Dompdf\Dompdf;
use App\Models\Mproduk;
use App\Models\Mpenjualan;

class PdfController extends BaseController
{
    public function generate()
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // Load library Dompdf
        $data =[
            'listProduk'=>$this->produk->getLaporanProduk(),
            
        ];
        $html = view('laporan/pdf', $data);
        $dompdf->loadHtml($html);

        // Convert HTML ke PDF
        $dompdf->loadHtml($html);

        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF ke browser
        $dompdf->render();

        // Tampilkan PDF dalam browser
        $dompdf->stream('laporan-stok', ['Attachment' => true]);
    }
   
    // public function generatePenjualan()
    // {
    //     // instantiate and use the dompdf class
    //     $dompdf = new Dompdf();

    //     // Load library Dompdf
    //     $data =[
    //         'listPenjualan'=>$this->penjualan->getPdfPenjualan(),
            
    //     ];
    //     $html = view('laporan/pdf-penjualan', $data);
    //     $dompdf->loadHtml($html);

    //     // Convert HTML ke PDF
    //     $dompdf->loadHtml($html);

    //     // Setting ukuran dan orientasi kertas
    //     $dompdf->setPaper('A4', 'portrait');

    //     // Render PDF ke browser
    //     $dompdf->render();

    //     // Tampilkan PDF dalam browser
    //     $dompdf->stream('laporan-penjualan', ['Attachment' => true]);
    // }
}
