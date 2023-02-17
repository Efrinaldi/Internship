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
use CodeIgniter\HTTP\Request;
use Exception;
use Tests\Support\RESTful\Worker;

class Home extends BaseController
{
    protected $oauth_user;
    protected $request;
    public function __construct()
    {
    }
    public function index()
    {
        return view('welcome_message');
        $this->request = (\Config\Services::request());
    }
    public function detail_project($id_order)
    {
        try {
            $driver = new DriverModel();
            $order = new OrdersModel();
            $data_pemesanan = $order->query("SELECT * FROM  orders left join pemesanan_mobil on orders.id = pemesanan_mobil.id_pemesanan left join mobil on mobil.id_mobil = pemesanan_mobil.id_mobil  left join pengemudi on pengemudi.userid = pemesanan_mobil.id_pengemudi where pemesanan_mobil.id= $id_order ")->getResultArray();
            $data_divisi = $data_pemesanan[0]["id_divisi"];
            // $divisi = $order->query("SELECT * FROM departemen where id_divisi = $data_divisi")->getResultArray();
            $data = [
                "data" => $data_pemesanan[0],
                "id_divisi" => $data_pemesanan[0]["id_divisi"]
            ];
            return view('detail', $data);
        } catch (Exception $e) {
            $driver = new DriverModel();
            $order = new OrdersModel();
            $data_pemesanan = $order->query("SELECT * FROM  orders left join pemesanan_mobil on orders.id = pemesanan_mobil.id_pemesanan left join mobil on mobil.id_mobil = pemesanan_mobil.id_mobil  left join pengemudi on pengemudi.userid = pemesanan_mobil.id_pengemudi where pemesanan_mobil.id= $id_order ")->getResultArray();
            $data_divisi = $data_pemesanan[0]["id_divisi"];
            // $divisi = $order->query("SELECT * FROM departemen where id_divisi = $data_divisi")->getResultArray();
            $data = [
                "data" => $data_pemesanan[0],
                "id_divisi" => $data_pemesanan[0]["id_divisi"]
            ];

            return view('detail', $data);
        }
    }

    public function detail_approve_dept($id_order)
    {

        try {
            $driver = new DriverModel();
            $order = new OrdersModel();
            $data_pemesanan = $order->query("SELECT * FROM  orders left join pemesanan_mobil on orders.id = pemesanan_mobil.id_pemesanan left join mobil on mobil.id_mobil = pemesanan_mobil.id_mobil  left join pengemudi on pengemudi.userid = pemesanan_mobil.id_pengemudi where pemesanan_mobil.id= $id_order ")->getResultArray();
            $data_divisi = $data_pemesanan[0]["id_divisi"];
            // $divisi = $order->query("SELECT * FROM departemen where id_divisi = $data_divisi")->getResultArray();
            $data = [
                "data" => $data_pemesanan[0],
                "id_divisi" => $data_pemesanan[0]["id_divisi"]
            ];
            return view('detail_approve_dept', $data);
        } catch (Exception $e) {
            $driver = new DriverModel();
            $order = new OrdersModel();
            $data_pemesanan = $order->query("SELECT * FROM  orders left join pemesanan_mobil on orders.id = pemesanan_mobil.id_pemesanan 
            left join mobil on mobil.id_mobil = pemesanan_mobil.id_mobil  left join pengemudi on pengemudi.userid = pemesanan_mobil.id_pengemudi
             where pemesanan_mobil.id= $id_order ")->getResultArray();
            $data_divisi = $data_pemesanan[0]["id_divisi"];
            $data = [
                "data" => $data_pemesanan[0],
                "id_divisi" => $data_pemesanan[0]["id_divisi"]
            ];
            return view('detail_approve_dept', $data);
        }
    }
    public function detail_project_dissaprove($id_order)
    {
        $driver = new DriverModel();
        $order = new OrdersModel();
        $data_pemesanan = $order->query("SELECT * FROM  orders where id = $id_order ")->getResultArray();
        $data_divisi = $data_pemesanan[0]["id_divisi"];
        // $divisi = $order->query("SELECT * FROM departemen where id_divisi = $data_divisi")->getResultArray();
        $data = [
            "data" => $data_pemesanan[0],
            "id_divisi" => $data_pemesanan[0]["id_divisi"]
        ];
        return view('detail_dissaprove', $data);
    }
    public function detail_reject_dept($id_order)
    {
        $driver = new DriverModel();
        $order = new OrdersModel();
        $departement = new DivisiModel();
        $data_pemesanan = $order->query("SELECT * FROM  orders where id = $id_order ")->getResultArray();
        $dept = $order->query("SELECT * FROM  orders where id = $id_order ")->getResultArray();
        $data_divisi = $data_pemesanan[0]["id_divisi"];
        $d_dept = $departement->query("SELECT * FROM departemen where id_divisi = $data_divisi ")->getResultArray();
        $divisi = ($d_dept[0]["divisi"]);
        $data = [
            "data" => $data_pemesanan[0],
            "id_divisi" => $data_pemesanan[0]["id_divisi"],
            "divisi" => $divisi
        ];
        return view('detail_reject_dept', $data);
    }
    public function edit_user()
    {
    }
    public function change_car($id_order)
    {
        $driver = new DriverModel();
        $order = new OrdersModel();
        $data_pemesanan = $order->query("SELECT * FROM  orders left join pemesanan_mobil on orders.id = pemesanan_mobil.id_pemesanan left join mobil on mobil.id_mobil = pemesanan_mobil.id_mobil  left join pengemudi on pengemudi.userid = pemesanan_mobil.id_pengemudi where pemesanan_mobil.id= $id_order ")->getResultArray();
        $data_divisi = $data_pemesanan[0]["id_divisi"];
        $data_car = $driver->query("SELECT * from mobil left join pengemudi on mobil.userid = pengemudi.userid WHERE STATUS_PENGEMUDI = 'Tersedia'; ")->getResultArray();

        // $divisi = $order->query("SELECT * FROM departemen where id_divisi = $data_divisi")->getResultArray();
        $data = [
            "data" => $data_pemesanan[0],
            "id_divisi" => $data_pemesanan[0]["id_divisi"],
            "mobil" => $data_car
        ];
        return view('change_car', $data);
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


    public function activity_db()
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

    public function reporting()
    {
        return view('reporting');
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
        $list_atasan = $divisi->query("SELECT id_divisi FROM user_divisi where userid = '$userid' or user_domain = '$userid'")->getResultArray();
        $id_divisi_atasan = $list_atasan[0]["id_divisi"];
        $sat_ker = $divisi->query("SELECT * FROM departemen where id_divisi = $id_divisi_atasan")->getResultArray();
        $id_satker = $sat_ker[0]["id_satker"];
        $list_approval = $divisi->query("SELECT * FROM `departemen` where id_satker =$id_satker;")->getResultArray();
        $query = $order->query(
            "SELECT orders.nama,pemesanan_mobil.id as id_pemesanan ,pengemudi.nama_pengemudi,orders.tujuan,orders.asal,orders.tujuan_pakai,orders.tanggal, orders.waktu,orders.id as id_order,orders.keterangan,mobil.plat_nomor,departemen.divisi 
        FROM pemesanan_mobil RIGHT JOIN orders ON orders.id = pemesanan_mobil.id_pemesanan left JOIN mobil on mobil.id_mobil=pemesanan_mobil.id_mobil left join departemen on orders.id_divisi = 
        departemen.id_divisi left join pengemudi on pengemudi.userid = pemesanan_mobil.id_pengemudi where orders.userid ='$userid' "
        );
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
            'data_divisi' => $list_approval
        ];
        return view('order', $data);
    }
    public function perjalanan()
    {
        $order = new OrderModel();
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
            "SELECT orders.nama,orders.tujuan,orders.asal,orders.tujuan_pakai,orders.tanggal, orders.waktu,orders.id,pemesanan_mobil.id_pengemudi 
            as id_pengemudi,orders.userid as userid,orders.id as id_order,orders.keterangan,mobil.plat_nomor,departemen.divisi FROM pemesanan_mobil LEFT JOIN orders ON orders.id = pemesanan_mobil.id_pemesanan
            LEFT JOIN mobil on mobil.id_mobil=pemesanan_mobil.id_mobil LEFT join departemen on orders.id_divisi = departemen.id_divisi WHERE orders.keterangan = 'approve'; "
        );
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
            'data_divisi' => $list_approval
        ];
        return view('perjalanan', $data);
    }
    public function order_departemen()
    {
        $order = new OrderModel();
        $session = session()->get();
        $userid = session("userid");
        $id_divisi = session("id_divisi");
        $query = $order->query(
            "SELECT orders.id as id,pemesanan_mobil.id as id_pemesanan, orders.nama,orders.tujuan,orders.asal,orders.tujuan_pakai,orders.tanggal, orders.waktu
            ,orders.keterangan,mobil.plat_nomor,departemen.divisi  FROM `orders` LEFT JOIN user_divisi on user_divisi.userid= orders.userid left JOIN pemesanan_mobil on 
            pemesanan_mobil.id_pemesanan = orders.id LEFT JOIN mobil on pemesanan_mobil.id_mobil = mobil.id_mobil LEFT join departemen 
            on user_divisi.id_divisi = departemen.id_divisi 
            WHERE orders.keterangan = 'approval_departemen' and orders.approval_userid = '$userid' "
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
        $rows     = $userdiv->query("SELECT * FROM pengemudi")->getResultArray();
        $car     = $driver->query("SELECT m.id_mobil, p.nama_pengemudi,p.userid as id_pengemudi,m.plat_nomor,m.status_mobil,m.userid ,p.status_pengemudi FROM mobil m RIGHT  JOIN pengemudi p ON m.id_mobil = p.id_mobil")->getResultArray();
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
        $this->request = (\Config\Services::request());

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
        $this->request = (\Config\Services::request());
        $car = new CarModel();
        $driver = new DriverModel();
        $userdiv = new UserDivisiModel();
        $userid = $this->request->getVar("userid");
        $data_driver = $driver->query("SELECT * FROM pengemudi where userid='$userid' ")->getResultArray();
        $data_user = $userdiv->query("SELECT * FROM user_divisi where userid='$userid' ")->getResultArray();

        try {
            $data_mobil = [
                "plat_nomor" => $this->request->getPost("plat_nomor"),
                "keterangan_mobil" => $this->request->getVar("keterangan_mobil"),
                "status_mobil" => $this->request->getVar("status_mobil"),
                "userid" => $this->request->getPost("userid"),
            ];
            $car->insert($data_mobil);

            $data_pengguna = [
                "userid" => $this->request->getPost("userid"),
                "username" => $this->request->getPost("username"),
                "id_divisi" => 50,
                "divisi"    => "driver"
            ];
            $d_driver = [
                "userid" => $this->request->getPost("userid"),
                "nama_pengemudi" => $this->request->getPost("username"),
                "status_pengemudi" => "Tersedia",
                "id_mobil"       =>   $car->getInsertID()
            ];
            $driver->insert($d_driver);
            $userdiv->insert($data_pengguna);
            return redirect()->back()->withInput()->with('success', "Berhasil menambahkan pengemudi");
        } catch (Exception $e) {
            $data = [
                "message" => "Coba lagi",
                "error"   => 1
            ];
            session()->setFlashData("error_controller", "Duplikasi User ID, gunakan user ID yang lain");
            return redirect()->back()->withInput()->with('errors', "Duplikasi ID");
        }
    }
    public function hapus_car($id, $id_pengemudi)
    {

        $car = new CarModel();
        $driver = new DriverModel();
        $user = new UserDivisiModel();

        $car->delete($id);
        $driver->delete($id_pengemudi);
        $user->delete($id_pengemudi);

        return redirect()->to("driver");
    }
    public function hapus_driver($id_pengemudi)
    {
        $driver = new DriverModel();
        $driver->delete($id_pengemudi);
        $user = new UserDivisiModel();
        $user->delete($id_pengemudi);
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
        $data_order = $orders->query("SELECT count(orders.id) as jml_available, departemen.divisi,orders.ID,orders.waktu_end ,mobil.plat_nomor,orders.nama,orders.id_divisi,orders.waktu,orders.tujuan,orders.tujuan_pakai,orders.userid,orders.keterangan,orders.tanggal,pemesanan_mobil.id as id_pemesanan from orders LEFT JOIN pemesanan_mobil on orders.id =pemesanan_mobil.id_pemesanan 
        left join departemen on departemen.id_divisi = orders.id_divisi left join mobil on pemesanan_mobil.id_mobil = mobil.id_mobil WHERE orders.userid='$userid' AND    orders.keterangan like '%approve%' or '%approve'; ")->getResultArray();
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
        $userid = session("userid");
        $list_atasan = $divisi->query("SELECT id_divisi FROM user_divisi where userid = '$userid' or user_domain = '$userid'")->getResultArray();

        try {

            $id_divisi_atasan = $list_atasan[0]["id_divisi"];
            $d_div = $divisi->query("SELECT * FROM  departemen where id_divisi= $id_divisi_atasan ")->getResultArray();
            $sat_ker = $divisi->query("SELECT * FROM departemen where id_divisi = $id_divisi_atasan")->getResultArray();
            $id_satker = $sat_ker[0]["id_satker"];
            $divisi = $d_div[0]["divisi"];
        } catch (Exception $e) {
            $id_divisi_atasan = 0;
            $id_satker = 0;
            $divisi = "Divisi tidak dikenali";
        }
        $db_div = new DivisiModel();

        $order = new OrderModel();
        $atasan = new AtasanModel();
        $session = session()->get();
        $list_dept = $db_div->query("SELECT * FROM departemen")->getResultArray();

        $list_approval = $db_div->query("SELECT * FROM `departemen` where id_satker =$id_satker;")->getResultArray();
        $query = $order->query(
            "SELECT orders.nama,orders.tujuan,orders.asal,orders.tujuan_pakai,orders.tanggal, orders.waktu,orders.id as id_order,orders.keterangan,mobil.plat_nomor,departemen.divisi FROM pemesanan_mobil
             RIGHT JOIN orders ON orders.id = pemesanan_mobil.id LEFT JOIN mobil on mobil.id_mobil=pemesanan_mobil.id_mobil LEFT join departemen 
            on orders.id_divisi = departemen.id_divisi WHERE orders.keterangan = 'Pending' and orders.userid ='$userid'  "
        );
        $rows = $query->getResultArray();
        $div = $db_div->query("SELECT * FROM  departemen")->getResultArray();
        $data = [
            "divisi" => $divisi,
            "d_div" => $db_div->query("SELECT * FROM departemen")->getResultArray(),
            "id_divisi" => $id_divisi_atasan,
            "waktuErr" => "",
            'order' => $rows,
            'data_divisi' => $list_approval
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
        left join departemen on departemen.id_divisi = orders.id_divisi left join mobil on pemesanan_mobil.id_mobil = mobil.id_mobil WHERE   orders.userid = '$userid'  and orders.keterangan like '%approve%' or '%approve' ;");
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
        ];
        return view('history_approve', $data);
    }
    public function change_mobil()
    {
        $userid = session("userid");
        $order = new OrderModel();
        $car = new CarModel();
        $data = $car->query("SELECT * FROM PENGEMUDI")->getResultArray();
        $id_divisi = session("id_divisi");
        $query   = $order->query("SELECT pemesanan_mobil.id as id_pemesanan,departemen.divisi,orders.ID,orders.waktu_end ,mobil.plat_nomor,orders.nama,orders.id_divisi,orders.waktu, orders.tujuan,orders.tujuan_pakai,orders.userid,orders.keterangan,orders.tanggal,pemesanan_mobil.id as id_pemesanan from orders LEFT JOIN pemesanan_mobil on orders.id =pemesanan_mobil.id_pemesanan left join departemen on departemen.id_divisi = orders.id_divisi left join mobil on pemesanan_mobil.id_mobil = mobil.id_mobil WHERE orders.keterangan like '%approve%';");
        $data_car = $car->query("SELECT * from PENGEMUDI WHERE STATUS_PENGEMUDI = 'Tersedia'; ")->getResultArray();
        $rows = $query->getResultArray();
        $data = [
            'order' => $rows,
            'data' => $data,
            'mobil' => $data_car
        ];
        return view('change_mobil', $data);
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
