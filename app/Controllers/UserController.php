<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use App\Models\ReimburseModel;
use \OAuth2\Request;
use App\Libraries\Oauth;
use App\Models\AtasanModel;
use App\Models\DepartmentWorkerModel;
use App\Models\DivisiModel;
use App\Models\InformasiUserModel;
use App\Models\SecureModel;
use App\Models\UserDivisiModel;
use App\Models\WorkerModel;
use Tests\Support\RESTful\Worker;


class UserController extends ResourceController
{
    public function __construct()
    {
        $this->User = new UserModel();
        $this->session     = \Config\Services::session();
    }
    public function index()
    {
        if (session('logged_in') == true) {
            return redirect()->back();
        }
        helper(['form']);
        $data = [];
        echo view('login', $data);
    }
    public function login_sa()
    {
        if (session('logged_in') == true) {
            return redirect()->back();
        }
        helper(['form']);
        $data = [];
        echo view('LoginSA', $data);
    }
    public function showUser($id_user)
    {
        $user = new UserModel();
        $query = $user->query("select phone_number,first_name, last_name,nama_user,role,unit_kerja  from oauth_user where id_user = $id_user ");
        $rows = $query->getResult();
        $data = [
            "data" => $rows
        ];
        return $this->respondCreated($data, 201);
    }




    public function showAtasan($id_user)
    {
    }
    public function changeNumber($id_user)
    {

        $data = [
            "phone_number" => $this->request->getVar('phone_number')
        ];
        $data = json_decode(file_get_contents("php://input"));
        $this->User->update($id_user, $data);
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
    }

    public function authregister()
    {
        helper(['form']);
        $rules = [
            'first_name'          => 'required|min_length[3]|max_length[50]',
            'email'              => 'required|min_length[6]|max_length[50]|valid_email|is_unique[oauth_user.email]',
            'password'           => 'required|min_length[6]|max_length[200]',
            'confpassword'       => 'matches[password]',
            'last_name'          => 'required|min_length[3]|max_length[50]',
            'unit_kerja'        => 'required|min_length[6]|max_length[200]',
            'nip'               => 'required|min_length[6]|max_length[200]'
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
    public function password_check($str)
    {
        if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
            return TRUE;
        }
        return FALSE;
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
        $user = new SecureModel();
        $userdiv = new UserDivisiModel();
        $divisi = new DivisiModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data_coba = $user->query("exec uspLogonPHP @userid = '" . $username . "',@kode_aplikasi = '00033', @pass = '" . $password .  "', @result='' ")->getResultArray();
        $id_divisi = $userdiv->query("SELECT * FROM divisi inner join user_divisi where userid = '$username'")->getResultArray();
        $user_coba = current($data_coba[0]);
        $coba = current($data_coba[0]);
        if ($coba === "20UidApplNotListed" or $user_coba === "20UidApplNotListed") {
            $session->setFlashdata('msg', 'User ID tidak terdaftar untuk aplikasi');
            return redirect()->to('/login');
        } else if ($coba === "30UidNotAktif" or $user_coba === "30UidNotAktif") {
            $session->setFlashdata('msg', 'User ID tidak aktif');
            return redirect()->to('/login');
        } else if ($coba === "50UidExpired" or $user_coba === "50UidExpired") {
            $session->setFlashdata('msg', 'User tidak aktif');
            return redirect()->to('/login');
        } else if ($coba === "60UidPassNotMatched" or $user_coba === "60UidPassNotMatched") {
            $session->setFlashdata('msg', 'Password salah');
            return redirect()->to('/login');
        } else {
            $session->set([
                'userid'  => $username,
                'id_divisi'  => $id_divisi[0]["id_divisi"],
                'logged_in' => true,
                'user_domain' => $username
            ]);
            $data_user    = $userdiv->query("SELECT * FROM USER_DIVISI  where user_domain = '$username' ")->getResultArray();
            $pekerja      = str_replace("_", " ", $username);
            $data = [
                "user_domain" => $username
            ];
            if (count($data_user) == 0) {
                $data = [
                    "user_domain" => $username,
                    "userid"      => $username
                ];
                $userdiv->insert($data);
            }
            return redirect()->to('/dashboard');
        }
    }

    public function auth_sa()
    {
        $session = session();
        $user = new SecureModel();
        $userdiv = new UserDivisiModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $data_coba = $user->query("exec uspLogonPHP @userid = '" . $username . "',@kode_aplikasi = '00001', @pass = '" . $password .  "', @result='' ")->getResultArray();
        $user_coba = current($data_coba[0]);
        $coba = current($data_coba[0]);
        if ($coba === "20UidApplNotListed" or $user_coba === "20UidApplNotListed") {
            $session->setFlashdata('msg', 'User ID tidak terdaftar untuk aplikasi');
            return redirect()->to('/login_sa');
        } else if ($coba === "30UidNotAktif" or $user_coba === "30UidNotAktif") {
            $session->setFlashdata('msg', 'User ID tidak aktif');
            return redirect()->to('/login_sa');
        } else if ($coba === "50UidExpired" or $user_coba === "50UidExpired") {
            $session->setFlashdata('msg', 'User tidak aktif');
            return redirect()->to('/login_sa');
        } else if ($coba === "60UidPassNotMatched" or $user_coba === "60UidPassNotMatched") {
            $session->setFlashdata('msg', 'Password salah');
            return redirect()->to('/login_sa');
        } else {
            $session->set([
                'userid'  => $username,
                'divisi'  => "user",
                'logged_in' => true,
                'user_domain' => $username
            ]);
            $data_user    = $userdiv->query("SELECT * FROM USER_DIVISI  where user_domain = '$username' ")->getResultArray();
            $pekerja      = str_replace("_", " ", $username);
            $data = [
                "user_domain" => $username
            ];
            if (count($data_user) == 0) {
                $data = [
                    "user_domain" => $username,
                    "userid"      => $username
                ];
                $userdiv->insert($data);
            }
            return redirect()->to('/list_user');
        }
    }





    public function change_user($userid)
    {
        $divisiuser = new UserDivisiModel();
        $user = $divisiuser->query("SELECT * FROM user_divisi WHERE userid= '$userid' ")->getResultArray();
        $atasan = new AtasanModel();
        $atasan_exist = $atasan->query("SELECT * FROM atasan WHERE userid='$userid'")->getResultArray();
        $divisiModel = new DivisiModel();
        $id_divisi = $this->request->getPost("departemen");
        $secure = new SecureModel();
        $data_secure = $secure->query("SELECT * FROM t_users where userid='$userid' ")->getResultArray();
        $divisi = $divisiModel->query("SELECT * FROM divisi WHERE id_divisi='$id_divisi'")->getResultArray();
        $data = [
            "divisi"  => $divisi[0]["divisi"],
            "userid" => $userid,
            "id_divisi" => $this->request->getPost("departemen"),
            "email" => $this->request->getPost("email")
        ];
        $data_atasan = [
            "userid" => $userid,
            "username" => $data_secure[0]["username"],
            "atasan" => $data_secure[0]["username"],
            "id_divisi" => $this->request->getPost("departemen"),
        ];
        if (count($user) == 0) {
            $divisiuser->insert($data);
        }
        if (count($user) > 0) {
            $divisiuser->update($userid, $data);
        }
        if (count($atasan_exist) == 0) {
            if (isset($_POST['check_atasan'])) {
                $atasan->insert($data_atasan);
            }
        }
        if (count($atasan_exist) > 0) {
            if (count($user) > 0) {
                $atasan->update($userid, $data_atasan);
            } else {
                $atasan->insert($data_atasan);
            }
            if (isset($_POST['check_atasan'])) {
                $atasan->update($userid, $data_atasan);
            }
        }
        return redirect()->to("list_user");
    }


    public function hapus_atasan($id)
    {
        $atasan = new AtasanModel();
        $atasan->delete($id);
        return redirect()->to("list_user");
    }

    public function list_user()
    {
        $divisiuser = new UserDivisiModel();
        $user = new SecureModel();
        $divisi = new DivisiModel();
        $atasan = new AtasanModel();
        $data_user = $user->query("SELECT t_users.userdomain, t_usraplikasi.userid,[username] ,t_usraplikasi.kodeaplikasi  FROM t_users right join t_usraplikasi  on t_usraplikasi.userid = t_users.userid where t_usraplikasi.kodeaplikasi= '00033' ")->getResultArray();
        $data_divisi = $divisi->query("SELECT * FROM DIVISI")->getResultArray();
        $divisi_user = $divisi->query("SELECT * FROM user_divisi")->getResultArray();

        $data = [
            "data_user" => $data_user,
            "data_divisi" => $data_divisi,
            "divisiuser"      => $divisi_user,
            "atasan"     => $atasan
        ];
        return view('list_user', $data);
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

            $userdata = $this->User->where("email", $this->request->getVar("email"))->first();

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
            $this->User->update($id_user, [
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
        $this->User->insert($data);
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
            $this->User->insert([
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
    public function changePassword($id_user)
    {
        $rules = [
            'name'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.user_email]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];
        $data_user = [
            "password" => md5($this->request->getVar("password"))
        ];
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => "Berhasil di update"
        ];
        $this->User->update($id_user, $data_user);
        return $this->respondCreated($response, 201);
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
