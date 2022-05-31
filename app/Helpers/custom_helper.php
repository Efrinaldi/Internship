<?php

function adminLogin() {
    $db = \Config\Database::connect();
    return $db->table('oauth_user')->where('id_user', session('id_user'))->get()->getRow();
}

?>