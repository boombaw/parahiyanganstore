<?php

namespace App\Modules\Kategori\Models;

use App\Modules\Kategori\Controllers\Kategori;
use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table      = 'kategori';
    protected $returnType = Kategori::class;
    protected $allowedFields = [
        'name'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    public function getList()
    {
        $sql = "SELECT 
                    a.name as kategori,
                    a.id as kategori_id,
                    b.name as jenis,
                    b.id as jenis_id
                FROM kategori a 
                JOIN kategori b on a.id = b.parent
                WHERE a.deleted_at is null and b.deleted_at is null";

        return $this->db->query($sql);
    }
}
