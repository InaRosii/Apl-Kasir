<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    // public function index()
    // {
    //     //
    // }

    public function dataKategori()
    {
        $data = [
            'listKategori' => $this->kategori->getKategori()
        ];
        return view('kategori/data-kategori', $data);
    }

    public function cek_keterkaitan_data($id)
    {
        // Lakukan pemeriksaan keterkaitan data
        $keterkaitan = $this->kategori->cekKeterkaitan($id);

        // Kirim respon ke AJAX
        return $this->response->setJSON(['has_keterkaitan' => $keterkaitan]);
    }

    public function tambahKategori()
    {
        return view('kategori/tambah-kategori');
    }
    public function simpanKategori()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'txtNamaKategori' => 'required|is_unique[tbl_kategori.nama_kategori]'
        ];

        $messages = [
            'txtNamaKategori' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'Kategori Produk sudah ada! Silahkan coba lagi.'
            ]
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama_kategori' => $this->request->getVar('txtNamaKategori')
        ];

        $this->kategori->insert($data);

        return redirect()->to('/data-kategori')->with('pesan', 'Data berhasil disimpan.');

    }

    public function edit($id = null)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategori->updateKategori($id)
        ];
        return view('kategori/edit-kategori', $data);
    }
    public function simpanEdit()
    {
        $data = [
            'nama_kategori' => $this->request->getVar('txtNamaKategori')
        ];

        $this->kategori->update($this->request->getVar('id'), $data);
        return redirect()->to('data-kategori')->with('pesan', 'Data berhasil diubah.');
    }

    public function delete($id)
    {
        $this->kategori->delete($id);
        return redirect()->to('/data-kategori')->with('pesan', 'Data berhasil dihapus.');

    }
}
