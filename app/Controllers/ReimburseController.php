<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;
use App\Models\OrderModel;
use App\Models\DriverModel;
use App\Models\ReimburseModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReimburseController extends BaseController
{
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
    public function delete_inDriver($id = null)
    {
        $this->model->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data berhasil Dihapus');
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
        return view('reimburse/list_order',$data);
    }

    public function add_reimburse($id = null)
    {
        $pemesanan = $this->pemesanan->where('id_pemesanan', $id)->first();
        $reimbursement = $this->model->where('id_pemesanan', $pemesanan['id'])->get()->getResult();
        $getOrder = $this->order->where('id', $pemesanan['id_pemesanan'])->first();
        $getPengemudi = $this->pengemudi->where('id_pengemudi', $pemesanan['id_pengemudi'])->first();
        if ($pemesanan) {
            $data['pemesanan'] = $pemesanan;
            $data['order'] = $getOrder;
            $data['pengemudi'] = $getPengemudi;
            $data['reimbursement'] = $reimbursement;
            return view('reimburse/add_reimburse', $data);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
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
        $namaFileUpload = time() .'_'. $fileberkas->getName();
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

    public function export()
    {
        $keyword = $this->request->getGet('keyword');
        $tglAwal = $this->request->getGet('tgl_awal');
        $tglAkhir = $this->request->getGet('tgl_akhir');
        $timestamp_awal = strtotime($tglAwal);
        $date_awal = date('Y-m-d H:i:s', $timestamp_awal);
        $timestamp_akhir = strtotime($tglAkhir);
        $date_akhir = date('Y-m-d H:i:s', $timestamp_akhir);
        $reimburses = $this->model->getApprove($keyword, $date_awal, $date_akhir)->getResult();

        // dd($reimburses);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Driver');
        $sheet->setCellValue('C1', 'Deskripsi');
        $sheet->setCellValue('D1', 'Tanggal Approved');
        $sheet->setCellValue('E1', 'Nominal');

        $column = 2;
        foreach ($reimburses as $key => $value) {
            $sheet->setCellValue('A'.$column, ($column-1));
            $sheet->setCellValue('B'.$column, $value->nama_pengemudi);
            $sheet->setCellValue('B'.$column, $value->deskripsi);
            $sheet->setCellValue('B'.$column, $value->updated_at);
            $sheet->setCellValue('B'.$column, $value->nominal);
            $column++;
        }

        $filename = $keyword.$tglAwal.$tglAkhir;
        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);
        header("Content-Type: application/vnd.ms-excel");
        header("Content-disposition: attachment;filename='".basename($filename)."'");
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Program: public');
        header('Content-Length:' . filesize($filename));
        flush();
        readfile($filename);
        exit;
        // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // header("Content-disposition: attachment;filename='".basename($filename)."'");
        // header('Cache-Control: max-age=0');
        // $writer->save('php://output');
        // exit();
    }
}
