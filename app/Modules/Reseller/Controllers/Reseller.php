<?php namespace App\Modules\Reseller\Controllers;

use App\Controllers\BaseController;
use App\Modules\Reseller\Models\ResellerModel;

class Reseller extends BaseController
{

    private $path = 'pages/reseller';

    function __construct()
    {
        $this->resellerModel = new ResellerModel();
    }

    public function index()
    {
        $data = [
            'user' => session('username'),
            'page_title' => 'Reseller',
        ];
        return view($this->path . '/list', $data);
    }

    public function store()
    {
        $validation =  \Config\Services::validation();
        $validation->setRuleGroup('reseller');
        $validation->withRequest($this->request)->run();

        $errors = $validation->getErrors();

        $name = esc($this->request->getVar('reseller'));
        $data = [
            'name' => trim($name),
            'join_date' => trim($this->request->getVar('join_date')),
        ];

        $reseller = 0;
        $message = "";
        if (empty($errors)) {
            $reseller = $this->resellerModel->insert($data, true);
            $message = 'Reseller ' . $name . ' berhasil di tambah';
        } else {
            $message = 'Reseller ' . $name . ' gagal di tambah';
        }

        echo json_encode([
            'status' => true,
            'data' => $reseller,
            'error' => $errors,
            'message' => $message,
        ]);
    }

    public function update()
    {

        $validation =  \Config\Services::validation();
        $validation->setRuleGroup('reseller');
        $validation->withRequest($this->request)->run();

        $errors = $validation->getErrors();

        $kategori = 0;
        $message = '';
        $arr = $this->request->getRawInput();

        if (empty($errors)) {
            $this->resellerModel->update($arr['id'], [
                'name' => trim(esc($arr['reseller'])),
                'join_date' => trim(esc($arr['join_date'])),
            ]);
            $message = 'Reseller ' . $arr['reseller'] . ' berhasil di ubah';
        } else {
            $message = 'Reseller ' . $arr['reseller'] . ' gagal di ubah';
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
        $reseller = $this->resellerModel->where(['id' => $id])
            ->get()
            ->getRow();
        $data = [
            'reseller' => $reseller,
        ];
        echo view($this->path . '/edit_modal', $data);
    }

    public function delete()
    {
        $id = $this->request->getRawInput()['id'];
        $reseller = $this->resellerModel->find($id);

        $this->resellerModel->delete($id);
        echo json_encode([
            'status' => true,
            'data' => null,
            'message' => 'Reseller ' . $reseller->name . ' berhasil di hapus'
        ]);
    }

    public function load_table()
    {
        $jenis = $this->resellerModel->findAll();
        $data = [];
        foreach ($jenis as $key => $item) {
            
            $row = [
                ucwords($item->name),
                date('Y-m-d', strtotime($item->join_date)),
                '<div class="form-button-action">
                    <button type="button" data-id="' . $item->id . '" data-toggle="tooltip" title="" class="btn btn-icon btn-primary btn-round edit-reseller" data-original-title="Edit Reseller">
                        <i class="fa fa-edit"></i>
                    </button>
                    &nbsp;&nbsp;
                    <button type="button" data-id="' . $item->id . '" data-toggle="tooltip" title="" class="btn btn-icon btn-danger btn-round delete-reseller" data-original-title="Hapus Reseller">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>'
            ];

            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }
}
