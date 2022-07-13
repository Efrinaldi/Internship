<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use App\Models\ReimburseModel;


use \OAuth2\Request;

use App\Libraries\Oauth;

class UserController extends ResourceController
{
    public function __construct()
    {
        $this->user = new UserModel();
        $this->User = new User();
        $this->session     = \Config\Services::session();
    }
    use ResponseTrait;
    public function index()
    {
        if (session('logged_in') == true) {
            return redirect()->back();
        }
        //include helper form
        helper(['form']);
        $data = [];
        echo view('login', $data);
    }

    public function showUser($id_user)
    {
        $user = new UserModel();
        $query = $user->query("select phone_number,nama_user,role,unit_kerja  from oauth_user where id_user = $id_user ");
        $rows = $query->getResult();
        $data = [
            "data" => $rows
        ];
        return $this->respondCreated($data, 201);
    }

    public function changeNumber($id_user)
    {
        $user = new UserModel();
        $data = [
            "phone_number" => $this->request->getVar('phone_number')
        ];
        $data = json_decode(file_get_contents("php://input"));
        $user->update($id_user, $data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function view_password()
    {
        $data = [
            "password" => password_hash("18051998", PASSWORD_BCRYPT)
        ];
        dd($data);
    }


    public function changePassword($id_user)
    {
        $password = password_hash($this->request->getPost("password"), PASSWORD_DEFAULT);
        $user = new UserModel();
        $data = [
            "password" => $password
        ];
        // $data = json_decode(file_get_contents("php://input"));
        $user->update($id_user, $data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->respondCreated($response);
    }

    public function authregister()
    {
        helper(['form']);

        //set rules validation form
        $rules = [
            'first_name'          => 'required|min_length[3]|max_length[20]',
            'email'              => 'required|min_length[6]|max_length[50]|valid_email|is_unique[oauth_user.email]',
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
            $this->User->insert($data);
            return redirect()->to('/dashboard');
        } else {
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
    }

    public function login_api()
    {
        $oauth = new Oauth();
        $request = new Request();
        $respond = $oauth->server->handleTokenRequest($request->createFromGlobals());
        $code = $respond->getStatusCode();
        $body = $respond->getResponseBody();
        return $this->respond(json_decode($body), $code);
    }
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $session->set([
                    'id_user'  => $data['id_user'],
                    'username' => $data['username'],
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email'    => $data['email'],
                    'role'    => $data['role'],
                    'unit_kerja' => $data['unit_kerja'],
                    'token_id' => null,
                    'logged_in'     => TRUE
                ]);
                //dd( session()->get('logged_in'));
                if ($data['role'] == 'Admin Reimburse' || $data['role'] == 'Driver') {
                    return redirect()->to('/homes');
                }
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Kata sandi salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email tidak terdaftar');
            return redirect()->to('/login');
        }
    }
    public function update_token($id = null)
    {
        $model = new UserModel();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'token_id' => $json->token_id,
            ];
        } else {
            $input = $this->request->getRawInput();
            $data = [
                'token_id' => $input['token_id'],
            ];
        }
        // Insert to Database
        $model->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Updated'
            ]
        ];
        return $this->respond($response);
    }



    public function login()
    {
        $rules = [
            "email"    => "required|valid_email|min_length[6]",
            "password" => "required",
        ];

        $messages = [
            "email" => [
                "required"    => "Email required",
                "valid_email" => "Email address is not in format"
            ],
            "password" => [
                "required" => "password is required"
            ],
        ];

        if (!$this->validate($rules, $messages)) {

            $response = [
                'status'  => 500,
                'error'   => true,
                'message' => $this->validator->getErrors(),
                'data'    => []
            ];

            return $this->respondCreated($response);
        } else {

            $userdata = $this->user->where("email", $this->request->getVar("email"))->first();

            if (!empty($userdata)) {
                if (password_verify($this->request->getVar("password"), $userdata['password'])) {
                    $key = getenv('TOKEN_SECRET');
                    $payload = array(
                        "iat" => 1356999524,
                        "nbf" => 1357000000,
                        "uid" => $userdata['id_user'],
                        "email" => $userdata['email']
                    );

                    $token = JWT::encode($payload, $key, 'HS256');

                    $response = [
                        'status'   => 200,
                        'error'    => false,
                        'user_id' => $userdata['id_user'],
                        'role' => $userdata['role'],
                        'messages' => 'User logged In successfully',
                        'token' => $token

                    ];
                    return $this->respondCreated($response);
                } else {

                    $response = [
                        'status'   => 500,
                        'error'    => true,
                        'messages' => 'Incorrect details',
                        'data'     => []
                    ];
                    return $this->respondCreated($response);
                }
            } else {
                $response = [
                    'status'   => 500,
                    'error'    => true,
                    'messages' => 'User not found',
                    'data'     => []
                ];
                return $this->respondCreated($response);
            }
        }
    }


    public function updateId($id_user)
    {

        $user = new UserModel();
        $data['users'] = $user->where('id_user', $id_user)->first();
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $this->user->update($id_user, [
                "token_id" => $this->request->getPost('token_id')
            ]);

            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => "Berhasil di update"
            ];
            return $this->respondCreated($response);
        } else {

            $response = [
                'status'   => 404,
                'error'    => null,
                'messages' => "gagal di update"
            ];
            return $this->respondCreated($response);
        }
    }



    public function register_user()
    {
        $model = new UserModel();
        $data = [
            "id_user" => $this->request->getVar('id_user'),
            "username" => $this->request->getVar('username'),
            "nama_user" => $this->request->getVar('nama_user'),
            "email" => $this->request->getVar('email'),
            "password" => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];
        $this->user->insert($data);
        $response = [
            'status'   => 404,
            'error'    => null,
            'messages' => "berhasil di update"
        ];
        return $this->respondCreated($response, 201);
    }


    public function register_driver()
    {
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];
        if ($this->$rules) {
            $this->user->insert([
                "id" => $this->request->getPost('id'),
                "username" => $this->request->getPost('username'),
                "email" => $this->request->getPost('email'),
                "password" => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ]);
            $user = json_decode(file_get_contents("php://input"));
            $response = ['message' => 'connected failed'];
            return $this->respondCreated($user, 201);
        }
    }
    public function getToken()
    {
    }


    public function logout()
    {
        $session = session();
        $session->set([

            'token_id'      => null,
            'logged_in'     => false
        ]);
        return redirect()->to('/login');
    }
}