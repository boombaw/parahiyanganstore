<?php namespace App\Modules\Produk\Controllers;

use App\Controllers\BaseController;
use App\Modules\Jenis\Models\JenisModel;
use App\Modules\Kategori\Models\KategoriModel;
use App\Modules\Produk\Models\ProdukModel;

class Produk extends BaseController
{

    private $path = 'pages/produk';

    function __construct()
    {
        $this->jenisModel = new JenisModel();
        $this->kategoriModel = new KategoriModel();
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'user' => session('username'),
            'page_title' => 'Produk',
            'jenis' => $this->jenisModel->where('parent != ', NULL)
                                        ->where('deleted_at', NULL)
                                        ->get()->getResultObject(),
        ];
        return view($this->path.'/list', $data);
    }

    public function store()
    {
        $validation =  \Config\Services::validation();
        $validation->setRuleGroup('produk');
        $validation->withRequest($this->request)->run();

        $errors = $validation->getErrors();

        $name = esc($this->request->getVar('produk'));
        $data = [
            'name' => trim(esc($name)),
            'jenis' => trim($this->request->getVar('jenis_produk')),
        ];

        $produk = 0;
        $message = "";
        if (empty($errors)) {
            $produk = $this->produkModel->insert($data, true);
            $message = 'Produk ' . $name . ' berhasil di tambah';
        }else{
            $message = 'Produk ' . $name . ' gagal di tambah';
        }

        echo json_encode([
            'status' => true,
            'data' => $produk,
            'error' => $errors,
            'message' => $message,
        ]);
    }

    public function update()
    {   

        $validation =  \Config\Services::validation();
        $validation->setRuleGroup('produk');
        $validation->withRequest($this->request)->run();

        $errors = $validation->getErrors();

        $kategori = 0;
        $message = '';
        $arr = $this->request->getRawInput();

        if (empty($errors)) {
            $this->produkModel->update($arr['id'], [
                                                    'name' => trim(esc($arr['produk'])), 
                                                    'jenis' => trim(esc($arr['jenis_produk'])),
                                                ]
            );
            $message = 'Produk ' . $arr['produk'] . ' berhasil di ubah';
        }else{
            $message = 'Produk ' . $arr['produk'] . ' gagal di ubah';
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
        $produk = $this->produkModel->where(['id' => $id])
                                  ->where('deleted_at', NULL)
                                  ->get()
                                  ->getRow();

        $jenis = $this->jenisModel->where('parent !=', NULL)
                                  ->where('deleted_at', NULL)
                                  ->get();
        $data = [
            'produk' => $produk,
            'jenis' => $jenis,
        ];
        echo view($this->path.'/edit_modal', $data);
    }

    public function delete()
    {
        $id = $this->request->getRawInput()['id'];
        $produk =$this->produkModel->find($id);

        $this->produkModel->delete($id);
        echo json_encode([
            'status' => true,
            'data' => null,
            'message' => 'Produk '.$produk->name.' berhasil di hapus'
        ]); 
    }

    public function load_table(){
        $produk = $this->produkModel->getList();

        $data = [];
        foreach ($produk->getResultObject() as $key => $item) {
            $row = [
                $item->jenis,
                $item->produk,
                '<div class="form-button-action">
                    <button type="button" data-id="'.$item->produk_id.'" data-toggle="tooltip" title="" class="btn btn-icon btn-primary btn-round edit-produk" data-original-title="Edit Produk">
                        <i class="fa fa-edit"></i>
                    </button>
                    &nbsp;&nbsp;
                    <button type="button" data-id="'.$item->produk_id.'" data-toggle="tooltip" title="" class="btn btn-icon btn-danger btn-round delete-produk" data-original-title="Hapus Produk">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>'
            ];

            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }

    public function load_jenis()
    {
        $jenis = $this->jenisModel->like('name', esc($this->request->getVar('term')))
                                  ->where('parent !=', NULL)
                                  ->where('deleted_at', NULL)
                                  ->get()->getResultObject();

        $data = [];
        foreach ($jenis as $key => $item) {
            $data[] = [
                'value' => $item->name
            ];
        }
        echo json_encode($data);
        // echo json_encode(['result' => $data]);
    }

    public function search()
    {
        $produk = $this->produkModel->like('name', esc(trim($this->request->getVar('term'))))
                                    ->where('deleted_at', NULL)
                                    ->get()
                                    ->getResultObject();
        $data = [];
        foreach($produk as $item){
            $row[] = [ 
                'id' => $item->id,
                'text' => $item->name,
            ];
        }

        $data['result'] = $row;
        echo json_encode($data);
    }
}