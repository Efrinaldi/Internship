<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DriverModel;
use App\Models\OrderModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $oauth_user;
    public function __construct()
    {
        $this->Driver_model = new DriverModel();
        $this->Order_model = new OrderModel();
    }
    public function index()
    {
        return view('welcome_message');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function order()
    {
        // $order = $this->Order_model->findAll();
        // $data = [
        //     'order' => $order,
        // ];
        $order = new OrderModel();
        $session = session()->get();
        $user = $session['unit_kerja'];
        // dd($user);
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.id_user,oauth_user.nama_user,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.status = 0 AND orders.keterangan = 'Pending' AND orders.unit_kerja = '$user'");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('order', $data);
        // return view('order', $data);
    }

    public function driver()
    {
        $driver = $this->Driver_model

            ->findAll();
        $data = [
            'driver' => $driver,
        ];
        return view('driver', $data);
    }

    public function history()
    {
        return view('history');
    }

    public function process()
    {
        // $order = $this->Order_model->findAll();
        // $data = [
        //     'order' => $order,
        // ];
        $order = new OrderModel();
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.id_user,oauth_user.nama_user,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.status = 1 AND orders.keterangan = 'Pending'");
        $rows = $query->getResultArray();

        $data = [
            'order' => $rows,
        ];
        return view('process', $data);
        // return view('order', $data);
    }
    public function request()
    {
        return view('request');
    }
    public function admin()
    {
        $usermodel = new UserModel();
        $data['oauth_user'] = $usermodel->findAll();
        return view('admin', $data);
    }
    public function user()
    {
        $usermodel = new UserModel();
        $data['oauth_user'] = $usermodel->findAll();
        return view('user', $data);
    }

    public function history_approve()
    {

        $order = new OrderModel();
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.id_user,orders.keterangan,oauth_user.nama_user,oauth_user.nip,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.keterangan = 'Approve'");
        $rows = $query->getResultArray();

        $data = [
            'order' => $rows,
        ];

        return view('history_approve', $data);
    }

    public function history_reject()
    {
        $order = new OrderModel();
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.id_user,orders.keterangan,oauth_user.nama_user,oauth_user.nip,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.keterangan = 'Reject'");
        $rows = $query->getResultArray();

        $data = [
            'order' => $rows,
        ];
        return view('history_reject', $data);
    }
}