<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Satuan extends BaseController
{
    public function index()
    {
        //
    }

    public function dataSatuan()
    {
        $data = [
            'listSatuan' => $this->satuan->getSatuan()
        ];

        return view('satuan/data-satuan', $data);
    }

    public function cek_keterkaitan_data($id)
    {
        // Lakukan pemeriksaan keterkaitan data
        $keterkaitan = $this->satuan->cekKeterkaitan($id);

        // Kirim respon ke AJAX
        return $this->response->setJSON(['has_keterkaitan' => $keterkaitan]);
    }


    public function tambahSatuan()
    {
        return view('satuan/tambah-satuan');
    }
    public function simpanSatuan()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'txtNamaSatuan' => 'required|is_unique[tbl_satuan.nama_satuan]'
        ];

        $messages = [
            'txtNamaSatuan' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'Satuan Produk sudah ada! Silahkan coba lagi.'
            ]
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama_satuan' => $this->request->getVar('txtNamaSatuan')
        ];

        $this->satuan->insert($data);

        return redirect()->to('/data-satuan')->with('pesan', 'Data berhasil disimpan.');
    }

    public function edit($id = null)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'satuan' => $this->satuan->updateSatuan($id)
        ];
        return view('satuan/edit-satuan', $data);
    }
    public function simpanEdit($id)
    {
        $data = [
            'nama_satuan' => $this->request->getVar('txtNamaSatuan')
        ];

        $this->satuan->update($id, $data);
        return redirect()->to('data-satuan')->with('pesan', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->satuan->delete($id);
        return redirect()->to('/data-satuan')->with('pesan', 'Data berhasil dihapus.');
    }
}