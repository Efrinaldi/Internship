<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DepartmentWorkerModel;
use App\Models\DivisiModel;
use App\Models\DriverModel;
use App\Models\OrderModel;
use App\Models\UserDivisiModel;
use App\Models\UserModel;
use App\Models\WorkerModel;
use Tests\Support\RESTful\Worker;

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

    public function homes()
    {
        return view('homes');
    }
    public function list_car()
    {

        $user = new UserModel();
        $query   = $user->query("SELECT * FROM oauth_user inner join pengemudi where oauth_user.id_user = pengemudi.id_user;");
        $rows = $query->getResultArray();
        $data = [
            'user' => $rows,
        ];
        return view('mobil', $data);
    }
    public function order()
    {
        $order = new OrderModel();
        $session = session()->get();
        $user = $session['unit_kerja'];
        // dd($user);
        $query = $order->query(
            "SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,
         orders.tujuan_pakai,orders.id_user,oauth_user.nama_user,orders.tanggal,pemesanan.id
         as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user 
         LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.status = 0 
         AND orders.keterangan = 'Pending' AND orders.unit_kerja = '$user'"
        );
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('order', $data);
        // return view('order', $data);
    }

    public function driver()
    {
        $driver = new DriverModel();


        $query   = $driver->query("SELECT * from oauth_user inner join pengemudi  on pengemudi.id_user = oauth_user.id_user inner join mobil on mobil.id_mobil = pengemudi.id_mobil where oauth_user.role = 'Driver'");
        $rows = $query->getResultArray();
        $data = [
            'driver' => $rows,
        ];
        return view('driver', $data);
    }

    public function history()
    {
        return view('history');
    }
    public function history_supervisor()
    {
        return view('history_supervisor');
    }

    public function process()
    {
        $order = new OrderModel();
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.id_user,oauth_user.nama_user,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.status = 1 AND orders.keterangan = 'Pending'");
        $rows = $query->getResultArray();

        $data = [
            'order' => $rows,
        ];
        return view('process', $data);
    }
    public function request()
    {
        $divisi = new DivisiModel();
        $div = $divisi->query("SELECT * FROM  divisi ")->getResultArray();
        $data = [
            "divisi" => $div
        ];

        return view('request', $data);
    }
    public function admin()
    {
        $usermodel = new UserModel();
        $data['oauth_user'] = $usermodel->findAll();
        return view('admin', $data);
    }
    public function otorisator()
    {
        $usermodel = new UserModel();
        $data['oauth_user'] = $usermodel->findAll();
        return view('otorisator', $data);
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
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.id_user,orders.keterangan,oauth_user.nama_user,oauth_user.nip,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.keterangan = 'Approve' and orders.unit_kerja= 'SKTILOG' ");
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


    public function history_supervisor_approve()
    {
        $unit_kerja = session()->get("unit_kerja");
        $order = new OrderModel();
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.id_user,orders.keterangan,oauth_user.nama_user,oauth_user.nip,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.keterangan = 'Approve' and orders.unit_kerja= $unit_kerja ");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('history_approve', $data);
    }

    public function history_supervisor_reject()
    {
        $unit_kerja = session()->get("unit_kerja");
        $order = new OrderModel();
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.id_user,orders.keterangan,oauth_user.nama_user,oauth_user.nip,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.keterangan = 'Reject' and orders.unit_kerja = $unit_kerja");
        $rows = $query->getResultArray();

        $data = [
            'order' => $rows,
        ];
        return view('history_reject', $data);
    }
}
