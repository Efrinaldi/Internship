<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;
use App\Models\OrderModel;
use App\Models\DriverModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\ReimburseModel;
use CodeIgniter\CodeIgniter;

class ReimburseController extends BaseController
{
    use ResponseTrait;

    function __construct()
    {


        $this->pemesanan = new OrdersModel();
        $this->order = new OrderModel();
        $this->pengemudi = new DriverModel();
        $this->model = new ReimburseModel();
    }
    // protected $model = 'App\Models\ReimburseModel';
    protected $helpers = ['custom'];

    public function index()
    {
        $data['reimburse'] = $this->model->orderBy('created_at', 'DESC')
            ->where('status', 'Requesting')
            ->findAll();
        return view('reimburse/index', $data);
    }


    public function insertReimburse()
    {
    }

    public function edit($id = null)
    {
        $reimburse = $this->model->where('id', $id)->first();
        if ($reimburse) {
            $data['reimburse'] = $reimburse;
            return view('reimburse/edit', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();
        $this->model->update($id, $data);
        return redirect()->to(site_url('reimburse'))->with('success', 'Data berhasil Diupdate');
    }

    public function delete($id = null)
    {
        $this->model->where('id', $id)->delete();
        return redirect()->to(site_url('reimburse'))->with('success', 'Data berhasil Dihapus');
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
                "status"  => $this->request->getPost("status"),
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

    public function approve()
    {
        $session = \Config\Services::session();
        $keyword = $this->request->getGet('keyword');
        $tglAwal = $this->request->getGet('tgl_awal');
        $tglAkhir = $this->request->getGet('tgl_akhir');
        $timestamp_awal = strtotime($tglAwal);
        $date_awal = date('Y-m-d H:i:s', $timestamp_awal);
        $timestamp_akhir = strtotime($tglAkhir);
        $date_akhir = date('Y-m-d H:i:s', $timestamp_akhir);
        $reimburses = $this->model->getApprove($keyword, $date_awal, $date_akhir)->getResult();
        $data = [
            'keyword' => $keyword,
            'tgl_awal' => $tglAwal,
            'tgl_akhir' => $tglAkhir,
            'reimburse' => $reimburses
        ];
        // if($timestamp_akhir < $timestamp_awal) {
        //     $session->setFlashdata('error', 'Masukkan Data tanggal dengan Benar');
        // }
        return view('reimburse/approve', $data);
    }

    public function list()
    {
        $get_id_pengemudi = session()->get('id_user');
        $data_join =  $this->model->getList($get_id_pengemudi)->getResult();
        $data = array(
            'list' => $data_join
        );
        return view('reimburse/list_order', $data);
    }

    public function add_reimburse($id = null)
    {
        $reimburse = $this->pemesanan->where('id_pemesanan', $id)->first();
        $getOrder = $this->order->where('id', $reimburse['id_pemesanan'])->first();
        $getPengemudi = $this->pengemudi->where('id_pengemudi', $reimburse['id_pengemudi'])->first();
        if ($reimburse) {
            $data['reimburse'] = $reimburse;
            $data['order'] = $getOrder;
            $data['pengemudi'] = $getPengemudi;
            return view('reimburse/add_reimburse', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
    public function refreshToken()
    {
    }

    public function store_reimburse($id = null)
    {
        $getId = $reimburse = $this->pemesanan->where('id_pemesanan', $id)->first();
        $validate = $this->validate([
            'deskripsi' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Deskripsi tidak boleh kosong!',
                    'min_length' => 'Minimal 3 karakter',
                ]
            ],
            'nominal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nominal tidak boleh kosong!',
                ]
            ],
            'photo' => [
                'rules' => 'mime_in[photo,image/jpg,image/jpeg,image/png]|max_size[photo,2048]',
                'errors' => [
                    'required' => 'Gambar tidak boleh kosong!',
                    'max_size' => 'Ukuran Batas Maximum melebihi',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,png',
                ]
            ]
        ]);
        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $fileberkas = $this->request->getFile('photo');
        $namaFileUpload = time() . '_' . $fileberkas->getName();
        $fileberkas->move('template/assets/img/upload', $namaFileUpload);
        $nominal = regexCurrency($this->request->getPost('nominal'));
        $this->model->insert([
            'id_pemesanan' => $getId['id'],
            'deskripsi'  => $this->request->getVar('deskripsi'),
            'nominal'   => $nominal,
            'photo'    => $namaFileUpload,
        ]);

        return redirect()->to(site_url('reimburse/list'))->with('success', 'Data berhasil Disimpan');
    }
}
