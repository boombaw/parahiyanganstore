<?php

namespace App\Modules\Produk\Models;

use App\Modules\Produk\Controllers\Produk;
use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $returnType = Produk::class;
    protected $allowedFields = [
        'name', 'jenis'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    public function getList()
    {
        $sql = "SELECT 
                    a.name as produk,
                    a.id as produk_id,
                    b.name as jenis,
                    b.id as jenis_id
                FROM produk a 
                JOIN kategori b on a.jenis = b.id
                WHERE a.deleted_at is null and b.deleted_at is null";

        return $this->db->query($sql);
    }
}
