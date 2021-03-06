<?php

namespace App\Models;

use CodeIgniter\Model;

class ReimburseModel extends Model
{
    protected $table            = 'reimburse';
    protected $primaryKey       = 'id';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_pemesanan', 'deskripsi', 'nominal', 'photo', 'status', 'created_by'];
    protected $useTimestamps    = true;

    public function getPemesanan()
    {
        $query = $this->db->table('reimburse')
                ->select('reimburse.*, pengemudi.nama_pengemudi')
                ->join('pemesanan', 'reimburse.id_pemesanan = pemesanan.id')
                ->join('pengemudi', 'pemesanan.id_pengemudi = pengemudi.id_pengemudi')
                ->where('reimburse.status', 'Requesting')
                ->get();
        return $query;
    }

    public function getList($get_id_pengemudi = null)
    {
        $query =  $this->db->table('pemesanan')
            ->join('orders', 'pemesanan.id_pemesanan = orders.id')
            ->join('pengemudi', 'pemesanan.id_pengemudi = pengemudi.id_pengemudi')
            ->where('pengemudi.id_user', $get_id_pengemudi)
            ->get();
        return $query;
    }
    public function getApprove($keyword, $date_awal, $date_akhir)
    {
        $builder = $this->db->table('reimburse');
        $builder->select('reimburse.*, pengemudi.nama_pengemudi');
        $builder->join('pemesanan', 'reimburse.id_pemesanan = pemesanan.id');
        $builder->join('pengemudi', 'pemesanan.id_pengemudi = pengemudi.id_pengemudi');
        $builder->where('reimburse.status', 'Approved');
        if ($keyword != '') {
            $builder->like('pengemudi.nama_pengemudi', $keyword);
        }
        $builder->where('reimburse.updated_at BETWEEN "' . $date_awal . '" and "' . $date_akhir . '"');
        $query = $builder->get();
        return $query;
    }
}
