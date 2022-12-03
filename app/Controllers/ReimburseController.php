<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrdersModel;
use App\Models\OrderModel;
use App\Models\DriverModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\ReimburseModel;
use CodeIgniter\CodeIgniter;
use CodeIgniter\RESTful\ResourceController;
use PhpOffice\PhpSpreadsheet\Reader\Xml\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border as StyleBorder;

class ReimburseController extends BaseController
{
    use ResponseTrait;
    // use Spreadsheet;

    function __construct()
    {
        $this->pemesanan = new OrdersModel();
        $this->order = new OrderModel();
        $this->pengemudi = new DriverModel();
        $this->model = new ReimburseModel();
        $this->spreadsheet = new Spreadsheet();
        $this->validate     = \Config\Services::validation();
    }
    // protected $model = 'App\Models\ReimburseModel';
    protected $helpers = ['custom'];

    public function index()
    {
        $data['reimburse'] = $this->model->getPemesanan()->getResult();
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
    public function delete_inDriver($id = null)
    {
        $this->model->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data berhasil Dihapus');
    }






    public function uploadImage()
    {
        $fileberkas = $this->request->getFile('photo');
        $namaFileUpload = time() . '_' . $fileberkas->getName();
        if ($fileberkas->move("template/assets/img/upload", $namaFileUpload)) {
            $reimburse = new ReimburseModel();
            $data = [
                // "id_pemesanan" => $this->request->getPost("id_pemesanan"),
                // "deskripsi" => $this->request->getPost("deskripsi"),
                // "nominal" => $this->request->getPost("nominal"),
                // "status"  => $this->request->getPost("status"),
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
    public function refreshToken()
    {
    }

    public function store_reimburse($id = null)
    {
        $getId = $reimburse = $this->pemesanan->where('id_pemesanan', $id)->first();
        $validate = $this->validate->setRules([
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
        $filepoto = $this->request->getPost('image');
        // dd($filepoto);

        // $folderPath = "template/assets/img/upload/";

        // $image_parts = explode(";base64,", $filepoto);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];

        // $image_base64 = base64_decode($image_parts[1]);
        // $fileName = uniqid() . '.png';

        // $file = $folderPath . $fileName;
        // file_put_contents($file, $image_base64);


        // $namaFileUpload = time() . '_' . $fileberkas->getName();
        // dd($namaFileUpload);
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
        $keyword = $this->request->getVar('driver');
        $start = $this->request->getVar('startdate');
        $end = $this->request->getVar('enddate');
        $reimburses = $this->model->getApprove($keyword, $start, $end)->getResultArray();

        $waktu = "$start sd $end";
        $filename = $keyword . '-' . $waktu;
        // $spreadsheet = new Spreadsheet();
        $sheet = $this->spreadsheet->getActiveSheet();
        $sheet->mergeCells('A1:E1');

        $sheet->setCellValue('A1', "REKAP $keyword DARI $waktu");
        $sheet->setCellValue('A3', "NO");
        $sheet->setCellValue('B3', "NAMA DRIVER");
        $sheet->setCellValue('C3', "DESKRIPSI");
        $sheet->setCellValue('D3', "NOMINAL");
        $sheet->setCellValue('E3', "TANGGAL APPROVED");

        // memberikan border
        $sheet->getStyle('A3:E3')->getBorders()->getAllBorders()->setBorderStyle(StyleBorder::BORDER_THIN);

        // insert data
        $column = 4;
        $first_column = $column;
        $i = 1;
        $total = 0;
        foreach ($reimburses as $key => $reimburse) {
            $this->spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $i)
                ->setCellValue('B' . $column, $reimburse['nama_pengemudi'])
                ->setCellValue('C' . $column, $reimburse['deskripsi'])
                ->setCellValue('D' . $column, $reimburse['nominal'])
                ->setCellValue('E' . $column, $reimburse['updated_at']);
            $total = $total + $reimburse['nominal'];
            $i++;
            $column++;
        }
        $last_column = $column - 1;
        $sumrange = 'D' . $first_column . ':D' . $last_column;
        $sheet->mergeCells('A' . $column . ':C' . $column);
        $sheet->mergeCells('D' . $column . ':E' . $column);
        $sheet->setCellValue('A' . $column, 'Total');
        $sheet->setCellValue('D' . $column, '=SUM(' . $sumrange . ')');

        $sheet->getStyle('A4:E' . $column)->getBorders()->getAllBorders()->setBorderStyle(StyleBorder::BORDER_THIN);
        // // membuat file excel
        $lastColumn = $sheet->getHighestColumn();
        $lastRow = $sheet->getHighestRow();
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A' . $column . ':C' . $column)->getAlignment()->setHorizontal('center');
        // $sheet->getStyle('D'.$column.':E'.$column)->getAlignment()->setHorizontal('center');
        $sheet->getStyle("A1:$lastColumn$lastRow")->getAlignment()->setVertical('center');


        for ($i = 'A'; $i !=  $lastColumn; $i++) {
            $sheet->getColumnDimension($i)->setAutoSize(TRUE);
        }

        $sheet->getStyle('A3:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFE900');
        $writer = new Xlsx($this->spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
