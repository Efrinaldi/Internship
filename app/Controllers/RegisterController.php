<?php

namespace App\Controllers;

use App\Models\UserModel;


use App\Controllers\BaseController;

class RegisterController extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
        $this->User = new UserModel();
    }
    public function index()
    {
        helper(['form']);
        $data = [];
        echo view('register', $data);
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

        if ($this->validate($rules)) {
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
            $this->user->insert($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }
}
