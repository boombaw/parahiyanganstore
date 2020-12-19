<?php namespace App\Modules\Produk\Controllers;

use App\Controllers\BaseController;

class Produk extends BaseController
{

    private $path = 'pages/produk';

    public function index()
    {

        $data = [
            'user' => 'Tri',
            'page_title' => 'Produk',
        ];
        return view($this->path.'/list', $data);
    }
}
