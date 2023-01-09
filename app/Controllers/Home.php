<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActivityLogModel;
use App\Models\AtasanModel;
use App\Models\CarModel;
use App\Models\DepartmentWorkerModel;
use App\Models\DivisiModel;
use App\Models\DriverModel;
use App\Models\OrderModel;
use App\Models\OrdersModel;
use App\Models\SecureModel;
use App\Models\UserDivisiModel;
use App\Models\UserModel;
use App\Models\WorkerModel;
use Tests\Support\RESTful\Worker;

class Home extends BaseController
{
    protected $oauth_user;
    public function __construct()
    {
    }
    public function index()
    {
        return view('welcome_message');
    }
    public function dashboard()
    {
        $driver = new DriverModel();
        $order = new OrdersModel();
        $available = $driver->query("SELECT count(pengemudi.userid) as jml_pengemudi FROM pengemudi left join mobil on pengemudi.id_mobil = mobil.id_mobil where status_mobil = 'Tersedia'")->getResultArray();
        $unavailable = $driver->query("SELECT count(pengemudi.userid) as jml_pengemudi FROM pengemudi left join mobil on pengemudi.id_mobil = mobil.id_mobil where status_mobil = 'Tidak Tersedia'")->getResultArray();
        $activity = new ActivityLogModel();
        $data_activity = $activity->query("SELECT * FROM activity_log")->getResultArray();
        $data_orders = $driver->query(" SELECT count(id) as jumlah from orders where tanggal = NOW();")->getResultArray();

        $data = [
            "tersedia" => $available[0]["jml_pengemudi"],
            "tidak_tersedia" => $unavailable[0]["jml_pengemudi"],
            "pemesanan" => $data_orders[0]["jumlah"]
        ];
        return view('dashboard', $data);
    }
    public function activity_log()
    {
        $driver = new DriverModel();
        $available = $driver->query("SELECT count(pengemudi.userid) as jml_pengemudi FROM pengemudi left join mobil on pengemudi.id_mobil = mobil.id_mobil where status_mobil = 'Tersedia'")->getResultArray();
        $unavailable = $driver->query("SELECT count(pengemudi.userid) as jml_pengemudi FROM pengemudi left join mobil on pengemudi.id_mobil = mobil.id_mobil where status_mobil = 'Tidak Tersedia'")->getResultArray();
        $activity = new ActivityLogModel();
        $data_activity = $activity->query("SELECT * FROM activity_log")->getResultArray();
        $data = [
            "tersedia" => $available[0]["jml_pengemudi"],
            "tidak_tersedia" => $unavailable[0]["jml_pengemudi"],
            "data" => $data_activity
        ];
        return view('activity', $data);
    }
    public function homes()
    {
        return view('homes');
    }

    public function list_car()
    {
        $user = new SecureModel();
        $query   = $user->query("SELECT * FROM t_users ;");
        $rows = $query->getResultArray();

        $data = [
            'user' => $rows,
        ];
        return view('mobil', $data);
    }
    public function order()
    {

        $order = new OrderModel();
        $atasan = new AtasanModel();
        $session = session()->get();
        $userid = session("userid");
        $id_divisi = session("id_divisi");
        $divisi = new DivisiModel();
        $list_dept = $divisi->query("SELECT * FROM departemen")->getResultArray();
        $list_atasan = $divisi->query("SELECT id_divisi FROM user_divisi where userid = '$userid' ")->getResultArray();
        $id_divisi_atasan = $list_atasan[0]["id_divisi"];
        $sat_ker = $divisi->query("SELECT * FROM departemen where id_divisi = $id_divisi_atasan")->getResultArray();
        $id_satker = $sat_ker[0]["id_satker"];
        $list_approval = $divisi->query("SELECT * FROM `departemen` where id_satker =$id_satker;")->getResultArray();

        $query = $order->query(
            "SELECT orders.nama,orders.tujuan,orders.asal,orders.tujuan_pakai,orders.tanggal, orders.waktu,orders.id as id_order,orders.keterangan,mobil.plat_nomor,departemen.divisi FROM pemesanan_mobil
             RIGHT JOIN orders ON orders.id = pemesanan_mobil.id LEFT JOIN mobil on mobil.id_mobil=pemesanan_mobil.id_mobil LEFT join departemen 
            on orders.id_divisi = departemen.id_divisi WHERE orders.keterangan = 'Pending' and orders.userid ='$userid'  "
        );
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
            'data_divisi' => $list_approval
        ];

        return view('order', $data);
    }

    public function order_departemen()
    {
        $order = new OrderModel();
        $session = session()->get();
        $userid = session("userid");
        $id_divisi = session("id_divisi");
        $query = $order->query(
            "SELECT orders.id, orders.nama,orders.tujuan,orders.asal,orders.tujuan_pakai,orders.tanggal, orders.waktu
            ,orders.keterangan,mobil.plat_nomor,departemen.divisi  FROM `orders` LEFT JOIN user_divisi on user_divisi.userid= orders.userid left JOIN pemesanan_mobil on 
            pemesanan_mobil.id_pemesanan = orders.id LEFT JOIN mobil on pemesanan_mobil.id_mobil = mobil.id_mobil LEFT join departemen 
            on user_divisi.id_divisi = departemen.id_divisi 
            WHERE orders.keterangan = 'Pending' and orders.approval_userid = '$userid' "
        );
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('order_departemen', $data);
    }


    public function approval_spv()
    {
        $order = new OrderModel();
        $session = session()->get();
        $userid = session("userid");
        $id_divisi = session("id_divisi");
        $query = $order->query(
            "SELECT orders.id, orders.nama,orders.tujuan,orders.asal,orders.tujuan_pakai,orders.tanggal, orders.waktu
            ,orders.keterangan,mobil.plat_nomor,departemen.divisi  FROM `orders` LEFT JOIN atasan on atasan.id_divisi=orders.id_divisi left JOIN pemesanan_mobil on 
            pemesanan_mobil.id_pemesanan = orders.id LEFT JOIN mobil on pemesanan_mobil.id_mobil = mobil.id_mobil LEFT join departemen 
            on orders.id_divisi = departemen.id_divisi 
            WHERE atasan.id_divisi =$id_divisi AND orders.keterangan = 
            'Pending'"
        );
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('order_departemen', $data);
    }

    public function order_logistik()
    {
        $order = new OrderModel();
        $session = session()->get();
        $userid = session("userid");
        $id_divisi = session("id_divisi");
        $query = $order->query(
            "SELECT orders.userid,orders.id,orders.nama,orders.tujuan,orders.asal,orders.tujuan_pakai,orders.tanggal, orders.waktu
            ,orders.keterangan,mobil.plat_nomor,departemen.divisi FROM pemesanan_mobil
             RIGHT JOIN orders ON orders.id = pemesanan_mobil.id LEFT JOIN mobil on mobil.id_mobil=pemesanan_mobil.id_mobil LEFT join departemen 
            on orders.id_divisi = departemen.id_divisi WHERE  orders.keterangan = 
            'Pending' and departemen.divisi='DEPARTEMEN LOGISTIK'   or  orders.keterangan='approve_logistik'  "
        );
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('order_logistik', $data);
    }
    public function driver()
    {
        $driver  = new DriverModel();
        $userdiv = new UserDivisiModel();
        $rows     = $userdiv->query("SELECT * FROM user_divisi where divisi = 'DRIVER' ")->getResultArray();
        $car     = $driver->query("SELECT m.id_mobil, p.nama_pengemudi,m.plat_nomor, p.status_pengemudi,p.userid FROM mobil m left  JOIN pengemudi p ON m.id_mobil = p.id_mobil")->getResultArray();
        $data = [
            'driver' => $rows,
            'mobil'  => $car
        ];
        return view('driver', $data);
    }
    public function add_car_order()
    {
        $car = new CarModel();
        $driver = new DriverModel();
        $userdiv = new UserDivisiModel();
        $userid = $this->request->getVar("userid");
        $data_driver = $driver->query("SELECT * FROM pengemudi where userid='$userid' ")->getResultArray();
        $data_user = $userdiv->query("SELECT * FROM user_divisi where userid='$userid' ")->getResultArray();
        if (count($data_driver) > 0) {
            $data_car = [
                "plat_nomor" => $this->request->getVar("plat_nomor"),
                "keterangan_mobil" => $this->request->getVar("keterangan_mobil"),
                "status_mobil" => $this->request->getVar("status_mobil"),
                "userid" => $userid
            ];
            $car->insert($data_car);
            $id_mobil = $car->getInsertID();
            $data = [
                "id_mobil" => $id_mobil,
                "status_pengemudi" =>  $this->request->getVar("status_mobil"),
                "nama_pengemudi" => $data_user[0]["username"],
            ];
            $driver->update($userid, $data);
        } else if (count($data_driver) == 0) {
            $data_car = [
                "plat_nomor" => $this->request->getVar("plat_nomor"),
                "keterangan_mobil" => $this->request->getVar("keterangan_mobil"),
                "status_mobil" => $this->request->getVar("status_mobil"),
            ];
            $car->insert($data_car);
            $id_mobil = $car->getInsertID();
            $data = [
                "id_mobil" => $id_mobil,
                "status_pengemudi" =>  $this->request->getVar("status_mobil"),
                "nama_pengemudi" => $data_user[0]["username"],
                "userid" => $data_user[0]["userid"]
            ];
            $driver->insert($data);
        }

        return redirect()->to("pick_driver")->with("success", "data berhasil dimasukkan");
    }
    public function add_car()
    {
        $car = new CarModel();
        $driver = new DriverModel();
        $userdiv = new UserDivisiModel();
        $userid = $this->request->getVar("userid");
        $data_driver = $driver->query("SELECT * FROM pengemudi where userid='$userid' ")->getResultArray();
        $data_user = $userdiv->query("SELECT * FROM user_divisi where userid='$userid' ")->getResultArray();
        $data_car = [
            "plat_nomor" => $this->request->getVar("plat_nomor"),
            "keterangan_mobil" => $this->request->getVar("keterangan_mobil"),
            "status_mobil" => $this->request->getVar("status_mobil"),
            "userid" => $userid
        ];
        $car->insert($data_car);
        $id_mobil = $car->getInsertID();


        return redirect()->to("driver");
    }
    public function hapus_driver($id)
    {
        $driver = new CarModel();
        $driver->delete($id);
        return redirect()->to("driver");
    }
    public function history()
    {
        $orders = new OrdersModel();
        $data_order = $orders->query("SELECT count(id) as jml_available FROM orders where orders.keterangan like '%approve%';  ")->getResultArray();
        $data_order_reject = $orders->query("SELECT count(id) as jml_unavailable FROM orders where orders.keterangan like '%reject%'; ")->getResultArray();

        $data = [
            "available" => $data_order[0]["jml_available"],
            "unavailable" => $data_order_reject[0]["jml_unavailable"]
        ];
        return view('history', $data);
    }
    public function history_supervisor()
    {
        $orders = new OrdersModel();
        $data_order = $orders->query("SELECT count(id) as jml_available FROM orders where orders.keterangan like '%approve%';  ")->getResultArray();
        $data_order_reject = $orders->query("SELECT count(id) as jml_unavailable FROM orders where orders.keterangan like '%reject%'; ")->getResultArray();

        $data = [
            "available" => $data_order[0]["jml_available"],
            "unavailable" => $data_order_reject[0]["jml_unavailable"]
        ];
        return view('history', $data);
    }

    public function riwayat()
    {
        $userid = session("userid");
        $orders = new OrdersModel();
        $data_order = $orders->query("SELECT count(id) as jml_available FROM orders where orders.userid like '$userid' ;  ")->getResultArray();
        $data_order_reject = $orders->query("SELECT count(id) as jml_unavailable FROM orders where orders.keterangan like '%reject%' and orders.userid like '$userid'; ")->getResultArray();

        $data = [
            "available" => $data_order[0]["jml_available"],
            "unavailable" => $data_order_reject[0]["jml_unavailable"]
        ];
        return view('riwayat', $data);
    }
    public function process()
    {
        $order = new OrderModel();
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.id_user,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan WHERE orders.status = 1 AND orders.keterangan = 'Pending'");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('process', $data);
    }
    public function request()
    {
        $divisi = new DivisiModel();
        $div = $divisi->query("SELECT * FROM  departemen ")->getResultArray();
        $data = [
            "divisi" => $div,
            "waktuErr" => ""
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
        $id_divisi = session("id_divisi");
        $query   = $order->query("SELECT departemen.divisi,orders.ID ,orders.waktu_end,mobil.plat_nomor,orders.nama,orders.id_divisi,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.userid,orders.keterangan,orders.tanggal,pemesanan_mobil.id as id_pemesanan from orders LEFT JOIN pemesanan_mobil on orders.id =pemesanan_mobil.id_pemesanan 
        left join departemen on departemen.id_divisi = orders.id_divisi left join mobil on pemesanan_mobil.id_mobil = mobil.id_mobil WHERE orders.keterangan like '%approve%' ;");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('history_approve', $data);
    }

    public function history_reject()
    {
        $order = new OrderModel();
        $id_divisi = session("id_divisi");
        $query   = $order->query("SELECT departemen.divisi,orders.ID ,orders.waktu_end,orders.nama,orders.id_divisi,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.userid,orders.keterangan,orders.tanggal,pemesanan_mobil.id as id_pemesanan from orders LEFT JOIN pemesanan_mobil on orders.id =pemesanan_mobil.id_pemesanan 
        left join departemen on departemen.id_divisi = orders.id_divisi WHERE orders.keterangan like '%reject%';");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('history_reject', $data);
    }
    public function approve()
    {
        $userid = session("userid");
        $order = new OrderModel();
        $id_divisi = session("id_divisi");
        $query   = $order->query("SELECT departemen.divisi,orders.ID,orders.waktu_end ,mobil.plat_nomor,orders.nama,orders.id_divisi,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.userid,orders.keterangan,orders.tanggal,pemesanan_mobil.id as id_pemesanan from orders LEFT JOIN pemesanan_mobil on orders.id =pemesanan_mobil.id_pemesanan 
        left join departemen on departemen.id_divisi = orders.id_divisi left join mobil on pemesanan_mobil.id_mobil = mobil.id_mobil WHERE   orders.userid = '$userid'  and orders.keterangan like '%approve%' ;");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('history_approve', $data);
    }

    public function reject()
    {
        $order = new OrderModel();
        $id_divisi = session("id_divisi");
        $userid = session("userid");
        $query   = $order->query("SELECT departemen.divisi,orders.ID ,orders.waktu_end,orders.nama,orders.id_divisi,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.userid,orders.keterangan,orders.tanggal,pemesanan_mobil.id as id_pemesanan from orders LEFT JOIN pemesanan_mobil on orders.id =pemesanan_mobil.id_pemesanan 
        left join departemen on departemen.id_divisi = orders.id_divisi WHERE orders.userid = '$userid' and orders.keterangan like '%reject%';");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('history_reject', $data);
    }

    public function history_supervisor_approve()
    {
        $unit_kerja = session()->get("unit_kerja");
        $id_divisi = session("id_divisi");
        $order = new OrderModel();
        $divisi = new DivisiModel();
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.id_divisi,orders.waktu_end,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.userid,orders.keterangan,orders.tanggal,pemesanan_mobil.id as id_pemesanan from orders LEFT JOIN pemesanan_mobil on orders.id =pemesanan_mobil.id_pemesanan WHERE orders.keterangan = 'approve_logistik' ");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('history_approve', $data);
    }



    public function history_supervisor_reject()
    {
        $id_divisi = session("id_divisi");

        $unit_kerja = session()->get("unit_kerja");
        $order = new OrderModel();
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.id_divisi,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.userid,orders.keterangan,orders.tanggal,pemesanan_mobil.id as id_pemesanan from orders LEFT JOIN pemesanan_mobil on orders.id =pemesanan_mobil.id_pemesanan  WHERE orders.keterangan = 'reject_logistik' ");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('history_reject', $data);
    }


    public function order_supervisor_approve()
    {
        $unit_kerja = session()->get("unit_kerja");
        $id_divisi = session("id_divisi");

        $order = new OrderModel();
        $divisi = new DivisiModel();

        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.id_divisi,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.userid,orders.keterangan,orders.tanggal,pemesanan_mobil.id as id_pemesanan from orders LEFT JOIN pemesanan_mobil on orders.id =pemesanan_mobil.id_pemesanan WHERE orders.keterangan = 'approve_logistik' ");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('history_approve', $data);
    }

    public function order_supervisor_reject()
    {
        $id_divisi = session("id_divisi");

        $unit_kerja = session()->get("unit_kerja");
        $order = new OrderModel();
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.id_divisi,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.userid,orders.keterangan,orders.tanggal,pemesanan_mobil.id as id_pemesanan from orders LEFT JOIN pemesanan_mobil on orders.id =pemesanan_mobil.id_pemesanan  WHERE orders.keterangan = 'reject_logistik' ");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('history_reject', $data);
    }
}
