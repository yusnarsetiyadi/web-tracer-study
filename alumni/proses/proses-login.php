<?php
session_start();
include "../../db/db_koneksi.php";
$con = new db_koneksi;

// ambil data dari inputan form login
$nisn = test_input($_POST['nisn']);
$password = test_input(md5($_POST['password']));

$data = $con->loginalumni($nisn);

// cek validasi login
if ($data > 0 && $password == $data["password"]) {
    $_SESSION["id_alumni"] = $data["id_alumni"];
    $_SESSION["nisn"] = $data["nisn"];
    $_SESSION["nama_lengkap"] = $data["nama_lengkap"];
    $_SESSION["email"] = $data["email"];
    $_SESSION["jurusan"] = $data["jurusan"];
    $_SESSION["foto_alumni"] = $data["foto_alumni"];

    if (isset($_POST['remember'])) {
        $time = time();
        setcookie('login', $nisn, $time + 3600);
    }

    $_SESSION['sukses'] = 'Halo! Selamat datang ' . ucfirst($data['nama_lengkap']) . ' , Semoga Harimu Menyenangkan!';
    header("location: ../dashboard/?menu=dashboard");
    exit();
} else {
    $_SESSION['gagal'] = 'NISN atau Password salah!';
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
