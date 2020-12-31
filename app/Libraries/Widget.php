<?php 
namespace App\Libraries;

use App\Modules\Kategori\Models\KategoriModel;

class Widget 
{
    function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }
    public function modal(){
        $kategori = $this->kategoriModel->find(1);
        $data = [
            'kategori' => $kategori,
        ];
        return view('pages/kategori/edit_modal', $data);
    }
}
