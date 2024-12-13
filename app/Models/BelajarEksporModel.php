<?php

namespace App\Models;

use CodeIgniter\Model;

class BelajarEksporModel extends Model
{
    protected $table            = 'belajar_ekspor';
    protected $primaryKey       = 'id_belajar_ekspor';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'id_kategori_belajar_ekspor',
        'judul_belajar_ekspor',
        'judul_belajar_ekspor_en',
        'foto_belajar_ekspor',
        'deskripsi_belajar_ekspor',
        'deskripsi_belajar_ekspor_en',
        'meta_title',
        'meta_title_en',
        'meta_deskripsi',
        'meta_deskripsi_en',
        'views',
        'created_at',
        'updated_at',
        'slug',
        'slug_en',
    ];


    public function getAllWithCategory()
    {
        return $this->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori, kategori_belajar_ekspor.nama_kategori_en')
            ->join('kategori_belajar_ekspor', 'kategori_belajar_ekspor.id_kategori_belajar_ekspor = belajar_ekspor.id_kategori_belajar_ekspor')
            ->findAll();
    }

    public function getByCategoryWithPagination($id_kategori_belajar_ekspor, $perPage, $page)
    {
        return $this->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori, kategori_belajar_ekspor.nama_kategori_en')
            ->join('kategori_belajar_ekspor', 'kategori_belajar_ekspor.id_kategori_belajar_ekspor = belajar_ekspor.id_kategori_belajar_ekspor')
            ->where('belajar_ekspor.id_kategori_belajar_ekspor', $id_kategori_belajar_ekspor)
            ->paginate($perPage, 'default', $page);
    }

    public function getAllWithCategoryAndPagination($perPage, $page)
    {
        return $this->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori, kategori_belajar_ekspor.nama_kategori_en')
            ->join('kategori_belajar_ekspor', 'kategori_belajar_ekspor.id_kategori_belajar_ekspor = belajar_ekspor.id_kategori_belajar_ekspor')
            ->paginate($perPage, 'default', $page);
    }

    public function getSearchAllWithCategory($keyword)
    {
        return $this->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori, kategori_belajar_ekspor.nama_kategori_en')
            ->join('kategori_belajar_ekspor', 'kategori_belajar_ekspor.id_kategori_belajar_ekspor = belajar_ekspor.id_kategori_belajar_ekspor')
            ->like('judul_belajar_ekspor', $keyword)
            ->orLike('judul_belajar_ekspor_en', $keyword)
            ->orLike('deskripsi_belajar_ekspor', $keyword)
            ->orLike('deskripsi_belajar_ekspor_en', $keyword)
            ->findAll();
    }

    public function getSearchAllWithCategoryAndPagination($keyword, $perPage, $page)
    {
        return $this->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori, kategori_belajar_ekspor.nama_kategori_en')
            ->join('kategori_belajar_ekspor', 'kategori_belajar_ekspor.id_kategori_belajar_ekspor = belajar_ekspor.id_kategori_belajar_ekspor')
            ->like('judul_belajar_ekspor', $keyword)
            ->orLike('judul_belajar_ekspor_en', $keyword)
            ->orLike('deskripsi_belajar_ekspor', $keyword)
            ->orLike('deskripsi_belajar_ekspor_en', $keyword)
            ->paginate($perPage, 'default', $page);
    }

    public function getByCategory($id_kategori_belajar_ekspor)
    {
        return $this->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori, kategori_belajar_ekspor.nama_kategori_en')
            ->join('kategori_belajar_ekspor', 'kategori_belajar_ekspor.id_kategori_belajar_ekspor = belajar_ekspor.id_kategori_belajar_ekspor')
            ->where('belajar_ekspor.id_kategori_belajar_ekspor', $id_kategori_belajar_ekspor)
            ->findAll();
    }

    public function getSpecificByCategoryWithPagination($id_kategori_belajar_ekspor, $perPage, $page)
    {
        return $this->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori, kategori_belajar_ekspor.nama_kategori_en')
            ->join('kategori_belajar_ekspor', 'kategori_belajar_ekspor.id_kategori_belajar_ekspor = belajar_ekspor.id_kategori_belajar_ekspor')
            ->where('belajar_ekspor.id_kategori_belajar_ekspor', $id_kategori_belajar_ekspor)
            ->paginate($perPage, 'default', $page);
    }

    public function getFreeCategory()
    {
        return $this->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori, kategori_belajar_ekspor.nama_kategori_en')
            ->join('kategori_belajar_ekspor', 'kategori_belajar_ekspor.id_kategori_belajar_ekspor = belajar_ekspor.id_kategori_belajar_ekspor')
            ->orderBy('created_at', 'ASC')
            ->limit(10)
            ->findAll();
    }

    public function getRelatedFreeCategory($slug)
    {
        return $this->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori, kategori_belajar_ekspor.nama_kategori_en')
            ->join('kategori_belajar_ekspor', 'kategori_belajar_ekspor.id_kategori_belajar_ekspor = belajar_ekspor.id_kategori_belajar_ekspor')
            ->where('belajar_ekspor.slug !=', $slug)
            ->orderBy('created_at', 'ASC')
            ->limit(3)
            ->findAll();
    }

    // public function getByCategory($id_kategori)
    // {
    //     return $this->select('belajar_ekspor.*, kategori_belajar_ekspor.nama_kategori')
    //         ->join('kategori_belajar_ekspor', 'belajar_ekspor.id_kategori_belajar_ekspor = kategori_belajar_ekspor.id_kategori_belajar_ekspor')
    //         ->where('belajar_ekspor.id_kategori_belajar_ekspor', $id_kategori)
    //         ->findAll();
    // }

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
