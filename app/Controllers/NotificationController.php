<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class NotificationController extends BaseController
{
    use ResponseTrait;

    public function sendNotificationDriver($device_token)
    {
        return $this->sendNotification($device_token, array(
            "title" => "Orderan Masuk ",
            "body" => "Ada orderan masuk"
        ));
    }
    public function sendNotificationUser($device_token, $nama_pengemudi)
    {
        return $this->sendNotification($device_token, array(
            "title" => "Orderan Mobil Disetujui ! ",
            "body" => "Driver $nama_pengemudi sedang menuju kearah mu"
        ));
    }
    public function sendNotification($device_token, $message)
    {
        $SERVER_API_KEY = 'AAAA2TfP9uE:APA91bHuNEFhVcemj7_8CuZAYKLkwa-6X6BKhmmAX9kWTC3re0IZWxjyL6sLtzqb0Vtafs67a5usa9NNjjeNR3qrffbbypSiClGJyZIcTWxgsNnuK3OtiB_WiiMVMNBsWpn4DMumvV4K';
        $data = [
            "to" => $device_token, // for single device id
            "notification" => $message
        ];
        $dataString = json_encode($data);
        $content_type = 'application/json';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type:$content_type;", 'Accept:application/json', 'Authorization: key=' . $SERVER_API_KEY,
        ));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
        $error = curl_error($ch);
        $coba = curl_getinfo($ch);
        // $res = ["message" => $response];
        // return $this->respondCreated(array($res), 201);
    }
}
