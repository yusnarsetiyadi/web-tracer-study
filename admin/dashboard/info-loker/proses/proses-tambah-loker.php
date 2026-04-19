<?php
session_start();
include "../../../../db/db_koneksi.php";
$id_admin = $_SESSION['id_user'];
$con = new db_koneksi;

if (isset($_POST["tambah"])) {
    $judul_pekerjaan = test_input($_POST['judul_pekerjaan']);
    $nama_perusahaan = test_input($_POST['nama_perusahaan']);
    $lokasi = test_input($_POST['lokasi']);
    $deskripsi = test_input($_POST['deskripsi']);
    $link = test_input($_POST['link']);
    $nama_admin = $_SESSION['nama'];
    
    date_default_timezone_set('Asia/Jakarta');

    $con->tambah_loker($judul_pekerjaan, $nama_perusahaan, $lokasi, $deskripsi, $link, $nama_admin);
    $_SESSION['sukses'] = "Info Loker Berhasil Ditambah!";
    header("location: ../../?menu=data-loker");
    exit();
}

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
