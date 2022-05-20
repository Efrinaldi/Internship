<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DriverModel;
use App\Models\AdminModel;

class AdminController extends BaseController
{
    public function index()
    {
        //
    }


    // public function sendNotification()
    // {

    //     $admin = new AdminModel();
    //     $driver = new DriverModel();
    //     $validate = $this->validate([
    //         'notif_id' => 'required'

    //     ]);
    //     $id = 1;
    //     $spesific_driver = $driver->find($id);
    //     $id_notification = $this->request->getVar(('notif_id'));
    //     $title = "Driver Menyetujui";
    //     $pesan = "Driver atas nama";
    //     $tipe_device = $this->request->getVar('device_type');
    //     $token = $this->request->getVar('token');
    //     $accesstoken = 'YOUR FCM KEY';

    //     $URL = 'https://fcm.googleapis.com/fcm/send';


    //     $post_data = '{
    //             "to" : "' . $notification_id . '",
    //             "data" : {
    //               "body" : "",
    //               "title" : "' . $title . '",
    //               "type" : "' . $d_type . '",
    //               "id" : "' . $id . '",
    //               "message" : "' . $message . '",
    //             },
    //             "notification" : {
    //                  "body" : "' . $message . '",
    //                  "title" : "' . $title . '",
    //                   "type" : "' . $d_type . '",
    //                  "id" : "' . $id . '",
    //                  "message" : "' . $message . '",
    //                 "icon" : "new",
    //                 "sound" : "default"
    //                 },

    //           }';
    //     // print_r($post_data);die;

    //     $crl = curl_init();

    //     $headr = array();
    //     $headr[] = 'Content-type: application/json';
    //     $headr[] = 'Authorization: ' . $accesstoken;
    //     curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);

    //     curl_setopt($crl, CURLOPT_URL, $URL);
    //     curl_setopt($crl, CURLOPT_HTTPHEADER, $headr);

    //     curl_setopt($crl, CURLOPT_POST, true);
    //     curl_setopt($crl, CURLOPT_POSTFIELDS, $post_data);
    //     curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);

    //     $rest = curl_exec($crl);

    //     if ($rest === false) {
    //         // throw new Exception('Curl error: ' . curl_error($crl));
    //         //print_r('Curl error: ' . curl_error($crl));
    //         $result_noti = 0;
    //     } else {

    //         $result_noti = 1;
    //     }

    //     echo view('success');
    // }
}
