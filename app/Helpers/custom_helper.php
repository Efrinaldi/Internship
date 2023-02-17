<?php

use App\Models\AtasanModel;
use App\Models\DivisiModel;
use App\Models\InformasiUserModel;
use App\Models\OrderModel;
use App\Models\OrdersModel;
use App\Models\SecureModel;
use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;

function notif($receiver, $subject, $view, $data)
{
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $smtpkantor = "10.125.1.43";
    ini_set("SMTP", $smtpkantor);
    ini_set("smtp_port", "587");
    ini_set("sendmail_from", "adminmail@bcasyariah.co.id");
    require_once APPPATH . "Libraries\mailerku/PHPMailer.php";
    require_once APPPATH . "Libraries\mailerku/Exception.php";
    require_once APPPATH . "Libraries\mailerku/OAuth.php";
    require_once APPPATH . "Libraries\mailerku/POP3.php";
    require_once APPPATH . "Libraries\mailerku/SMTP.php";
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = $smtpkantor;
    $mail->SMTPAuth = true;
    $mail->Username = "adminmail@bcasyariah.co.id";
    $mail->Password = "syariah@1";
    $mail->SMTPSecure = "starttls";
    $mail->Port = 587;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->ClearAllRecipients();
    $mail->clearAddresses();
    $mail->clearAttachments();
    $mail->ClearCCs();
    $mail->ClearBCCs();
    $mail->From = "adminmail@bcasyariah.co.id"; //email pengirim
    $mail->FromName = "Pemesanan Kendaraan BCA Syariah"; //nama pengirim
    $mail->addAddress($receiver);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = view($view, $data);
    $mailer = $mail->send();
    return (bool)$mailer;
}

function notifyUser(bool $mode = false, $receiver, $sender, $sender_name, $subject, $view, $data)
{
    if ($mode === true) {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        $smtpkantor = "10.125.1.43";
        ini_set("SMTP", $smtpkantor);
        ini_set("smtp_port", "587");
        ini_set("sendmail_from", "adminmail@bcasyariah.co.id");
        require_once APPPATH . "\Libraries\mailerku/PHPMailer.php";
        require_once APPPATH . "\Libraries\mailerku/Exception.php";
        require_once APPPATH . "\Libraries\mailerku/OAuth.php";
        require_once APPPATH . "\Libraries\mailerku/POP3.php";
        require_once APPPATH . "\Libraries\mailerku/SMTP.php";
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $smtpkantor;
        $mail->SMTPAuth = true;
        $mail->Username = "adminmail@bcasyariah.co.id";
        $mail->Password = "syariah@1";
        $mail->SMTPSecure = "starttls";
        $mail->Port = 587;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->ClearAllRecipients();
        $mail->clearAddresses();
        $mail->clearAttachments();
        $mail->ClearCCs();
        $mail->ClearBCCs();
        $mail->From = $sender; //email pengirim
        $mail->FromName = $sender_name; //nama pengirim
        $mail->addAddress($receiver);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = view($view, $data);
        $send = $mail->send();
        return (bool)$send;
    } else {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        $from_name = $sender_name;
        $from_mail = $sender;
        $to = $receiver;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: " . $from_name . " <" . $from_mail . ">";
        $send = mail($to, $subject, view($view, $data), $headers);
        return (bool)$send;
    }
}
function dpti()
{
    return "DEPARTEMEN TEKNOLOGI INFORMASI";
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
    $user = $atasan->query("SELECT departemen.id_divisi, departemen.divisi FROM departemen inner join user_divisi on departemen.id_divisi = user_divisi.id_divisi where userid = '$userid' or user_domain = '$userid'")->getResultArray();
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
    $data_atasan = $atasan->query("SELECT atasan.id_divisi, atasan.userid, departemen.divisi FROM atasan left join user_divisi on atasan.id_divisi = user_divisi.id_divisi left join departemen on atasan.id_divisi = departemen.id_divisi where atasan.userid = '$userid' and  user_divisi.userid = '$userid';")->getResultArray();
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

function helper_driver($id_pemesanan,$id_driver){
$pemesanan = new OrdersModel();



}
