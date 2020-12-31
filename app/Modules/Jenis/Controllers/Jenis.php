<?php namespace App\Modules\Jenis\Controllers;

use App\Controllers\BaseController;
use App\Modules\Jenis\Models\JenisModel;
use App\Modules\Kategori\Models\KategoriModel;

class Jenis extends BaseController
{

    private $path = 'pages/jenis';

    function __construct()
    {
        $this->jenisModel = new JenisModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'user' => session('username'),
            'page_title' => 'Jenis',
            'kategori' => $this->kategoriModel->where(['parent' => NULL])
                                              ->where('deleted_at', NULL)
                                              ->get(),
        ];
        return view($this->path.'/list', $data);
    }

    public function store()
    {
        $validation =  \Config\Services::validation();
        $validation->setRuleGroup('jenis');
        $validation->withRequest($this->request)->run();

        $errors = $validation->getErrors();

        $name = esc($this->request->getVar('jenis_name'));
        $data = [
            'name' => trim($name),
            'parent' => trim($this->request->getVar('kategori')),
        ];

        $jenis = 0;
        $message = "";
        if (empty($errors)) {
            $jenis = $this->jenisModel->insert($data, true);
            $message = 'Jenis ' . $name . ' berhasil di tambah';
        }else{
            $message = 'Jenis ' . $name . ' gagal di tambah';
        }

        echo json_encode([
            'status' => true,
            'data' => $jenis,
            'error' => $errors,
            'message' => $message,
        ]);
    }

    public function update()
    {   

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'jenis_name' => [
                'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis wajib di isi',
                    ]
                ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis wajib di isi',
                ]
            ],
        ]);
        $validation->withRequest($this->request)->run();

        $errors = $validation->getErrors();

        $kategori = 0;
        $message = '';
        $arr = $this->request->getRawInput();

        if (empty($errors)) {
            $this->jenisModel->update($arr['id'], [
                                                    'name' => trim(esc($arr['jenis_name'])), 
                                                    'parent' => trim(esc($arr['kategori'])),
                                                ]
            );
            $message = 'Jenis ' . $arr['jenis_name'] . ' berhasil di ubah';
        }else{
            $message = 'Jenis ' . $arr['jenis_name'] . ' gagal di ubah';
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
        $jenis = $this->jenisModel->where(['id' => $id])
                                  ->where('parent != ', NULL)
                                  ->get()
                                  ->getRow();
        $kategori = $this->kategoriModel->where(['parent' => NULL])
                                              ->where('deleted_at', NULL)
                                              ->get();
        $data = [
            'jenis' => $jenis,
            'kategori' => $kategori,
        ];
        echo view($this->path.'/edit_modal', $data);
    }

    public function delete()
    {
        $id = $this->request->getRawInput()['id'];
        $jenis =$this->jenisModel->find($id);

        $this->jenisModel->delete($id);
        echo json_encode([
            'status' => true,
            'data' => null,
            'message' => 'Kategori '.$jenis->name.' berhasil di hapus'
        ]); 
    }

    public function load_table(){
        $jenis = $this->kategoriModel->getList();

        $data = [];
        foreach ($jenis->getResultObject() as $key => $item) {
            $row = [
                $item->kategori,
                $item->jenis,
                '<div class="form-button-action">
                    <button type="button" data-id="'.$item->jenis_id.'" data-toggle="tooltip" title="" class="btn btn-icon btn-primary btn-round edit-jenis" data-original-title="Edit Jenis">
                        <i class="fa fa-edit"></i>
                    </button>
                    &nbsp;&nbsp;
                    <button type="button" data-id="'.$item->jenis_id.'" data-toggle="tooltip" title="" class="btn btn-icon btn-danger btn-round delete-jenis" data-original-title="Hapus Jenis">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>'
            ];

            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }
}