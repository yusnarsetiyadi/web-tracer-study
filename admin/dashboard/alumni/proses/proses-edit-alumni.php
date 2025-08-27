<?php
session_start();

include "../../../../db/db_koneksi.php";
$con = new db_koneksi;
$id_alumni = isset($_GET['id']) ? $_GET['id'] : null;
$data = $con->select_alumni($id_alumni);

if (isset($_POST["edit"])) {
    $nisn = test_input($_POST['nisn']);
    $nama_lengkap = test_input($_POST['nama_lengkap']);
    $tempat_lahir = test_input($_POST['tempat_lahir']);
    $tgl_lahir = test_input($_POST['tgl_lahir']);
    $tahun_lulus = test_input($_POST['tahun_lulus']);
    $jurusan = test_input($_POST['jurusan']);
    $alamat = test_input($_POST['alamat']);
    $no_hp = test_input($_POST['no_hp']);
    $email = test_input($_POST['email']);

    $tanggal_lahir = date('Y-m-d', strtotime($tgl_lahir));
    date_default_timezone_set('Asia/Jakarta');

    if ($nisn === $data['nisn'] && $email === $data['email']) {
        $data = $con->edit_alumni($id_alumni, $nisn, $nama_lengkap, $tempat_lahir, $tanggal_lahir, $tahun_lulus, $jurusan, $alamat, $no_hp, $email);
        $_SESSION['sukses'] = "Data Berhasil Diubah!";
        header("location: ../../?menu=data-alumni");
        exit();
    } elseif ($nisn !== $data['nisn'] && $con->cek_nisn($nisn) && $email !== $data['email'] && $con->cek_email_alumni($email)) {
        $_SESSION['cek'] = "NISN dan Email sudah digunakan!";
    } elseif ($nisn !== $data['nisn'] && $con->cek_nisn($nisn)) {
        $_SESSION['cek'] = "NISN sudah digunakan!";
    } elseif ($email !== $data['email'] && $con->cek_email_alumni($email)) {
        $_SESSION['cek'] = "Email sudah digunakan!";
    } else {
        $data = $con->edit_alumni($id_alumni, $nisn, $nama_lengkap, $tempat_lahir, $tanggal_lahir, $tahun_lulus, $jurusan, $alamat, $no_hp, $email);
        $_SESSION['sukses'] = "Data Berhasil Diubah!";
        header("location: ../../?menu=data-alumni");
        exit();
    }

    header("location: ../../?menu=edit-alumni&id_alumni=$id_alumni");
    exit();
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>