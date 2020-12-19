<?php namespace App\Modules\Kategori\Controllers;

use App\Controllers\BaseController;

class Kategori extends BaseController
{

    private $path = 'pages/kategori';

    public function index()
    {

        $data = [
            'user' => 'Tri',
            'page_title' => 'Kategori',
        ];
        return view($this->path.'/list', $data);
    }

    public function edit_modal()
    {
        echo view($this->path.'/edit_modal');
    }
}
