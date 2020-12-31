<?php

namespace App\Modules\Auth\Models;

use App\Modules\Auth\Controllers\Auth;
use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = 'users';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}
