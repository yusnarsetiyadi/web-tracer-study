<?php
session_start();
include "../../../../db/db_koneksi.php";
$id_alumni = $_SESSION['id_alumni'];
$con = new db_koneksi;

if (isset($_POST["tambah"])) {
    $nama_instansi = test_input($_POST['nama_instansi']);
    $alamat_instansi = test_input($_POST['alamat_instansi']);
    $sektor_perusahaan = test_input($_POST['sektor']);
    $no_telepon_instansi = test_input($_POST['no_telepon_instansi']);
    $nilai_gaji = test_input($_POST['nilai_gaji']);
    $ket_umr = test_input($_POST['ket_umr']);
    $waktu_tunggu_kerja = test_input($_POST['waktu_tunggu']);
    $instansi_pertama = test_input($_POST['nama_instansi_pertama']);
    $sektor_instansi_pertama = test_input($_POST['sektor_pertama']);
    $nilai_gaji_pertama = test_input($_POST['nilai_gaji_pertama']);
    $ket_umr_gaji_pertama = test_input($_POST['ket_umr_gaji_pertama']);

    date_default_timezone_set('Asia/Jakarta');

    $con->tambah_tracer($id_alumni, $nama_instansi, $alamat_instansi, $sektor_perusahaan, $no_telepon_instansi, $nilai_gaji, $ket_umr, $waktu_tunggu_kerja, $instansi_pertama, $sektor_instansi_pertama, $nilai_gaji_pertama, $ket_umr_gaji_pertama);
    $_SESSION['sukses'] = "Data Tracer Berhasil Ditambah!";
    header("location: ../../?menu=data-tracer");
    exit();
}

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
