<?php
session_start();

include "../../../../db/db_koneksi.php";
$con = new db_koneksi;

if (isset($_POST["tambah"])) {
    $nisn = test_input($_POST['nisn']);
    $nama_lengkap = test_input($_POST['nama_lengkap']);
    $tempat_lahir = test_input($_POST['tempat_lahir']);
    $tgl_lahir = test_input($_POST['tgl_lahir']);
    $tahun_lulus = test_input($_POST['tahun_lulus']);
    $jurusan = test_input($_POST['jurusan']);
    $alamat = test_input($_POST['alamat']);
    $no_hp = test_input($_POST['no_hp']);
    $email = test_input($_POST['email']);
    $foto_alumni = 'default.png';

    $tanggal_lahir = date('Ymd', strtotime($tgl_lahir));
    $password = md5(date('dmY', strtotime($tgl_lahir)));

    date_default_timezone_set('Asia/Jakarta');

    $errors = [];
    if ($con->cek_nisn($nisn)) {
        $errors[] = "NISN sudah ada di sistem!";
    }
    if ($con->cek_email_alumni($email)) {
        $errors[] = "Email sudah digunakan!";
    }
    if (!empty($errors)) {
        $_SESSION['cek'] = implode(' ', $errors);
        $_SESSION['isi_nisn'] = $nisn;
        $_SESSION['isi_nama_lengkap'] = $nama_lengkap;
        $_SESSION['isi_tempat_lahir'] = $tempat_lahir;
        $_SESSION['isi_tgl_lahir'] = $tgl_lahir;
        $_SESSION['isi_tahun_lulus'] = $tahun_lulus;
        $_SESSION['isi_jurusan'] = $jurusan;
        $_SESSION['isi_alamat'] = $alamat;
        $_SESSION['isi_no_hp'] = $no_hp;
        $_SESSION['isi_email'] = $email;
        header("location: ../../?menu=tambah-alumni");
    } else {
        $con->tambah_alumni($nisn, $nama_lengkap, $tempat_lahir, $tanggal_lahir, $tahun_lulus, $jurusan, $alamat, $no_hp, $email, $password, $foto_alumni);
        $_SESSION['sukses'] = "Data Berhasil Ditambah!";
        header("location: ../../?menu=data-alumni");
        exit();
    }
}

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
