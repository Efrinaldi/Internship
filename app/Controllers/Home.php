<?php

namespace App\Controllers;
use App\Models\Driver_model;
use App\Models\Order_model;

class Home extends BaseController
{
    protected $Driver_model;
    protected $Order_model;

    public function __construct()
    {
        $this->Driver_model = new Driver_Model();
        $this->Order_model = new Order_Model();
    }
    public function index()
    {
        return view('welcome_message');
    }
    public function dashboard()
    {
        return view('dashboard');
    }
    public function order()
    {
        $order = $this->Order_model

        ->findAll();
        $data=[
            'order' => $order,
        ];
        return view('order',$data);
    }
    public function driver()
    {
        $driver = $this->Driver_model

        ->findAll();
        $data=[
            'driver' => $driver,
        ];
        return view('driver',$data);
    }
    public function history()
    {
        return view('history');
    }
    public function process()
    {
        return view('process');
    }
        
}
