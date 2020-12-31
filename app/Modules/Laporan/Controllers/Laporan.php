<?php 
namespace App\Modules\Laporan\Controllers;

use App\Controllers\BaseController;
use App\Modules\Reseller\Models\ResellerModel;
use App\Modules\Transaksi\Models\TransaksiKeluarModel;

class Laporan extends BaseController 
{
    public $path = 'pages/laporan_rekap_sales';
    function __construct()
    {
        $this->reseller = new ResellerModel();
        $this->transaksiKeluar = new TransaksiKeluarModel();
    }

    public function rekap_sales()
    {
        $data = [
            'user' => session('username'),
            'title' => 'Laporan Rekap',
            'reseller' => $this->reseller->findAll(),
        ];

        return view($this->path . '/index', $data);
    }

    public function print_excel()
    {
        $id = $this->request->getVar('rid');
        $start_date = $this->request->getVar('startdate');
        $end_date = $this->request->getVar('enddate');

        switch ($this->request->getVar('type')) {
            case 'excel':
                
                if ($id === '' || $id === 'undefined') {
                    $this->_excelAll($start_date, $end_date);
                }else{
                    $this->_excel($id, $start_date, $end_date);
                }
                
            break;
            case 'html':

                if ($id === '' || $id === 'undefined') {
                    $this->_htmlAll($start_date, $end_date);
                }else{
                    $this->_html($id, $start_date, $end_date);
                }

            break;
            default:
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                break;
        }
    }

    function _excel($reseller_id, $start_date, $end_date)
    {
        helper('main');
        $reseller = $this->reseller->find($reseller_id);
        $transaksi  = $this->transaksiKeluar->getTransaksiReseller($reseller_id, $start_date, $end_date);
        $totalKomisiReseller = $this->transaksiKeluar->totalKomisiReseller($reseller_id, $start_date, $end_date);
        $totalOmset = $this->transaksiKeluar->totalOmsetReseller($reseller_id, $start_date, $end_date);
        $totalModal = $this->transaksiKeluar->totalModalReseller($reseller_id, $start_date, $end_date);

        $data = [
            'reseller' => $reseller,
            'transaksi' => $transaksi,
            'totalKomisi' => $totalKomisiReseller->getRow(),
            'totalOmset' => $totalOmset->getRow(),
            'totalModal' => $totalModal->getRow(),
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=rekap_{$reseller->name}.xls");
        
        echo view($this->path. '/rekap', $data);
    }

    function _excelAll($start_date, $end_date)
    {
        helper('main');

        $transaksi  = $this->transaksiKeluar->getTransaksiAll($start_date, $end_date);
        $totalKomisi = $this->transaksiKeluar->totalKomisiAll($start_date, $end_date);
        $totalOmset = $this->transaksiKeluar->totalOmsetAll($start_date, $end_date);
        $totalModal = $this->transaksiKeluar->totalModalAll($start_date, $end_date);

        $data = [
            'reseller' => 'All',
            'transaksi' => $transaksi,
            'totalKomisi' => $totalKomisi->getRow(),
            'totalOmset' => $totalOmset->getRow(),
            'totalModal' => $totalModal->getRow(),
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];

        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=rekap_all.xls");
        
        echo view($this->path. '/rekap_all', $data);
    }

    function _html($reseller_id, $start_date, $end_date)
    {
        helper('main');
        $reseller = $this->reseller->find($reseller_id);
        $transaksi  = $this->transaksiKeluar->getTransaksiReseller($reseller_id, $start_date, $end_date);
        $totalKomisiReseller = $this->transaksiKeluar->totalKomisiReseller($reseller_id, $start_date, $end_date);
        $totalOmset = $this->transaksiKeluar->totalOmsetReseller($reseller_id, $start_date, $end_date);
        $totalModal = $this->transaksiKeluar->totalModalReseller($reseller_id, $start_date, $end_date);

        $data = [
            'reseller' => $reseller,
            'transaksi' => $transaksi,
            'totalKomisi' => $totalKomisiReseller->getRow(),
            'totalOmset' => $totalOmset->getRow(),
            'totalModal' => $totalModal->getRow(),
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];

        echo view($this->path. '/rekap', $data);
    }

    function _htmlAll($start_date, $end_date)
    {
        helper('main');
        
        $transaksi  = $this->transaksiKeluar->getTransaksiAll($start_date, $end_date);
        $totalKomisi = $this->transaksiKeluar->totalKomisiAll($start_date, $end_date);
        $totalOmset = $this->transaksiKeluar->totalOmsetAll($start_date, $end_date);
        $totalModal = $this->transaksiKeluar->totalModalAll($start_date, $end_date);
        

        $data = [
            'reseller' => 'All',
            'transaksi' => $transaksi,
            'totalKomisi' => $totalKomisi->getRow(),
            'totalOmset' => $totalOmset->getRow(),
            'totalModal' => $totalModal->getRow(),
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];

        echo view($this->path. '/rekap_all', $data);
    }
}
