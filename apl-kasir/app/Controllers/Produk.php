<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    // public function index()
    // {
    //     //
    // }

    public function dataProduk()
    {
        $data = [
            'listProduk' => $this->produk->getProduk()
        ];
        return view('produk/data-produk', $data);
    }

    public function tambahProduk()
    {
        $data = [
            'satuan' => $this->satuan->findAll(),
            'kategori' => $this->kategori->findAll(),
            'kodeProduk' => $this->produk->generateProductCode()
        ];
        return view('produk/tambah-produk', $data);
    }

    public function simpanProduk()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'txtKodeProduk' => 'required|is_unique[tbl_produk.kode_produk]',
            'txtNamaProduk' => 'required|is_unique[tbl_produk.nama_produk]',
            'txtHargaBeli' => 'required',
            'txtHargaJual' => 'required|checkHargaValid[txtHargaBeli,txtHargaJual]',
            'txtSatuan' => 'required',
            'txtKategori' => 'required',
            'txtStok' => 'required|greater_than[0]',
        ]; 


        $messages = [
            'txtKodeProduk' => [
                'required' => 'Kode Produk tidak boleh kosong!',
                'is_unique' => 'Kode Produk sudah ada! Silahkan coba lagi.'
            ],
            'txtNamaProduk' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'Produk sudah ada! Silahkan coba lagi.'
            ],
            'txtHargaBeli' => [
                'required' => 'Tidak boleh kosong!'
            ],
            'txtHargaJual' => [
                'required' => 'Tidak boleh kosong!',
                'checkHargaValid' => 'Harga jual tidak boleh lebih kecil dari harga beli!'
            ],
            'txtSatuan' => [
                'required' => 'Tidak boleh kosong!'
            ],
            'txtKategori' => [
                'required' => 'Tidak boleh kosong!'
            ],
            'txtStok' => [
                'required' => 'Tidak boleh kosong!',
                'greater_than' => 'Stok harus lebih besar dari 0!'
            ]
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'kode_produk' => $this->request->getVar('txtKodeProduk'),
            'nama_produk' => $this->request->getVar('txtNamaProduk'),
            'harga_beli' => str_replace('.', '', $this->request->getVar('txtHargaBeli')),
            'harga_jual' => str_replace('.', '', $this->request->getVar('txtHargaJual')),
            'id_satuan' => $this->request->getVar('txtSatuan'),
            'id_kategori' => $this->request->getVar('txtKategori'),
            'stok' => str_replace('.', '', $this->request->getVar('txtStok'))
        ];

        $this->produk->insert($data);

        return redirect()->to('/data-produk')->with('pesan', 'Data berhasil disimpan.');
    }

    public function edit($id = null)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'produk' => $this->produk->getProdukById($id),
            'satuan' => $this->satuan->findAll(),
            'kategori' => $this->kategori->findAll()
        ];
        return view('produk/edit-produk', $data);
    }

    public function simpanEdit($id)
    {
        $data = [
            // "kode_produk" => $this->request->getPost('txtKodeProduk'),
            "nama_produk" => $this->request->getVar('txtNamaProduk'),
            "harga_beli" => str_replace('.', '', $this->request->getVar('txtHargaBeli')),
            "harga_jual" => str_replace('.', '', $this->request->getVar('txtHargaJual')),
            "id_satuan" => $this->request->getVar('txtSatuan'),
            "id_kategori" => $this->request->getVar('txtKategori'),
            "stok" => str_replace('.', '', $this->request->getVar('txtStok'))
        ];
        //var_dump($data);
        $this->produk->update($id, $data);
        return redirect()->to('/data-produk')->with('pesan', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->produk->delete($id);
        return redirect()->to('/data-produk')->with('pesan', 'Data berhasil dihapus.');

    }
}
