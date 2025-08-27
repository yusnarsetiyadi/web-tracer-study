<?php
session_start();

include "../../../../db/db_koneksi.php";
$con = new db_koneksi;

if (isset($_POST["tambah"])) {
    $username = test_input($_POST['username']);
    $nama = test_input($_POST['nama']);
    $email = test_input($_POST['email']);
    $password = test_input(md5($_POST['password']));
    $jabatan = test_input($_POST['jabatan']);
    $level = test_input($_POST['level'] ?? '');
    $foto_profil = 'default.png';

    date_default_timezone_set('Asia/Jakarta');

    $errors = [];
    if ($con->cek_username($username)) {
        $errors[] = "Username sudah digunakan!";
    }
    if ($con->cek_email($email)) {
        $errors[] = "Email sudah digunakan!";
    }
    if (empty($level)) {
        $errors[] = "Mohon pilih level!";
    }
    if (!empty($errors)) {
        $_SESSION['cek'] = implode(' ', $errors);
        $_SESSION['isi_username'] = $username;
        $_SESSION['isi_nama'] = $nama;
        $_SESSION['isi_email'] = $email;
        $_SESSION['isi_jabatan'] = $jabatan;
        $_SESSION['isi_level'] = $level;
        header("location: ../../?menu=tambah-user");
    } else {
        $con->tambah_user($username, $nama, $email, $password, $jabatan, $level, $foto_profil);
        $_SESSION['sukses'] = "Data Berhasil Ditambah!";
        header("location: ../../?menu=data-user");
        exit();
    }
}

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
