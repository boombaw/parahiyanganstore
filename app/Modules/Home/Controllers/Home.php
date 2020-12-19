<?php 

namespace App\Modules\Home\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{

    public function index()
    {

        $data = [
            'user' => 'Tri',
            'page_title' => 'Home',
        ];
        return view('pages/home/index', $data);
    }
}
