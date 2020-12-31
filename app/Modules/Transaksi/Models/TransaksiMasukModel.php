<?php

namespace App\Modules\Transaksi\Models;

use App\Modules\Transaksi\Controllers\Transaksi;
use CodeIgniter\Model;

class TransaksiMasukModel extends Model
{
    protected $table      = 'transaksi_masuk';
    protected $returnType = Transaksi::class;
    protected $allowedFields = [
        'transaction_date', 
        'no_po',
        'qty',
        'payment_type',
        'price',
        'produk_id',
        'warna',
        'ukuran'
    ];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    public function getList()
    {
        $sql = " SELECT 
                    a.id,
                    a.no_po,
                    b.name as produk,
                    a.qty,
                    IF(a.payment_type = '1', 'Tunai', 'Non Tunai') as payment_type
                FROM ".$this->table." a
                JOIN produk b on a.produk_id = b.id
                WHERE a.deleted_at is NULL and b.deleted_at IS NULL
                ";
        $data = $this->db->query($sql);
        return $data;
    }
}
