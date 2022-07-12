<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CarModel;
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
        $this->validate     = \Config\Services::validation();
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
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.id_user,oauth_user.nama_user,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.status = 0 AND orders.keterangan = 'Pending' AND orders.unit_kerja = '$user'");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('order', $data);
        // return view('order', $data);
    }



    public function post_car($id_user)
    {

        $order = new CarModel();
        $rules = [
            'plat_nomor' => [
                'rules' => 'required|min_length[3]',
            ],
            'id_user' => [
                'rules' => 'required'
            ],
            'keterangan_mobil' => [
                'rules' => 'required|min_length[3]',
            ]
        ];
        if ($this->validate->setRules($rules)) {
            $data = [
                'id_user' => $id_user,
                'keterangan_mobil' => $this->request->getVar('keterangan_mobil'),
                'plat_nomor' => $this->request->getVar('plat_nomor'),
                'status_mobil' => $this->request->getVar('plat_nomor')
            ];
            $order->insert($data);
            return redirect()->to('request')->with('success', 'Berhasil menyimpan data mobil!');
        }
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
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.id_user,oauth_user.nama_user,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.status = 1 AND orders.keterangan = 'Pending'");
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

    public function list_mobil()
    {

        $user = new UserModel();
        $query   = $user->query("SELECT * FROM oauth_user inner join pengemudi where oauth_user.id_user = pengemudi.id_user;");
        $rows = $query->getResultArray();

        $data = [
            'user' => $rows,
        ];
        return view('mobil', $data);
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
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.id_user,orders.keterangan,oauth_user.nama_user,oauth_user.nip,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.keterangan = 'Approve'");
        $rows = $query->getResultArray();

        $data = [
            'order' => $rows,
        ];


        return view('history_approve', $data);
    }

    public function history_reject()
    {
        $order = new OrderModel();
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.id_user,orders.keterangan,oauth_user.nama_user,oauth_user.nip,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.keterangan = 'Reject'");
        $rows = $query->getResultArray();

        $data = [
            'order' => $rows,
        ];
        return view('history_reject', $data);
    }
}
