<?php

use App\Models\AtasanModel;
use App\Models\DivisiModel;
use App\Models\InformasiUserModel;
use App\Models\SecureModel;
use App\Models\UserModel;

function dpti()
{
    return "DEPARTEMEN PENGEMBANGAN TEKNOLOGI INFORMASI";
}
function security()
{
    return "SECURITY";
}
function driver()
{
    return "DRIVER";
}
function logistik()
{
    return "DEPARTEMEN LOGISTIK";
}
function adminLogin()
{
    $userid = session("userid");
    $atasan = new DivisiModel();
    $user = $atasan->query("SELECT departemen.divisi FROM departemen inner join user_divisi on departemen.id_divisi = user_divisi.id_divisi where userid = '$userid' ")->getResultArray();
    if (empty($user[0]["divisi"])) {
        return "user";
    } else {
        return $user[0]["divisi"];
    }
}

function adminAtasan()
{
    $userid = session("userid");
    $atasan = new AtasanModel();
    $data_atasan = $atasan->query("SELECT atasan.id_divisi, atasan.userid, departemen.divisi FROM atasan left join user_divisi on atasan.id_divisi = user_divisi.id_divisi left join departemen on atasan.id_divisi = departemen.id_divisi where atasan.userid = '$userid';")->getResultArray();
    if (empty($data_atasan[0]["divisi"])) {
        return "user";
    } else {
        return $data_atasan[0]["divisi"];
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
