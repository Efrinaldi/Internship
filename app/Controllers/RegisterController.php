<?php

namespace App\Controllers;

use App\Models\UserModel;


use App\Controllers\BaseController;
use App\Models\CarModel;
use App\Models\DriverModel;

class RegisterController extends BaseController
{
    public function __construct()
    {
        $this->User = new UserModel();
        $this->validate     = \Config\Services::validation();
    }
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }

    public function register_driver()
    {
        helper(['form']);
        $data = [];
        echo view('register_driver', $data);
    }
    public function authregister()
    {
        helper(['form']);

        //set rules validation form
        $rules = [
            'first_name'          => 'required|min_length[3]|max_length[20]',
            'email'              => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]',
            'password'           => 'required|min_length[6]|max_length[200]',
            'confpassword'       => 'matches[password]'
        ];

        if ($this->validate->setRules($rules)) {
            $data = [
                'first_name'     => $this->request->getVar('first_name'),
                'last_name'     => $this->request->getVar('last_name'),
                'username'     => $this->request->getVar('username'),
                'role'     => $this->request->getVar('role'),
                'email'    => $this->request->getVar('email'),
                'nip'     => $this->request->getVar('nip'),
                'unit_kerja'    => $this->request->getVar('unit_kerja'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            dd($data);
            $this->User->insert($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }



    public function auth_register_driver()
    {
        helper(['form']);
        $driver = new DriverModel();
        $car = new CarModel();

        $user = new UserModel();
        //set rules validation form
        $rules = [
            'first_name'          => 'required|min_length[3]|max_length[20]',
            'email'              => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]',
            'password'           => 'required|min_length[6]|max_length[200]',
            'confpassword'       => 'matches[password]'
        ];

        if ($this->validate->setRules($rules)) {
            $data = [
                'first_name'     => $this->request->getVar('first_name'),
                'last_name'     => $this->request->getVar('last_name'),
                'username'     => $this->request->getVar('username'),
                'role'     => "Driver",
                'email'    => $this->request->getVar('email'),
                'nip'     => $this->request->getVar('nip'),
                'unit_kerja'    => "Operator",
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $user->insert($data);
            $id_user =  $user->getInsertID();
            $data_driver =
                [
                    'nama_pengemudi' => $this->request->getVar('first_name'),
                    'status_pengemudi' => "Tersedia",
                    'id_user' => $id_user
                    // 'plat_nomor'    => $this->request->getVar('plat'),
                ];

            $driver->insert($data_driver);
            $id_driver = $driver->getInsertID();
            $data_mobil = [
                'plat_nomor' =>  $this->request->getVar('plat'),
                'keterangan_mobil' =>  $this->request->getVar('mobil'),
                'status_mobil' => "tersedia"
            ];
            $car->insert($data_mobil);
            $id_mobil =  $car->getInsertID();
            $driver->update($id_driver, ['id_mobil' => $id_mobil]);
            return redirect()->to('/dashboard');
        } else {
            $data['validation'] = $this->validator;
            echo view('dashboard', $data);
        }
    }
}
