<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\DriverModel;
use App\Models\UserModel;
use App\Controllers\NotificationController;
use App\Models\OrdersModel;
use Firebase\JWT\JWT;


class OrderController extends BaseController
{
    use ResponseTrait;

    function __construct()
    {
        $this->orders = new OrdersModel();
    }

    public function order($id_user)
    {

        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("SELECT orders.ID ,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.id_user,oauth_user.nama_user,orders.tanggal,pemesanan.id as id_pemesanan from orders LEFT JOIN oauth_user on orders.id_user = oauth_user.id_user LEFT JOIN pemesanan on orders.id =pemesanan.id_pemesanan where orders.id_user = $id_user and tanggal like DATE_FORMAT(CURRENT_DATE,'%m/%d/%Y') order by waktu");
        $rows = $query->getResult();
        $data = [
            "data" => $rows
        ];
        return $this->respondCreated($data, 201);
    }



    public function order_driver($id_pengemudi)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();

        $query   = $order->query("select pengemudi.nama_pengemudi, pengemudi.id_user as id_pengemudi,pemesanan.id_pemesanan,pemesanan.id_user as id_user,orders.nama,orders.unit_kerja,orders.waktu,orders.tujuan,orders.tanggal from pemesanan left JOIN pengemudi on pemesanan.id_pengemudi = pengemudi.id_pengemudi INNER JOIN orders on orders.ID = pemesanan.id_pemesanan where pengemudi.id_user= $id_pengemudi;");
        $rows = $query->getResult();
        $data = ["data" => $rows];
        return $this->respondCreated($data, 201);
    }

    public function notification_user($id_user)
    {
        $order = new OrderModel();
        $driver =  new DriverModel();
        $query   = $order->query("select pengemudi.id_pengemudi,pengemudi.nama_pengemudi,mobil.plat_nomor,mobil.status_mobil,mobil.keterangan_mobil,pengemudi.id_user,pemesanan.id_user FROM pengemudi RIGHT JOIN pemesanan ON pengemudi.id_pengemudi = pemesanan.id_pengemudi INNER JOIN mobil on pengemudi.id_mobil = mobil.id_mobil WHERE pemesanan.id_user =       $id_user;");
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
    public function show_order($id_order)
    {
        $driver = new DriverModel();

        // $driver = $driver->findAll();
        $query   = $driver->query("select *  FROM pengemudi WHERE status_pengemudi = 'Tersedia'");
        $rows = $query->getResultArray();

        $data = [
            'driver' => $rows,
        ];
        session()->set('id_order', $id_order);
        return view('pick_driver', $data);
    }

    public function request_order()
    {
        $order = new OrderModel();
        $rules = [
            'name'          => 'required',
            'unit'              => 'required',
            'time'           => 'required',
            'date'       => 'required',
            'destination' => 'required',
            'purpose' => 'required'
        ];

        if ($this->validate($rules)) {
            $data = [
                'tujuan' => $this->request->getVar('destination'),
                'tujuan_pakai' => $this->request->getVar('purpose'),
                'unit_kerja' => $this->request->getVar('unit'),
                'waktu' => $this->request->getVar('time'),
                'nama' => $this->request->getVar('name'),
                'tanggal' => $this->request->getVar('date'),
                'keterangan' => $this->request->getVar('keterangan'),
                'id_user' => session()->get('id_user'),
            ];

            $order->insert($data);
            return redirect()->to('request')->with('success', 'Pesanan masuk. Segera proses pesanan!');
        }
    }
    public function post_order()
    {

        $key = getenv('TOKEN_SECRET');
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->failUnauthorized('Token Required');
        $token = explode(' ', $header)[1];

        try {
            $order = new OrderModel();
            $data = [
                "unit_kerja" => $this->request->getPost('unit_kerja'),
                "nama" => $this->request->getPost('nama'),
                "tanggal" => $this->request->getPost('tanggal'),
                "waktu" => $this->request->getPost('waktu'),
                "tujuan" => $this->request->getPost('tujuan'),
                "id_user" => $this->request->getPost('id_user'),

            ];
            $data = json_decode(file_get_contents("php://input"));
            $order->insert($data);
            $response = [
                'id_order' => $data['id'],
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Saved'
                ]
            ];

            return $this->respondCreated($response, 201);
            $decoded = JWT::decode($token, $key, ['HS256']);
            $response = [
                'id' => $decoded->uid,
                'email' => $decoded->email
            ];
            return $this->respond($response);
        } catch (\Throwable $th) {
            return $this->fail('Invalid Token');
        }
    }


    public function showOrder($id_user)
    {
        $order = new OrderModel();
        $data = $order->where('id_user', $id_user)->find();
        return $this->respondCreated($data, 200);
    }




    public function pick_driver($id_user)
    {
        $user = new UserModel();
        $driver = new DriverModel();
        $data_driver = $driver->where('status_pengemudi', 'tersedia')->find();
        return $this->insert_order($id_user, $data_driver['id_pengemudi']);
    }

    public function insert_order($id_pengemudi)
    {

        $driver = new DriverModel();
        $order = new OrdersModel();
        $notif = new NotificationController();
        $user = new UserModel();

        $orders = new OrderModel();


        $id_order = (int)session()->get('id_order');
        $data_order = $orders->where('ID', $id_order)->first();
        $id_user = $data_order['id_user'];
        $data_driver = $driver->where('id_pengemudi', $id_pengemudi)->first();
        $id_driver = $data_driver['id_pengemudi'];
        $nama_pengemudi = $data_driver["nama_pengemudi"];
        $token_user = $user->where('id_user', $id_user)->first();
        $token_driver = $user->where('id_user', $id_pengemudi)->first();
        $device_token_driver = $token_driver['token_id'];
        $device_token_user = $token_user['token_id'];
        $data_json = [
            "id_user" => $id_user,
            "id_pengemudi" => (int) $id_pengemudi,
            "id_pemesanan" => $id_order
        ];
        $response = [
            "message" => "data berhasil disimpan"
        ];


        $orders->update($data_order, ['keterangan' => 'Approve']);
        $driver->update($data_driver, ['status_pengemudi' => 'Tidak Tersedia']);
        $this->orders->insert($data_json);
        $notif->sendNotificationDriver($device_token_driver);
        $notif->sendNotificationUser($device_token_user, $nama_pengemudi);
        return redirect()->to('process')->with('success', 'Pesanan diterima pengemudi!');
    }

    public function approve_order($id)
    {
        $builder = new OrderModel();
        $builder->where('id', $id);
        $builder->set('status', 1);
        $builder->update();

        return redirect()->back()->with('success', 'Data Berhasil Disetujui');
    }

    public function reject_order($id)
    {
        $builder = new OrderModel();
        $builder->where('ID', $id);
        $builder->set('keterangan', 'Reject');
        $builder->update();

        return redirect()->back()->with('success', 'Data Berhasil Ditolak');
    }
}