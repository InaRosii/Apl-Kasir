<?php

namespace App\Models;

use CodeIgniter\Model;

class Mkategori extends Model
{
    protected $table = 'tbl_kategori';
    protected $primaryKey = 'id_kategori';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['id_kategori', 'nama_kategori'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    // public function getKategori()
    // {
    //     $kategori = new Mkategori;
    //     $queryKategori = $kategori->query("CALL sp_tampil_kategori()")->getResult();
    //     return $queryKategori;
    // }

    public function getKategori($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_kategori' => $id])->first();
    }

    public function updateKategori($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        
        return $this->where(['id_kategori' => $id])->first();
    }

    public function cekKeterkaitan($id)
    {
        // Contoh: Cek apakah data dengan ID yang diberikan digunakan di tabel lain
        $builder = $this->db->table('tbl_produk');
        $builder->where('id_kategori', $id);
        $count = $builder->countAllResults();

        // Jika terdapat keterkaitan, kembalikan true, jika tidak, kembalikan false
        return ($count > 0);
    }
}
