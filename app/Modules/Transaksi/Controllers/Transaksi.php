<?php

namespace App\Modules\Transaksi\Controllers;

use App\Controllers\BaseController;
use App\Modules\Produk\Models\ProdukModel;
use App\Modules\Reseller\Models\ResellerModel;
use App\Modules\Transaksi\Models\TransaksiKeluarModel;
use App\Modules\Transaksi\Models\TransaksiMasukModel;

class Transaksi extends BaseController
{
    protected $path = 'pages/transaksi/';

    function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->transaksiMasuk = new TransaksiMasukModel();
        $this->transaksiKeluar = new TransaksiKeluarModel();
        $this->resellerModel = new ResellerModel();
    }
    public function masuk()
    {
     
        $data = [
            'user' => session('username'),
            'page_title' => 'Transaksi Masuk',
            'produk' => $this->produkModel->findAll(),
        ];
        return view($this->path . '/transaksi_masuk', $data);
    }

    public function keluar()
    {
     
        $data = [
            'user' => session('username'),
            'page_title' => 'Transaksi Keluar',
            'reseller' => $this->resellerModel->findAll(),
        ];
        return view($this->path . '/transaksi_keluar', $data);
    }

    public function masuk_reseller()
    {
     

        $data = [
            'user' => session('username'),
            'page_title' => 'Transaksi Masuk Reseller',
        ];
        return view($this->path . '/transaksi_masuk_reseller', $data);
    }

    public function transaksi_masuk_load(){
        $transaksi = $this->transaksiMasuk->getList();

        $data = [];
        foreach ($transaksi->getResultObject() as $key => $item) {
            $row = [
                date('Y-m-d', strtotime($item->transaction_date)),
                $item->no_po,
                $item->produk,
                $item->qty,
                $item->payment_type,
                '<div class="form-button-action">
                    <button type="button" data-id="' . $item->id . '" data-toggle="tooltip" title="" class="btn btn-icon btn-primary btn-round edit-transin" data-original-title="Edit Transaksi">
                        <i class="fa fa-edit"></i>
                    </button>
                    &nbsp;&nbsp;
                    <button type="button" data-id="' . $item->id . '" data-toggle="tooltip" title="" class="btn btn-icon btn-danger btn-round delete-transin" data-original-title="Hapus Transaksi">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>'
            ];

            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }

    public function transaksi_keluar_load(){
        $transaksi = $this->transaksiKeluar->getList();
        $data = [];
        foreach ($transaksi->getResultObject() as $key => $item) {
            $row = [
                $item->no_resi,
                date('Y-m-d', strtotime($item->tgl_transaksi)),
                $item->produk,
                $item->reseller,
                $item->qty,
                $item->pembayaran_pembeli,
                $item->saldo_masuk,
                $item->garansi,
                $item->komisi,
                '<div class="form-button-action">
                    <button type="button" data-id="' . $item->id . '" data-toggle="tooltip" title="" class="btn btn-icon btn-primary btn-round edit-transout" data-original-title="Edit Transaksi">
                        <i class="fa fa-edit"></i>
                    </button>
                    &nbsp;&nbsp;
                    <button type="button" data-id="' . $item->id . '" data-toggle="tooltip" title="" class="btn btn-icon btn-danger btn-round delete-transout" data-original-title="Hapus Transaksi">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </div>'
            ];

            $data[] = $row;
        }

        echo json_encode(['data' => $data]);
    }

    public function transaksi_keluar_store()
    {
        $id = $this->request->getVar('id');
        if ($id) {
            $validation =  \Config\Services::validation();
            $validation->setRuleGroup('transaksiKeluarUpdate');
            $validation->withRequest($this->request)->run();
        }else{

            $validation =  \Config\Services::validation();
            $validation->setRuleGroup('transaksiKeluar');
            $validation->withRequest($this->request)->run();
        }

        $errors = $validation->getErrors();

        $data = [
            'garansi' => trim(esc($this->request->getVar('garansi'))),
            'modal' => trim(esc($this->request->getVar('modal'))),
            'nama_pelanggan' => trim(esc($this->request->getVar('nama_penerima'))),
            'no_resi' => trim(esc($this->request->getVar('no_resi'))),
            'alamat_penerima' => trim(esc($this->request->getVar('alamat_penerima'))),
            'pembayaran_pembeli' => trim(esc($this->request->getVar('pembayaran_pembeli'))),
            'produk' => trim(esc($this->request->getVar('produk'))),
            'qty' => trim(esc($this->request->getVar('qty'))),
            'reseller_id' => trim(esc($this->request->getVar('reseller'))),
            'saldo_masuk' => trim(esc($this->request->getVar('saldo_masuk'))),
            'ukuran' => trim(esc($this->request->getVar('size'))),
            'tgl_transaksi' => trim(esc($this->request->getVar('tgl_transaksi'))),
            'warna' => trim(esc($this->request->getVar('warna'))),
        ];

        $transaksi = 0;
        $message = "";
        if (empty($errors)) {
            if ($id) {
                $transaksi = $this->transaksiKeluar->update($this->request->getVar('id'),$data);
                $message = 'Transaksi berhasil di ubah';
            }else{
                $transaksi = $this->transaksiKeluar->insert($data, true);
                $message = 'Transaksi berhasil di tambah';
            }
        } else {
            $message = 'Transaksi gagal';
        }

        echo json_encode([
            'status' => true,
            'data' => $transaksi,
            'error' => $errors,
            'message' => $message,
        ]);
    }

    public function transaksi_keluar_edit($id)
    {
        $trans = $this->transaksiKeluar->find(['id' => $id]);
        echo json_encode($trans);
    }

    public function transaksi_keluar_delete()
    {
        $id = $this->request->getRawInput()['id'];
        $this->transaksiKeluar->delete($id);
        echo json_encode([
            'status' => true,
            'data' => null,
            'message' => 'Transaksi berhasil di hapus'
        ]); 
    }

    public function transaksi_masuk_store()
    {
        $validation =  \Config\Services::validation();
        $validation->setRuleGroup('transaksiMasuk');
        $validation->withRequest($this->request)->run();

        $errors = $validation->getErrors();

        // $name = esc($this->request->getVar(''));
        // $data = [
        //     'name' => trim($name),
        //     'parent' => trim($this->request->getVar('kategori')),
        // ];

        $jenis = 0;
        $message = "";
        // if (empty($errors)) {
        //     $jenis = $this->jenisModel->insert($data, true);
        //     $message = 'Jenis ' . $name . ' berhasil di tambah';
        // } else {
        //     $message = 'Jenis ' . $name . ' gagal di tambah';
        // }

        echo json_encode([
            'status' => true,
            'data' => $this->request->getVar(),
            'error' => $errors,
            'message' => $message,
        ]);
    }
    
}
