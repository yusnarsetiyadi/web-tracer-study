<?php
session_start();
include "../../../../db/db_koneksi.php";
$id_loker = $_POST['id_loker'];
$con = new db_koneksi;

if (isset($_POST["edit"])) {
    $judul_pekerjaan = test_input($_POST['judul_pekerjaan']);
    $nama_perusahaan = test_input($_POST['nama_perusahaan']);
    $lokasi = test_input($_POST['lokasi']);
    $deskripsi = test_input($_POST['deskripsi']);
    $link = test_input($_POST['link']);
    
    date_default_timezone_set('Asia/Jakarta');

    $con->edit_loker($id_loker, $judul_pekerjaan, $nama_perusahaan, $lokasi, $deskripsi, $link);
    $_SESSION['sukses'] = "Info Loker Berhasil Diupdate!";
    header("location: ../../?menu=data-loker");
    exit();
}

// if (isset($_POST["hapus"])) {
//     $con->hapus_loker($id_loker);
//     $_SESSION['sukses'] = "Info Loker Berhasil Dihapus!";
//     header("location: ../../?menu=data-loker");
//     exit();
// }

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
