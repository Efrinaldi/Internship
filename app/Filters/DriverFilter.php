<?php

namespace App\Filters;

use App\Models\OrderModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class DriverFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {



        $order = new OrderModel();
        $data =  $order->query("SELECT * FROM orders where waktu ")->getResultArray();
        if (date("M") == 9 && date("d") == 22) {
            for ($i = 0; $i < count($data); $i++) {
                if (date("Y") > date('Y', strtotime($data["production"]))) {
                    if (date("M") > date('M', strtotime($data["production"]))) {
                        if (date("M") > date('M', strtotime($data["production"]))) {
                            $status = [
                                "status" => "adhoc"
                            ];
                        }
                    }
                }
            }
            $order->update($data[$i]["id_project"], $status);
        }



    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
