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
use App\Models\CarModel;
use App\Models\DivisiModel;
use App\Models\OrdersModel;
use App\Models\ReimburseModel;
use App\Models\SecureModel;
use App\Models\UserDivisiModel;
use Firebase\JWT\JWT;


class OrderController extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->orders = new OrdersModel();
        $this->validate     = \Config\Services::validation();
    }



    public function log()
    {
    }
    public function detail_order($id_order)
    {
        $order = new OrderModel();
        $query   = $order->query("SELECT orders.ID as id_order,orders.nama,orders.unit_kerja,orders.asal,orders.waktu,orders.tujuan,orders.id_user as id_user,oauth_user.nama_user,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan where orders.id = $id_order ");
        $rows = $query->getResult();
        $data = [
            "data" => $rows
        ];
        return $this->respondCreated($data, 201);
    }

    public function order($id_user)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("SELECT orders.ID as id_order, pemesanan.id as id_pemesanan, orders.asal ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.id_user as id_user,oauth_user.nama_user,orders.tanggal, pemesanan.id_pengemudi as id_pengemudi from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan where orders.id_user = $id_user and tanggal like DATE_FORMAT(CURRENT_DATE,'%m/%d/%Y') order by waktu ");
        $rows = $query->getResult();
        $data = [
            "data" => $rows
        ];
        return $this->respondCreated($data, 201);
    }

    public function detail_driver($id_user)
    {
        $driver =  new DriverModel();
        $query   = $driver->query("SELECT id_pengemudi ,id_user,nama_pengemudi,status_pengemudi,plat_nomor,keterangan_mobil  FROM PENGEMUDI inner join mobil on pengemudi.id_mobil = mobil.id_mobil WHERE pengemudi.id_pengemudi=  $id_user ;");
        $rows = $query->getResult();
        $data = ["data" => $rows];
        return $this->respondCreated($data, 201);
    }

    public function order_driver($id_user)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("SELECT pengemudi.id_pengemudi as id_pengemudi,orders.id as id_order, pengemudi.nama_pengemudi,pemesanan.id as id_pemesanan, pemesanan.id_user as id_user,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tanggal from pemesanan left JOIN pengemudi on pemesanan.id_pengemudi = pengemudi.id_pengemudi INNER JOIN orders on orders.ID = pemesanan.id_pemesanan where pengemudi.id_user= $id_user and tanggal like DATE_FORMAT(CURRENT_DATE,'%m/%d/%Y') order by waktu");
        $rows = $query->getResult();
        $data = ["data" => $rows];
        return $this->respondCreated($data, 201);
    }

    public function show_order_driver($id_user)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("SELECT orders.id as id_order, pengemudi.id_pengemudi as id_pengemudi,pengemudi.nama_pengemudi,pemesanan.id as id_pemesanan,reimburse.id as id_reimburse,pemesanan.id_user as id_user,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tanggal from pemesanan left JOIN pengemudi on pemesanan.id_pengemudi = pengemudi.id_pengemudi INNER JOIN orders on orders.ID = pemesanan.id_pemesanan LEFT JOIN reimburse on reimburse.id_pemesanan = pemesanan.id where pengemudi.id_user= $id_user and pemesanan.id_pemesanan is NOT NULL; ");
        $rows = $query->getResult();
        $data = ["data" => $rows];
        return $this->respondCreated($data, 201);
    }

    public function show_order_user($id_user)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("SELECT orders.ID as id_order, pemesanan.id as id_pemesanan, orders.asal ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.id_user as id_user,oauth_user.nama_user,orders.tanggal,reimburse.id as id_reimburse ,pemesanan.id_pengemudi as id_pengemudi from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan  LEFT JOIN reimburse on reimburse.id_pemesanan = pemesanan.id where orders.id_user = $id_user and pemesanan.id_pemesanan is NOT NULL ");
        $rows = $query->getResult();
        $data = ["data" => $rows];
        return $this->respondCreated($data, 201);
    }

    public function notification_user($id_user)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("select pengemudi.id_pengemudi,pengemudi.nama_pengemudi,mobil.plat_nomor,mobil.status_mobil,mobil.keterangan_mobil,pengemudi.id_user,pemesanan.id_user,pemesanan.id_pemesanan FROM pengemudi RIGHT JOIN pemesanan ON pengemudi.id_pengemudi = pemesanan.id_pengemudi INNER JOIN mobil on pengemudi.id_mobil = mobil.id_mobil WHERE pemesanan.id_user =       $id_user;");
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
        $car      = $driver->query("SELECT * FROM mobil RIGHT  JOIN pengemudi ON mobil.id_mobil = pengemudi.id_mobil where status_pengemudi ='Tersedia'   ")->getResultArray();
        $data = [
            'driver' => $rows,
            'mobil'  => $car,
            'id_pemesanan' => $id_order,
            'id_user' => $id_user
        ];

        $data_order = [
            "keterangan" => "approve"
        ];
        $order->update($id_order, $data_order);
        session()->set('id_order', $id_order);
        return view('pick_driver', $data);
    }
    public function request_order()
    {
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
        $waktuErr = "";
        $data = [
            "activity" => "Menambahkan pesanan atas nama $userid",
            "tanggal"  =>  date("Y-m-d H:i:s"),
        ];
        $s = $user->query("SELECT * FROM t_users WHERE userid = '$userid' or userdomain = '$userid'    ")->getResultArray();
        $acitivity->insert($data);
        $rules = [
            'unit'        => 'required',
            'waktu_awal'  => 'required',
            'waktu_akhir' => 'required',
            'date'        => 'required',
            'destination' => 'required',
            'purpose'     => 'required',
            'jumlah_orang' => 'integer|required'

        ];
        if ($this->validate->setRules([
            'unit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'inputWaktuStart' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => 'Format Email Harus Valid'
                ]
            ],
            'inputWaktuEnd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'tanggal_memakai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'purpose' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'asal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'destination' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jumlah_orang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            if (!empty($s[0]["userdomain"])) {
                $nama = $s[0]["userdomain"];
            } else {
                $nama = $s[0]["userid"];
            }

            $data = [
                'nama' => $nama,
                'asal' => $this->request->getVar('asal'),
                'tujuan' => $this->request->getVar('destination'),
                'id_divisi' => $this->request->getVar('unit'),
                'waktu_awal' => $this->request->getVar('inputWaktuStart'),
                'waktu_akhir' => $this->request->getVar('inputWaktuEnd'),
                'tanggal' => $this->request->getVar('date'),
                'status' => 0,
                'tujuan_pakai' => $this->request->getVar('purpose'),
                'keterangan' => $this->request->getVar('keterangan'),
                'userid' => session("userid"),
                'jumlah_orang' => $this->request->getVar("jumlah_orang")
            ];



            $order->insert($data);
            $id = $order->getInsertID();
            return redirect()->to('request')->with('success', 'Pesanan masuk. Segera proses pesanan!');
        } else {
            session()->setFlashdata('error', $this->validator->listErrors());

            if (((int)($data_hours_akhir - $data_hours_awal) + ($data_minutes_akhir - $data_minutes_awal) < 180)) {
                $waktuErr = "memesan harus melebihi dari 3 Jam";
            }
            $divisi = new DivisiModel();
            $div = $divisi->query("SELECT * FROM  divisi ")->getResultArray();
            $data = [
                "divisi" => $div,
                "waktuErr" => $waktuErr,
                "gagal" => "pesanan gagal masuk"
            ];
            return view('request', $data);
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
            "keterangan" => "pending",
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
        // $this->insert_order($id_user, $data_driver['id_pengemudi']);
    }

    public function whatsapp($id_user)
    {
        $user = new UserModel();
        $data = $user->where('id_user', $id_user)->first();
        $phone = $data["phone_number"];
    }
    public function insert_order($id_order, $id_pengemudi, $id_mobil)
    {
        $acitivity = new ActivityLogModel();
        $pemesanan = new OrdersModel();
        $mobil = new CarModel();
        $driver = new DriverModel();
        $order = [
            "id_pengemudi" => $id_pengemudi,
            "id_pemesanan" => $id_order
        ];
        $user = $pemesanan->query("SELECT * FROM orders where id = $id_order  ")->getResultArray();
        $id = $user[0]["userid"];
        $pemesanan->insert($order);
        $data_activity = [
            "activity" => " $id sudah berhasil mendapatkan driver",
            "date"     => date("Y-m-d h:i:sa")
        ];

        $car = [
            "status_mobil" =>     "Tidak Tersedia"
        ];

        $pengemudi = [
            "status_pengemudi" => "Tidak Tersedia"
        ];
        $mobil->update($id_mobil, $car);
        $driver->update($id_pengemudi, $pengemudi);
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
        $data = [
            "activity" => "data order telah disetujui oleh otorisator departemen"
        ];
        $activity->insert($data);
        return redirect()->back()->with('success', 'Data Berhasil Disetujui');
    }
    public function reject_order($id)
    {
        $builder = new OrderModel();
        $builder->where('id', $id);
        $builder->set('status', 0);
        $builder->set('keterangan', "reject_logistik");
        $builder->update();
        $activity = new ActivityLogModel();
        $data = [
            "activity" => "data order telah ditolak oleh otorisator departemen"
        ];

        $activity->insert($data);
        return redirect()->back()->with('success', 'Data Ditolak');
    }
    public function reject_logistik($id)
    {
        $order = new OrderModel();
        $order->delete($id);
        return redirect()->back()->with('success', 'Data Ditolak');
    }

    public function status_available($id_pengemudi)
    {
        $builder = new DriverModel();
        $builder->where('userid', $id_pengemudi);
        $builder->set('status_pengemudi', 'Tersedia');
        $builder->update();
        return redirect()->back()->with('success', 'Pengemudi Tersedia');
    }
    public function status_unavailable($id_pengemudi)
    {
        $builder = new DriverModel();
        $builder->where('userid', $id_pengemudi);
        $builder->set('status_pengemudi', 'Tidak Tersedia');
        $builder->update();
        return redirect()->back()->with('success', 'Pengemudi Tidak Tersedia');
    }
}
