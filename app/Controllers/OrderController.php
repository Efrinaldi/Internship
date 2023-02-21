<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\DriverModel;
use App\Models\UserModel;
use App\Controllers\NotificationController;
use App\Models\ActivityLogModel;
use App\Models\AtasanModel;
use App\Models\CarModel;
use App\Models\DivisiModel;
use App\Models\OrdersModel;
use App\Models\ReimburseModel;
use App\Models\SecureModel;
use App\Models\UserDivisiModel;
use Firebase\JWT\JWT;
use custom_helper;
use PHPMailer\PHPMailer\PHPMailer;

class OrderController extends BaseController
{
    use ResponseTrait;

    public function detail_order($id_order)
    {
        $order = new OrderModel();
        $query   = $order->query("SELECT orders.ID as id_order,orders.nama,orders.unit_kerja,orders.asal,orders.waktu,orders.tujuan,orders.id_user 
        as id_user,oauth_user.nama_user,orders.tanggal,pemesanan_mobil.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user
         = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan where orders.id = $id_order ");
        $rows = $query->getResult();
        $data = [
            "data" => $rows
        ];
        return $this->respondCreated($data, 201);
    }
    public function add_driver()
    {
        $driver = new DriverModel;
        $user = new UserDivisiModel();
        $data_user = [
            "userid" => $this->request->getPost("userid"),
            "username" => $this->request->getPost("username"),
            "id_divisi" => 50,
            "divisi"    => "driver"
        ];
        $data_driver = [
            "userid" => $this->request->getPost("userid"),
            "nama_pengemudi" => $this->request->getPost("username"),
            "status_pengemudi"   => "Tersedia",
        ];
        $driver->insert($data_user);
        $user->insert($data_driver);
        return \redirect()->to("/dashboard");
    }
    function get_sub_spv()
    {
        $id = $this->request->getVar('id');
        $atasan = new AtasanModel();

        $data = $atasan->query("SELECT * FROM atasan where id_divisi = $id")->getResultArray();
        echo json_encode($data);
    }


    function get_sub_mobil()
    {
        $id = $this->request->getVar('id');
        $mobil = new CarModel();
        $data = $mobil->query("SELECT * FROM mobil where userid = '$id' ")->getResultArray();
        echo json_encode($data);
    }


    function update_car()
    {
        $order    = new OrdersModel();
        $car      = new CarModel();
        $driver   = new DriverModel();
        $userid = $this->request->getVar('userid');
        $plat_1 = $this->request->getVar('plat_1');
        $plat_2 = $this->request->getVar('plat_2');
        $id_order = $this->request->getVar('id_order');
        $mobil = [
            "id_pemesanan" => $id_order,
            "id_mobil" => $plat_2,
            "id_pengemudi" => $userid,
        ];
        $driver->update($userid, ["status_pengemudi" => "Tidak tersedia"]);
        $order->update((int)$id_order, $mobil);
        $car->update((int)$plat_2, ["userid" => $userid, "status_mobil" => "Tidak tersedia"]);
        $car->update((int)$plat_1, ["userid" => $userid, "status_mobil" => "Tidak tersedia"]);
        echo json_encode($mobil);
    }

    public function perjalanan()
    {
        return view('perjalanan');
    }
    function update_driver()
    {
        $order    = new OrdersModel();
        $car      = new CarModel();
        $driver   = new DriverModel();
        $userid = $this->request->getVar('userid');
        $plat_1 = $this->request->getVar('plat_1');
        $plat_2 = $this->request->getVar('plat_2');
        $id_order = $this->request->getVar('id_order');
        $mobil = [
            "id_pemesanan" => $id_order,
            "id_mobil" => $plat_2,
            "id_pengemudi" => $userid,
        ];
        $driver->update($userid, ["status_pengemudi" => "Tidak tersedia"]);
        $order->update((int)$id_order, $mobil);
        $car->update((int)$plat_2, ["userid" => $userid, "status_mobil" => "Tidak tersedia"]);
        $car->update((int)$plat_1, ["userid" => $userid, "status_mobil" => "Tidak tersedia"]);
        echo json_encode($mobil);
    }
    function get_plat_mobil()
    {
        $id = $this->request->getVar('id');
        $mobil = new CarModel();
        $data = $mobil->query("SELECT * FROM mobil where status_mobil = 'Tersedia' ")->getResultArray();
        echo json_encode($data);
    }
    function get_plat_mobil_1()
    {
        $id = $this->request->getVar('plat_1');
        $mobil = new CarModel();
        $data = $mobil->query("SELECT * FROM mobil  where status_mobil ='Tersedia' ")->getResultArray();
        echo json_encode($data);
    }



    function change_order($id_pemesanan)
    {
        $orders = new OrdersModel();
        $user_div = new UserDivisiModel();
        $userid   = $this->request->getPost("user");
        $data_div = $user_div->query("SELECT * FROM pemesanan_mobil where id_pemesanan = $id_pemesanan")->getResultArray();
        $data = [
            "data"         => $data_div,
            "id_pengemudi" => $userid,
            "id_pemesanan" => $id_pemesanan
        ];
        $data = $orders->query("SELECT id FROM pemesanan_mobil where id_pemesanan = $id_pemesanan")->getResultArray();
        //$orders->update($id, $data);
        return \redirect()->to("dashboard")->with("success", "Order mobil berhasil terupdate");
    }
    function approval_spv()
    {
        $userid      = $this->request->getVar('id_spv');
        $id_order    = $this->request->getVar('id_order');
        $order = new OrderModel();
        $data = [
            "approval_userid"      => $userid,
            "keterangan"          => "approval_departemen"
        ];
        $order->update($id_order, $data);
        $message = [
            "berhasil" => "berhasil"
        ];
        echo json_encode($message);
    }


    function approval_spv_order()
    {
        $order = new OrderModel();
        $user = new SecureModel();
        // $pemesanan = new OrdersModel();
        $div = new UserDivisiModel();
        $userid = session("userid");
        $s = $user->query("SELECT * FROM t_users WHERE userid = '$userid' or userdomain = '$userid'  ")->getResultArray();
        if (!empty($s[0]["userdomain"])) {
            $nama = $s[0]["userdomain"];
        } else {
            $nama = $s[0]["userid"];
        }
        $nama = $this->request->getVar('nama');
        $tujuan = $this->request->getVar('tujuan');
        $waktu = $this->request->getVar('waktu');
        $waktu_end  = $this->request->getVar('waktu_end');
        $tanggal = $this->request->getVar('tanggal');
        $tujuan_pakai = $this->request->getVar('tujuan_pakai');
        $jumlah_orang = $this->request->getVar("jumlah_orang");
        $approval_userid  = $this->request->getVar('id_spv');
        $approval_domain =  $this->request->getVar('id_spv');
        $data_div = $div->query("SELECT id_divisi FROM user_divisi where userid = '$userid' or user_domain= '$userid'")->getResultArray();
        $spv     = $this->request->getVar('id_spv');
        $data_user = $user->query("SELECT t_users.userdomain, t_usraplikasi.userid,[username] ,t_usraplikasi.kodeaplikasi  
        FROM t_users right join t_usraplikasi  on t_usraplikasi.userid = t_users.userid where t_usraplikasi.kodeaplikasi= '00033' 
        and t_users.userdomain ='$spv' or t_users.userid ='$spv'  ")->getResultArray();
        if ($data_user[0]["userdomain"] == \null) {
              if (($this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'unit_kerja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'waktu_end' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],

            'tujuan_pakai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jumlah_orang' => [
                'rules' => 'required|greater_than_equal_to[1]|less_than_equal_to[7]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'greater_than_equal_to[1]' => "Penumpang harus lebih dari 0 dan maksimal 7 orang"
                ]
            ]
        ]))){
                $data_pemesanan = [
                    'nama' => $this->request->getVar('nama'),
                    'asal' => "BCA SYARIAH",
                    'id_divisi' =>  $this->request->getVar('id_divisi'),
                    'tujuan' => $this->request->getVar('tujuan'),
                    'waktu' => $waktu,
                    'waktu_end' => $waktu_end,
                    'tanggal' => $this->request->getVar('tanggal'),
                    'status' => 0,
                    'keterangan' => "approval_departemen",
                    'tujuan_pakai' => $this->request->getVar('tujuan_pakai'),
                    'userid' => session("userid"),
                    'jumlah_orang' => $this->request->getVar("jumlah_orang"),
                    "approval_userid"  =>  $this->request->getVar('id_spv'),
                    "approval_domain"  =>  $this->request->getVar('id_spv')
                ];




















        }
    } else {
            $data_pemesanan = [
                'nama' => $this->request->getVar('nama'),
                'asal' => "",
                'id_divisi' =>  $this->request->getVar('id_divisi'),
                'tujuan' => $this->request->getVar('tujuan'),
                'waktu' => $waktu,
                'waktu_end' => $waktu_end,
                'tanggal' => $this->request->getVar('tanggal'),
                'status' => 0,
                'keterangan' => "approval_departemen",
                'tujuan_pakai' => $this->request->getVar('tujuan_pakai'),
                'userid' => session("userid"),
                'jumlah_orang' => $this->request->getVar("jumlah_orang"),
                "approval_userid"  =>  $this->request->getVar('id_spv'),
                "approval_domain"  =>  $data_user[0]["userdomain"]
            ];
        }

        $order->insert($data_pemesanan);
        $id_order = $order->getInsertID();
        $data_order = $order->query("SELECT * FROM orders where id = $id_order ")->getResultArray();
        $data = [
            "data" => [
                "body" => "Pemesanan Kendaraan atas nama : $nama pada jam $waktu sampai  $waktu_end dengan tujuan lokasi nya adalah $tujuan membutuhkan anda sebagai approvalnya, Mohon Untuk di approve",
                "link" => "/order_departemen",
                "order" => $data_order[0]["approval_domain"],
                "waktu" => $waktu,
                "waktu_end" => $waktu_end,
                "url" => "detail_project/" . $id_order
            ]

        ];
        \notif($data_order[0]["approval_domain"] . "@bcasyariah.co.id", "Pemesanan Kendaraan PT Bank BCA Syariah", "email", $data);
        \notif("githa_refina@bcasyariah.co.id", "Pemesanan kendaraan PT Bank BCA Syariah", "email", $data);
        echo json_encode($data["body"]);
    }

    public function order($id_user)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("SELECT orders.ID as id_order, pemesanan.id as id_pemesanan, orders.asal ,orders.nama,
        orders.unit_kerja,orders.waktu,orders.tujuan,orders.id_user as id_user,oauth_user.nama_user,orders.tanggal, 
        pemesanan.id_pengemudi as id_pengemudi from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user 
        LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan where orders.id_user = $id_user and tanggal like 
        DATE_FORMAT(CURRENT_DATE,'%m/%d/%Y') order by waktu ");
        $rows = $query->getResult();
        $data = [
            "data" => $rows
        ];
        return $this->respondCreated($data, 201);
    }

    public function show_activity()
    {
        $draw = intval($this->request->getPost('name'));
        $start = intval($this->request->getPost("start"));
        $length = intval($this->request->getPost("length"));
        $activity = new ActivityLogModel();
        $data_activity = $activity->query("SELECT * FROM activity_log")->getResultArray();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $data_activity->num_rows(),
            "recordsFiltered" => $data_activity->num_rows(),
            "data" => $data_activity
        );
        echo json_encode($output);
        exit();
    }
    public function detail_driver($id_user)
    {
        $driver =  new DriverModel();
        $query   = $driver->query("SELECT id_pengemudi,
        id_user,nama_pengemudi,status_pengemudi,plat_nomor,keterangan_mobil  
        FROM PENGEMUDI inner join mobil on pengemudi.id_mobil = mobil.id_mobil 
        WHERE pengemudi.id_pengemudi=  $id_user ;");
        $rows = $query->getResult();
        $data = ["data" => $rows];
        return $this->respondCreated($data, 201);
    }

    public function order_driver($id_user)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("SELECT pengemudi.id_pengemudi as id_pengemudi,orders.id as id_order, pengemudi.nama_pengemudi,pemesanan.id 
        as id_pemesanan, pemesanan.id_user as id_user,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tanggal from pemesanan 
        left JOIN pengemudi on pemesanan.id_pengemudi = pengemudi.id_pengemudi INNER JOIN orders on orders.ID = pemesanan.id_pemesanan 
        where pengemudi.id_user= $id_user and tanggal like DATE_FORMAT(CURRENT_DATE,'%m/%d/%Y') order by waktu");
        $rows = $query->getResult();
        $data = ["data" => $rows];
        return $this->respondCreated($data, 201);
    }
    public function show_order_driver($id_user)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("SELECT orders.id as id_order, pengemudi.id_pengemudi as id_pengemudi,pengemudi.nama_pengemudi,pemesanan.id 
        as id_pemesanan,reimburse.id as id_reimburse,pemesanan.id_user as id_user,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tanggal 
        from pemesanan left JOIN pengemudi on pemesanan.id_pengemudi = pengemudi.id_pengemudi INNER JOIN orders on orders.ID = pemesanan.id_pemesanan 
        LEFT JOIN reimburse on reimburse.id_pemesanan = pemesanan.id where pengemudi.id_user= $id_user and pemesanan.id_pemesanan is NOT NULL; ");
        $rows = $query->getResult();
        $data = ["data" => $rows];
        return $this->respondCreated($data, 201);
    }
    public function show_order_user($id_user)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("SELECT orders.ID as id_order, pemesanan.id as id_pemesanan, orders.asal ,orders.nama,orders.unit_kerja,
        orders.waktu,orders.tujuan,orders.id_user as id_user,oauth_user.nama_user,orders.tanggal,reimburse.id as id_reimburse ,pemesanan.id_pengemudi as
         id_pengemudi from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan  
         LEFT JOIN reimburse on reimburse.id_pemesanan = pemesanan.id where orders.id_user = $id_user and pemesanan.id_pemesanan is NOT NULL ");
        $rows = $query->getResult();
        $data = ["data" => $rows];
        return $this->respondCreated($data, 201);
    }

    public function notification_user($id_user)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("select pengemudi.id_pengemudi,pengemudi.nama_pengemudi,mobil.plat_nomor,mobil.status_mobil,mobil.keterangan_mobil,
        pengemudi.id_user,pemesanan.id_user,pemesanan.id_pemesanan FROM pengemudi RIGHT JOIN pemesanan ON pengemudi.id_pengemudi = pemesanan.id_pengemudi 
        INNER JOIN mobil on pengemudi.id_mobil = mobil.id_mobil WHERE pemesanan.id_user =       $id_user;");
        $rows = $query->getResult();
        $data = ["data" => $rows];
        return $this->respondCreated($data, 201);
    }
    public function notification_driver($id_pengemudi)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("");
        $rows = $query->getResult();
        $data = ["data" => $rows];
        return $this->respondCreated($data, 201);
    }

    public function get_order()
    {
        $order = new OrderModel();
        $data['order'] = $order->findAll();
        return $this->respond($data, 200);
    }
    public function show_order($id_order, $id_user)
    {
        $driver  = new DriverModel();
        $userdiv = new UserDivisiModel();
        $order = new OrderModel();
        $rows     = $userdiv->query("SELECT * FROM user_divisi where divisi = 'DRIVER' ")->getResultArray();
        $car      = $driver->query("SELECT *  FROM mobil INNER JOIN pengemudi ON mobil.id_mobil = pengemudi.id_mobil where status_pengemudi ='Tersedia'  ")->getResultArray();
        $data = [
            'driver' => $rows,
            'mobil'  => $car,
            'id_pemesanan' => $id_order,
            'id_user' => $id_user
        ];
        session()->set('id_order', $id_order);
        return view('pick_driver', $data);
    }
    public function request_order()
    {
        $order = new OrderModel();
        $atasan = new AtasanModel();
        $div = new UserDivisiModel();
        $session = session()->get();
        $userid = session("userid");
        $divisi = new DivisiModel();
        $list_dept = $divisi->query("SELECT * FROM departemen")->getResultArray();
        $list_atasan = $divisi->query("SELECT id_divisi FROM user_divisi where userid = '$userid' or user_domain = '$userid'")->getResultArray();
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
        $divisi = new DivisiModel();
        $d_div = $divisi->query("SELECT * FROM  departemen where id_divisi=$id_divisi_atasan ")->getResultArray();
        $div = $divisi->query("SELECT * FROM  departemen ")->getResultArray();
        $order = new OrderModel();
        $acitivity = new  ActivityLogModel();
        $user = new SecureModel();
        $pemesanan = new OrdersModel();
        $userid = session("userid");
        $waktu_awal = $this->request->getVar('inputWaktuStart');
        $waktu_akhir = $this->request->getVar('inputWaktuEnd');
        $waktu_awal_hours = substr($waktu_awal, 0, 2);
        $waktu_awal_minute = substr($waktu_awal, 3, 5);
        $data_hours_awal = ((int)$waktu_awal_hours) * 60;
        $data_minutes_awal = (int)$waktu_awal_minute;
        $waktu_akhir_hours = substr($waktu_akhir, 0, 2);
        $waktu_akhir_minute = substr($waktu_akhir, 3, 5);
        $data_hours_akhir = ((int)$waktu_akhir_hours) * 60;
        $data_minutes_akhir = (int)$waktu_akhir_minute;
        $nama = $this->request->getPost("nama");
        $unit_kerja = $this->request->getPost("unit_kerja");
        $tujuan = $this->request->getPost("tujuan");
        $waktu = $this->request->getPost("waktu");
        $waktu_end = $this->request->getPost("waktu_end");
        $tanggal = $this->request->getPost("tanggal_memakai");
        $tujuan_pakai = $this->request->getPost("tujuan_pakai");
        $jumlah_orang = $this->request->getPost("jumlah_orang");


        $waktuErr = "";
        $data = [
            "activity" => "Menambahkan pesanan atas nama $userid",
            "tanggal"  =>  date("Y-m-d H:i:s"),
        ];
        $s = $user->query("SELECT * FROM t_users WHERE userid = '$userid' or userdomain = '$userid'    ")->getResultArray();
        $acitivity->insert($data);
        $validate = \Config\Services::validation();
        if (($this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'unit_kerja' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'tujuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'waktu_end' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],

            'tujuan_pakai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jumlah_orang' => [
                'rules' => 'required|greater_than_equal_to[1]|less_than_equal_to[7]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'greater_than_equal_to[1]' => "Penumpang harus lebih dari 0 dan maksimal 7 orang"
                ]
            ]
        ]))) {
            $data_error = [
                "divisi" => $div,
                "d_div" => $d_div[0]["divisi"],
                "waktuErr" => "",
                'order' => $rows,
                'data_divisi' => $list_approval,
                "waktu"        =>  date("H:i", strtotime(substr($waktu, 12, 19)))

            ];
            echo json_encode($data_error);
        } else {
            $data_error = [
                'validation' => $validate->getErrors(),
                "divisi" => $div,
                "d_div" => $d_div[0]["divisi"],
                "waktuErr" => "",
                'order' => $rows,
                'data_divisi' => $list_approval,
                "waktu"        =>  date("H:i", strtotime(substr($waktu, 12, 19)))
            ];

            echo json_encode($data_error);
        }
    }

    public function insert_reimburse($id)
    {
        $order = new OrderModel();
        $data = [
            "unit_kerja" => $this->request->getPost('unit_kerja'),
            "nama" => $this->request->getPost('nama'),
            "tanggal" => $this->request->getPost('tanggal'),
            "waktu" => $this->request->getPost('waktu'),
            "tujuan" => $this->request->getPost('tujuan'),
            "asal" => $this->request->getPost('asal'),
            "id_user" => $this->request->getPost('id_user'),
        ];
        $data = json_decode(file_get_contents("php://input"));
        $order->insert($data);
        $data_order = $order->query("SELECT id FROM orders ORDER BY id DESC LIMIT 1")->getResultArray();
        $response = [
            'id'       => $order->getInsertID(),
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }
    public function detail_reimburse($id_pemesanan)
    {
        $reimburse = new ReimburseModel();
        $sql = "SELECT * FROM `reimburse` where id_pemesanan=$id_pemesanan and nominal is NOT null;";
        $sql_photo = "SELECT photo FROM `reimburse` where id_pemesanan=$id_pemesanan and nominal is NOT null;";
        $data_photo = $reimburse->query($sql_photo)->getResultArray();
        $data_reimburse = $reimburse->query($sql)->getResultArray();
        $data = [
            "status" => $data_reimburse[0]["status"],
            "nominal" => $data_reimburse[0]["nominal"],
            "deskripsi" => $data_reimburse[0]["deskripsi"],
            "photo" => $data_photo
        ];
        return $this->respondCreated($data, 201);
    }
    public function updateStatusReimburse()
    {
        $reimburse = new ReimburseModel();
        $data = [
            "id_pemesanan" => $this->request->getPost("id_pemesanan"),
            "status"  => "Requesting",
        ];
        $data = json_decode(file_get_contents("php://input"));
        if ($reimburse->insert($data)) {

            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'File uploaded successfully',
                'data' => []
            ];
        } else {

            $response = [
                'status' => 500,
                'error' => true,
                'message' => 'Failed to save image',
                'data' => []
            ];
        }

        return $this->respondCreated($response, 201);
    }
    public function uploadImage()
    {
        $fileberkas = $this->request->getFile('photo');
        $namaFileUpload = time() . '_' . $fileberkas->getName();
        if ($fileberkas->move("template/assets/img/upload", $namaFileUpload)) {
            $reimburse = new ReimburseModel();
            $data = [
                "id_pemesanan" => $this->request->getPost("id_pemesanan"),
                "deskripsi" => $this->request->getPost("deskripsi"),
                "nominal" => $this->request->getPost("nominal"),
                "status"  => "Pending",
                "photo" => $namaFileUpload
            ];
            if ($reimburse->insert($data)) {

                $response = [
                    'status' => 200,
                    'error' => false,
                    'message' => 'File uploaded successfully',
                    'data' => []
                ];
            } else {

                $response = [
                    'status' => 500,
                    'error' => true,
                    'message' => 'Failed to save image',
                    'data' => []
                ];
            }
        } else {

            $response = [
                'status' => 500,
                'error' => true,
                'message' => 'Failed to upload image',
                'data' => []
            ];
        }
        return $this->respondCreated($response, 201);
    }

    public function uploadKeterangan()
    {
        $reimburse = new ReimburseModel();
        $data = [
            "id_pemesanan" => $this->request->getPost("id_pemesanan"),
            "deskripsi" => $this->request->getPost("deskripsi"),
            "nominal" => $this->request->getPost("nominal"),
            "status" => "Pending"
        ];
        $data = json_decode(file_get_contents("php://input"));
        if ($reimburse->insert($data)) {

            $response = [
                'status' => 200,
                'error' => false,
                'message' => 'File uploaded successfully',
                'data' => []
            ];
        } else {

            $response = [
                'status' => 500,
                'error' => true,
                'message' => 'Failed to save image',
                'data' => []
            ];
        }
        return $this->respondCreated($response, 201);
    }
    public function post_order()
    {
        $order = new OrderModel();

        $data = [
            "keterangan" => "Pending",
            "status" => 0,
            "unit_kerja" => $this->request->getPost('unit_kerja'),
            "nama" => $this->request->getPost('nama'),
            "tanggal" => $this->request->getPost('tanggal'),
            "waktu" => $this->request->getPost('waktu'),
            "tujuan" => $this->request->getPost('tujuan'),
            "asal" => $this->request->getPost('asal'),
            "tujuan" => $this->request->getPost('tujuan_pakai'),
            "id_user" => $this->request->getPost('id_user'),
        ];
        $data = json_decode(file_get_contents("php://input"));
        $order->insert($data);
        $response = [
            'id'       => $order->getInsertID(),
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }


    public function showOrder($id_user)
    {
        $order = new OrderModel();
        $data = $order->where('id_user', $id_user)->find();
        return $this->respondCreated($data, 200);
    }
    public function pick_driver($id_user, $id_order)
    {
        $secure = new SecureModel();
        $data_secure = $secure->query("SELECT * FROM t_users")->getResultArray();
        $data = [
            "users" => $data_secure,
        ];
        $user = new UserModel();
        $driver = new DriverModel();
        $data_driver = $driver->where('status_pengemudi', 'tersedia')->find();
    }

    public function whatsapp($id_user)
    {
        $user = new UserModel();
        $data = $user->where('id_user', $id_user)->first();
        $phone = $data["phone_number"];
    }
    public function insert_order($id_order, $id_mobil, $id_pengemudi)
    {
        $acitivity = new ActivityLogModel();
        $pemesanan = new OrdersModel();
        $orders = new OrderModel();

        $mobil = new CarModel();
        $driver = new DriverModel();
        $order = [
            "id_pengemudi" => $id_pengemudi,
            "id_pemesanan" => $id_order,
            "id_mobil"    => $id_mobil
        ];
        $user = $pemesanan->query("SELECT * FROM orders where id = $id_order  ")->getResultArray();
        $id = $user[0]["userid"];
        $pemesanan->insert($order);
        $data_activity = [
            "activity" => " $id sudah berhasil mendapatkan driver",
            "date"     => date("Y-m-d h:i:sa")
        ];
        $data_car = [
            "status_mobil" =>     "Tidak Tersedia"
        ];
        $data_pengemudi = [
            "status_pengemudi" => "Tidak Tersedia"
        ];
        $data_order = [
            "id_mobil" => $id_mobil,
            "id_pengemudi" => $id_pengemudi,
            "pemesanan"   => $id_order
        ];
        $data_pemesanan = [
            "keterangan" => "approve"
        ];
        $orders->update($id_order, $data_pemesanan);

        $pengemudi = $driver->query("SELECT * FROM PENGEMUDI WHERE userid= '$id_pengemudi' ")->getResultArray();
        $car = $mobil->query("SELECT * FROM mobil WHERE id_mobil= $id_mobil ")->getResultArray();
        $data = [
            "data" => [
                "body" => "Selamat Pesanan Anda Sudah Disetujui ",
                "pengemudi" => $pengemudi[0]["nama_pengemudi"],
                "plat" => $car[0]["plat_nomor"],
                "url" => "detail_project/" . $id_order
            ]
        ];
        \notif("githa_refina@bcasyariah.co.id", "Aplikasi Order Mobil", "email", $data);
        $data_id = $pemesanan->query("SELECT id FROM pemesanan_mobil where id_pemesanan = $id_order")->getResultArray();
        $pemesanan->update($data_id[0]["id"], $data_order);
        $mobil->update($id_mobil, $data_car);
        $driver->update($id_pengemudi, $data_pengemudi);
        $acitivity->insert($data_activity);
        return redirect()->to('dashboard')->with('success', 'Pesanan diterima pengemudi!');
    }

    public function approve_order($id)
    {
        $builder = new OrderModel();
        $builder->where('id', $id);
        $builder->set('status', 1);
        $builder->set('keterangan', "approve_logistik");
        $builder->update();
        $activity = new ActivityLogModel();
        $order = $builder->query("SELECT * FROM ORDERS WHERE ID = $id")->getResultArray();
        $user = $order[0]["userid"];
        $waktu = $order[0]["waktu"];
        $waktu_end = $order[0]["waktu_end"];
        $tujuan = $order[0]["waktu_end"];
        $keterangan = $order[0]["tujuan_pakai"];
        $data  = [
            "data" => [
                "body" => "Pesanan atas nama $user merequest pesanan pada jam $waktu sampai dengan jam $waktu_end untuk datang ke lokasi $tujuan, dengan keterangan pakai $keterangan"
            ]
        ];
        \notif($order[0]["approval_domain"] . "@bcasyariah.co.id", "Pemesanan Kendaraan PT Bank BCA Syariah", "email", $data);
        \notif("githa_refina@bcasyariah.co.id", "Pemesanan Kendaraan PT Bank BCA Syariah", "email", $data);
        \notif("randa_prasetya@bcasyariah.co.id", "Pemesanan Kendaraan PT Bank BCA Syariah", "email", $data);

        // $activity->insert($data);
        return redirect()->back()->with('success', 'Data Berhasil Disetujui');
    }
    public function approve_order_dept($id)
    {
        $builder = new OrderModel();
        $builder->where('id', $id);
        $builder->set('status', 1);
        $builder->set('keterangan', "approve_logistik");
        $builder->update();
        $activity = new ActivityLogModel();
        $order = $builder->query("SELECT * FROM ORDERS WHERE ID = $id")->getResultArray();
        $user = $order[0]["userid"];
        $waktu = $order[0]["waktu"];
        $waktu_end = $order[0]["waktu_end"];
        $tujuan = $order[0]["waktu_end"];
        $keterangan = $order[0]["tujuan_pakai"];
        $data  = [
            "data" => [
                "body" => "Pesanan atas nama $user merequest pesanan pada jam $waktu sampai dengan jam $waktu_end untuk datang ke lokasi $tujuan, dengan keterangan pakai $keterangan",
                "url" => "detail_project/" . $id
            ]
        ];
        \notif($order[0]["approval_domain"] . "@bcasyariah.co.id", "Pemesanan Kendaraan PT Bank BCA Syariah", "email", $data);
        \notif("githa_refina@bcasyariah.co.id", "Pemesanan Kendaraan PT Bank BCA Syariah", "email", $data);
        \notif("randa_prasetya@bcasyariah.co.id", "Pemesanan Kendaraan PT Bank BCA Syariah", "email", $data);

        // $activity->insert($data);
        return redirect()->back()->with('success', 'Data Berhasil Disetujui');
    }




    public function reject_order($id)
    {
        $builder = new OrderModel();
        $builder->where('id', $id);
        $builder->set('status', 1);
        $builder->set('keterangan', "reject_departemen");
        $builder->update();
        $activity = new ActivityLogModel();
        $order = $builder->query("SELECT * FROM ORDERS WHERE ID = $id")->getResultArray();
        $user = $order[0]["userid"];
        $waktu = $order[0]["waktu"];
        $waktu_end = $order[0]["waktu_end"];
        $tujuan = $order[0]["waktu_end"];
        $keterangan = $order[0]["tujuan_pakai"];
        $activity = new ActivityLogModel();
        $data_insert = [
            "activity" => "data order telah ditolak oleh otorisator departemen"
        ];
        $data  = [
            "data" => [
                "body" => "Pesanan atas nama $user merequest pesanan pada jam $waktu sampai dengan jam $waktu_end untuk datang ke lokasi $tujuan, dengan keterangan pakai $keterangan",
                "url" => "detail_project/" . $id

            ]
        ];


        $activity->insert($data_insert);
        \notif($order[0]["approval_domain"] . "@bcasyariah.co.id", "Pemesanan Kendaraan PT Bank BCA Syariah", "email", $data);
        \notif("githa_refina@bcasyariah.co.id", "Pemesanan Kendaraan PT Bank BCA Syariah", "email", $data);
        \notif("randa_prasetya@bcasyariah.co.id", "Pemesanan Kendaraan PT Bank BCA Syariah", "email", $data);

        // $activity->insert($data);
        return redirect()->back()->with('success', 'Data ditolak oleh departemen');
    }

    public function reject_logistik($id)
    {
        $order = new OrderModel();
        $order->delete($id);
        return redirect()->back()->with('success', 'Data Ditolak');
    }
    public function end_session($id_order, $id_pengemudi)
    {
        $builder = new DriverModel();
        $builder->where('userid', $id_pengemudi);
        $builder->set('status_pengemudi', 'Tidak Tersedia');
        $builder->update();
        $pemesanan = new OrderModel();
        $data_order = [
            "keterangan" => "end"
        ];
        $pemesanan->update($id_order, $data_order);
        return redirect()->back()->with('success', 'Pengemudi Tidak Tersedia');
    }
    public function status_available($id_pengemudi)
    {
        $builder = new DriverModel();
        $builder->where('userid', $id_pengemudi);
        if ($id_pengemudi === \null) {
            return redirect()->back()->with('success', 'Tambah Pengemudi ');
        } else {
            $builder->set('status_pengemudi', 'Tersedia');
            $builder->update();

            return redirect()->back()->with('success', 'Pengemudi Tersedia');
        }
    }
    public function status_unavailable($id_pengemudi)
    {
        $builder = new DriverModel();
        $builder->where('userid', $id_pengemudi);
        if ($id_pengemudi === \null) {
            return redirect()->back()->with('success', 'Tambah Pengemudi ');
        } else {
            $builder->set('status_pengemudi', 'Tidak Tersedia');
            $builder->update();
            return redirect()->back()->with('success', 'Pengemudi Tidak Tersedia');
        }
    }



    public function status_available_car($id_pengemudi)
    {
        $builder2 = new CarModel();
        $builder2->where('userid', $id_pengemudi);
        if ($id_pengemudi === \null) {
            return redirect()->back()->with('success', 'Tambah Pengemudi ');
        } else {
            $builder2->set('status_mobil', 'Tersedia');
            $builder2->update();

            return redirect()->back()->with('success', 'Pengemudi Tersedia');
        }
    }
    public function status_unavailable_car($id_pengemudi)
    {
        $builder2 = new CarModel();
        $builder2->where('userid', $id_pengemudi);
        if ($id_pengemudi === \null) {
            return redirect()->back()->with('success', 'Tambah Pengemudi ');
        } else {
            $builder2->set('status_mobil', 'Tidak Tersedia');
            $builder2->update();
            return redirect()->back()->with('success', 'Pengemudi Tidak Tersedia');
        }
    }
}
