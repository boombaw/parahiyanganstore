<?php

namespace App\Modules\Transaksi\Controllers;

use App\Controllers\BaseController;

class Transaksi extends BaseController
{
    protected $path = 'pages/transaksi/';

    public function masuk()
    {
        $data = [
            'user' => 'Tri',
            'page_title' => 'Transaksi Masuk',
        ];
        return view($this->path . '/transaksi_masuk', $data);
    }

    public function keluar()
    {
        $data = [
            'user' => 'Tri',
            'page_title' => 'Transaksi Keluar',
        ];
        return view($this->path . '/list', $data);
    }
}
