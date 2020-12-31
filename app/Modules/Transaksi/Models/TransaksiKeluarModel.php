<?php

namespace App\Modules\Transaksi\Models;

use App\Modules\Transaksi\Controllers\Transaksi;
use CodeIgniter\Model;

class TransaksiKeluarModel extends Model
{
    protected $table      = 'transaksi_keluar';
    protected $allowedFields = [
        'no_resi', 
        'tgl_transaksi',
        'reseller_id',
        'saldo_masuk',
        'modal',
        'produk',
        'warna',
        'ukuran',
        'garansi',
        'nama_pelanggan',
        'nohp_pelanggan',
        'alamat_penerima',
        'pembayaran_pembeli',
        'qty'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    public function getList()
    {
        $sql = " SELECT a.*, b.name as reseller, (a.saldo_masuk - a.modal - a.garansi ) as komisi
                FROM transaksi_keluar a
                JOIN reseller b on b.id = a.reseller_id
                where a.deleted_at is null and b.deleted_at is null
                ";

        return $this->db->query($sql);
    }

    public function getTransaksiReseller($reseller_id, $start_date, $end_date)
    {
        $sql = "SELECT
                    no_resi ,
                    tgl_transaksi ,
                    qty,
                    produk ,
                    nama_pelanggan ,
                    pembayaran_pembeli,
                    saldo_masuk ,
                    modal,
                    garansi ,
                    (saldo_masuk - modal - garansi ) as komisi_per_paket
                FROM
                    {$this->table} tk
                WHERE
                    deleted_at is null
                AND reseller_id = {$reseller_id}
                AND tgl_transaksi >= '{$start_date}' 
                AND tgl_transaksi <= '{$end_date}' ";

        return $this->db->query($sql);
    }

    public function getTransaksiAll($start_date, $end_date)
    {
        $sql = "SELECT
                    no_resi ,
                    tgl_transaksi ,
                    qty,
                    produk ,
                    nama_pelanggan ,
                    pembayaran_pembeli,
                    saldo_masuk ,
                    modal,
                    garansi ,
                    (saldo_masuk - modal - garansi ) as komisi_per_paket,
                    r.name as nama_reseller
                FROM
                    {$this->table} tk
                JOIN 
                    reseller r on tk.reseller_id = r.id 
                WHERE
                    r.deleted_at is null and tk.deleted_at is null
                AND tgl_transaksi >= '{$start_date}' 
                AND tgl_transaksi <= '{$end_date}' ";
        
        return $this->db->query($sql);
    }

    public function totalKomisiReseller($reseller_id, $start_date, $end_date)
    {
        $sql = "SELECT 
                    SUM((saldo_masuk - modal - garansi )) as total_komisi
                FROM 
                    {$this->table}
                WHERE
                    deleted_at IS NULL
                AND reseller_id = {$reseller_id} 
                AND tgl_transaksi >= '{$start_date}' 
                AND tgl_transaksi <= '{$end_date}' ";

        return $this->db->query($sql);
    }

    public function totalKomisiAll($start_date, $end_date)
    {
        $sql = "SELECT 
                    SUM((saldo_masuk - modal - garansi )) as total_komisi
                FROM 
                    {$this->table} tk
                JOIN 
                    reseller r on tk.reseller_id = r.id 
                WHERE
                    r.deleted_at is null and tk.deleted_at is null
                AND tgl_transaksi >= '{$start_date}' 
                AND tgl_transaksi <= '{$end_date}' ";

        return $this->db->query($sql);
    }

    public function totalOmsetReseller($reseller_id, $start_date, $end_date)
    {
        $sql = "SELECT
                    SUM(saldo_masuk) as total_omset
                FROM 
                    {$this->table}
                WHERE
                    deleted_at is null
                AND reseller_id = {$reseller_id}
                AND tgl_transaksi >= '{$start_date}' 
                AND tgl_transaksi <= '{$end_date}' ";
        return $this->db->query($sql);
    }

    public function totalOmsetAll($start_date, $end_date)
    {
        $sql = "SELECT
                    SUM(saldo_masuk) as total_omset
                FROM 
                    {$this->table} tk
                JOIN 
                    reseller r on tk.reseller_id = r.id 
                WHERE
                    r.deleted_at is null and tk.deleted_at is null
                AND tgl_transaksi >= '{$start_date}' 
                AND tgl_transaksi <= '{$end_date}' ";
        return $this->db->query($sql);
    }

    public function totalModalReseller($reseller_id, $start_date, $end_date)
    {
        $sql = "SELECT
                    SUM(modal) + SUM(garansi) as total_modal
                FROM 
                    {$this->table}
                WHERE
                    deleted_at is null
                AND reseller_id = {$reseller_id}
                AND tgl_transaksi >= '{$start_date}' 
                AND tgl_transaksi <= '{$end_date}' ";
        return $this->db->query($sql);
    }

    public function totalModalAll($start_date, $end_date)
    {
        $sql = "SELECT
                    SUM(modal) + SUM(garansi) as total_modal
                FROM 
                    {$this->table} tk
                JOIN 
                    reseller r on tk.reseller_id = r.id 
                WHERE
                    r.deleted_at is null and tk.deleted_at is null
                AND tgl_transaksi >= '{$start_date}' 
                AND tgl_transaksi <= '{$end_date}' ";
        return $this->db->query($sql);
    }
}
