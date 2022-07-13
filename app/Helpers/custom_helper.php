<?php

function adminLogin() {
    $db = \Config\Database::connect();
    return $db->table('oauth_user')->where('id_user', session('id_user'))->get()->getRow();
}

function format_rupiah($angka) {
    $hasilRupiah = "Rp " . number_format($angka,2,',','.');
	return $hasilRupiah;
}

function regexCurrency($inp)
{
    $pattern = "/([^\d\,])/";
    $result = preg_replace($pattern, "", $inp);
    return $result;
}

?>