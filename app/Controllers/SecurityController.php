<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SecurityModel;

class SecurityController extends BaseController
{



    public function index()
    {
    }

    public function SecurityController() {
        $security = new SecurityModel();
        $query   = $security->query("SELECT * FROM SECURITY WHERE status='available' ")->getResultArray();
        $data = [
            'order' => $query,
        ];
        return view("");

    }
}
