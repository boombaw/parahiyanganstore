<?php

namespace App\Modules\Reseller\Models;

use App\Modules\Reseller\Controllers\Reseller;
use CodeIgniter\Model;

class ResellerModel extends Model
{
    protected $table      = 'reseller';
    protected $returnType = Reseller::class;
    protected $allowedFields = [
        'name', 'join_date'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}
