<?php namespace App\Modules\Jenis\Controllers;

use App\Controllers\BaseController;

class Jenis extends BaseController
{

    private $path = 'pages/jenis';

    public function index()
    {

        $data = [
            'user' => 'Tri',
            'page_title' => 'Jenis',
        ];
        return view($this->path.'/list', $data);
    }

    public function edit_modal()
    {
        echo view($this->path.'/edit_modal');
    }
}
