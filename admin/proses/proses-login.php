<?php
session_start();
include "../../db/db_koneksi.php";
$con = new db_koneksi;

// ambil data dari inputan form login
$username = test_input($_POST['username']);
$password = test_input(md5($_POST['password']));

$data = $con->login($username);

// cek validasi login
if ($data > 0 && $password == $data["password"]) {
    $_SESSION["id_user"] = $data["id_user"];
    $_SESSION["username"] = $data["username"];
    $_SESSION["nama"] = $data["nama"];
    $_SESSION["jabatan"] = $data["jabatan"];
    $_SESSION["email"] = $data["email"];
    $_SESSION["level"] = $data["level"];
    $_SESSION["foto_profil"] = $data["foto_profil"];

    if (isset($_POST['remember'])) {
        $time = time();
        setcookie('login', $username, $time + 3600);
    }

    $_SESSION['sukses'] = 'Halo! Selamat datang ' . ucfirst($data['username']) . ' , Semoga Harimu Menyenangkan!';
    header("location: ../dashboard/?menu=dashboard");
    exit();
} else {
    $_SESSION['gagal'] = 'Username atau Password salah!';
    header("location: ../");
    exit();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
