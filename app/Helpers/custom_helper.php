<?php

use App\Models\AtasanModel;
use App\Models\InformasiUserModel;
use App\Models\SecureModel;
use App\Models\UserModel;


function adminLogin()
{
    $model = new InformasiUserModel();
    $userid = session("userid");
    $atasan = new AtasanModel();
    $data_atasan = $atasan->query("SELECT * FROM user_divisi inner join  atasan on atasan.id_divisi = divisi.id_divisi where atasan.userid='$userid' ")->getResultArray();
    $user = $model->query("SELECT * FROM PMO_USER_DIVISI where userid ='$userid' ")->getResultArray();
    if (empty($user[0]["divisi"])) {
        return "user";
    } else {
        return $user[0]["divisi"];
    }
}

function format_rupiah($angka)
{
    $hasilRupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasilRupiah;
}

function regexCurrency($inp)
{
    $pattern = "/([^\d\,])/";
    $result = preg_replace($pattern, "", $inp);
    return $result;
}
