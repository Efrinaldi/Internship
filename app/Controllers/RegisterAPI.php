<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class RegisterAPI extends BaseController
{
    use ResponseTrait;


    public function register_user()
    {
        // $rules = [
        //     'nama'          => 'required|min_length[3]|max_length[20]',
        //     'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
        //     'password'      => 'required|min_length[6]|max_length[200]',

        // ];

        $model = new UserModel();
        $data = [
            "id" => $this->request->getVar('id'),
            "username" => $this->request->getVar('username'),
            "nama" => $this->request->getVar('nama'),
            "email" => $this->request->getVar('email'),
            "password" => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];
        $model->insert($data);
        $response = [
            'status'   => 404,
            'error'    => null,
            'messages' => "berhasil di update"
        ];
        return $this->respondCreated($response, 201);
    }
}
