<?php

namespace App\Modules\Jenis\Models;

use App\Modules\Jenis\Controllers\Jenis;
use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $table      = 'kategori';
    protected $returnType = Jenis::class;
    protected $allowedFields = [
        'name', 'parent'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}
