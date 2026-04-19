<?php
session_start();
include "../../../../db/db_koneksi.php";
$id_alumni = $_SESSION['id_alumni'];
$con = new db_koneksi;

if (isset($_POST["tambah"])) {
    $nama_instansi = test_input($_POST['nama_instansi']);
    $alamat_instansi = test_input($_POST['alamat_instansi']);
    $sedang_bekerja = test_input($_POST['sedang_bekerja']);
    $nilai_gaji = test_input($_POST['nilai_gaji']);
    $waktu_tunggu_kerja = test_input($_POST['waktu_tunggu']);
    $instansi_pertama = test_input($_POST['instansi_pertama']);
    $gaji_pertama_manual = test_input($_POST['gaji_pertama_manual']);
    $usaha_mandiri = test_input($_POST['usaha_mandiri']);
    
    date_default_timezone_set('Asia/Jakarta');

    $con->tambah_tracer($id_alumni, $nama_instansi, $alamat_instansi, $sedang_bekerja, $nilai_gaji, $waktu_tunggu_kerja, $instansi_pertama, $gaji_pertama_manual, $usaha_mandiri);
    $con->update_work_alumni($id_alumni);
    $_SESSION['sukses'] = "Data Tracer Berhasil Ditambah!";
    header("location: ../../?menu=data-tracer");
    exit();
}

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
