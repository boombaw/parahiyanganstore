<?php namespace App\Modules\Kategori\Controllers;

use App\Controllers\BaseController;
use App\Modules\Kategori\Models\KategoriModel;

class Kategori extends BaseController
{

    function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    private $path = 'pages/kategori';

    public function index()
    {     
        $data = [
            'user' => session('username'),
            'page_title' => 'Kategori',
        ];
        return view($this->path.'/list', $data);
    }

    public function store()
    {
        $validation =  \Config\Services::validation();
        $validation->setRuleGroup('kategori');
        $validation->withRequest($this->request)->run();

        $errors = $validation->getErrors();

        $kategoriName = esc($this->request->getVar('kategori_name'));
        $data = [
            'name' => trim($kategoriName),
        ];

        $kategori = 0;
        if (empty($errors)) {
            $kategori = $this->kategoriModel->insert($data, true);
            $message = 'Kategori ' . $kategoriName . ' berhasil di tambah';
        }else{
            $message = 'Kategori ' . $kategoriName . ' gagal di tambah';
        }

        echo json_encode([
            'status' => true,
            'data' => $kategori,
            'error' => $errors,
            'message' => $message,
        ]);
    }

    public function update()
    {   

        $validation =  \Config\Services::validation();
        $validation->setRuleGroup('kategori');
        $validation->withRequest($this->request)->run();

        $errors = $validation->getErrors();

        $kategori = 0;
        $arr = $this->request->getRawInput();

        if (empty($errors)) {
            $kategori = $this->kategoriModel->update($arr['id'], ['name' => trim(esc($arr['kategori_name']))]);
            $message = 'Kategori ' . $arr['kategori_name'] . ' berhasil di ubah';
        }else{
            $message = 'Kategori ' . $arr['kategori_name'] . ' gagal di ubah';
        }

        echo json_encode([
            'status' => true, 
            'data' => $arr['id'],
            'error' => $errors,
            'message' => $message,
        ]);
    }
    
    public function edit_modal($id)
    {
        $kategori = $this->kategoriModel->find($id);
        $data = [
            'kategori' => $kategori,
        ];
        echo view($this->path.'/edit_modal', $data);
    }

    public function delete()
    {
        $id = $this->request->getRawInput()['id'];
        $hasChild = $this->kategoriModel->where('parent' , $id)
                                        ->countAllResults();

        $message = '';
        $kategori =$this->kategoriModel->find($id);
        if ($hasChild > 0) {
            $message = 'Kategori ' . $kategori->name . ' gagal di hapus, '. $kategori->name . ' masih memiliki jenis';
        }else{
            $this->kategoriModel->delete($id);
            $message = 'Kategori ' . $kategori->name . ' berhasil di hapus';
        }

        echo json_encode([
            'status' => true,
            'data' => null,
            'message' => $message,
        ]); 
    }

    public function load_table(){
        $kategori = $this->kategoriModel->where(['parent' => null])
                                        ->where('deleted_at', NULL)
                                        ->get();
        
        $data = [];
        foreach ($kategori->getResultObject() as $key => $item) {
            $row = [
                $item->name,
                '<div class="form-button-action">
                    <button type="button" data-id="'.$item->id.'" data-toggle="tooltip" title="" class="btn btn-icon btn-primary btn-round edit-kategori" data-original-title="Edit Kategori">
                        <i class="fa fa-edit"></i>
                    </button>
                    &nbsp;&nbsp;
                    <button type="button" data-id="'.$item->id.'" data-toggle="tooltip" title="" class="btn btn-icon btn-danger btn-round delete-kategori" data-original-title="Hapus Kategori">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>'
            ];

            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }
}
