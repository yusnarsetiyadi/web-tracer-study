<?php

session_start();

include "../../../../db/db_koneksi.php";
$con = new db_koneksi;
$id = $_SESSION['id_alumni'];
$data = $con->select_alumni($id);

if (isset($_POST["edit"])) {
    $password = md5($_POST['password']);
    $password2 = md5($_POST['password2']);

    if ($password == $password2) {
        // Simpan ke database
        $data = $con->ubah_password_alumni($id, $password);
        $_SESSION['sukses'] = "Password berhasil diubah";
    } else {
        $_SESSION['gagal'] = "Gagal - Konfirmasi Password Tidak Sama";
    }

    header("location: ../../?menu=my-profile");
    exit();
}

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
