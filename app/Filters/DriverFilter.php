<?php

namespace App\Filters;

use App\Models\CarModel;
use App\Models\DriverModel;
use App\Models\OrderModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class DriverFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $orders = new OrderModel();
        $car = new CarModel();
        $driver = new DriverModel();
        $today = date('d/m/Y');
        $time = date('H:i');
        $data = $orders->query("SELECT * FROM orders RIGHT JOIN pemesanan_mobil on pemesanan_mobil.id_pemesanan = orders.id
         WHERE TANGGAL= '$today' and waktu = '$time' or waktu_end = '$time' ")->getResultArray();
        $time = date('H:i');
        $waktu = $today . " " . $time;
        foreach ($data as $o) {
            $id_mobil = $o["id_mobil"];
            if ($o["tanggal"] === $today) {
                $id_mobil = $o["id_mobil"];
                $id_driver = $o["id_pengemudi"];
                if ($o["waktu"] === $time) {
                    $data_order = [
                        "status_mobil" => "Tidak Tersedia"
                    ];
                    $car->update($id_mobil, $data_order);
                }
                if ($o["waktu_end"] === $time) {
                    $data_order = [
                        "status_mobil" => "Tersedia"
                    ];
                    $car->update($id_mobil, $data_order);
                }
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
