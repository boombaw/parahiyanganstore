<?php namespace App\Modules\Reseller\Controllers;

use App\Controllers\BaseController;

class Reseller extends BaseController
{

    private $path = 'pages/reseller';

    public function index()
    {

        $data = [
            'user' => 'Tri',
            'page_title' => 'Reseller',
        ];
        return view($this->path.'/list', $data);
    }

    public function edit_modal()
    {
        echo view($this->path.'/edit_modal');
    }
}
