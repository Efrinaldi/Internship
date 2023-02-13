<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CarModel;
use App\Models\DriverModel;
use CodeIgniter\API\ResponseTrait;


class DriverController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
    }

    public function getPengemudi($id_pengemudi)
    {
        $driver = new DriverModel();
        $data = [];
    }

    public function update_plat($id = null)
    {

        $model = new DriverModel();
        $data_driver = $model->where('id_user', $id)->first();
        $id_pengemudi = $data_driver['id_pengemudi'];
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'id_mobil' => $json->id_mobil,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'id_mobil' => $input['id_mobil'],
            ];
        }
        // Insert to Database
        $model->update($id_pengemudi, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respondCreated($response, 201);
    }

    public function getMobil()
    {
        $model = new CarModel();
        $query = $model->findAll();
        $data = [
            'car' => $query
        ];
        return $this->respondCreated($data, 201);
    }

    public function insert_status($id_pengemudi)
    {
        $driver = new DriverModel();
        $model = new CarModel();
        $data = [
            "status_mobil" => $this->request->getPost('status_mobil'),
        ];
        $data = json_decode(file_get_contents("php://input"));
        //$data = $this->request->getPost();
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response, 201);
    }
    public function status_available($id_pengemudi)
    {

        // $builder = new DriverModel();
        // $builder->where('userid', $id_pengemudi);
        // $builder->set('status_pengemudi', 'Tersedia');
        // $builder->update();
        $builder2 = new CarModel();
        $builder2->where('userid', $id_pengemudi);
        $builder2->set('status_mobil', 'Tersedia');
        $builder2->update();


        return redirect()->back()->with('success', 'Pengemudi Tersedia');
    }
    public function status_unavailable($id_pengemudi)
    {
        // $builder = new DriverModel();
        // $builder->where('userid', $id_pengemudi);
        // $builder->set('status_pengemudi', 'Tidak Tersedia');
        // $builder->update();
        $builder2 = new CarModel();
        $builder2->where('userid', $id_pengemudi);
        $builder2->set('status_mobil', 'Tidak Tersedia');
        $builder2->update();
        return redirect()->back()->with('success', 'Pengemudi Tidak Tersedia');
    }
}
