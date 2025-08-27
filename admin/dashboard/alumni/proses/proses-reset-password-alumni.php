<?php
session_start();

include "../../../../db/db_koneksi.php";
$con = new db_koneksi;

$id_alumni = $_GET['id_alumni'];
$data = $con->select_alumni($id_alumni);

$tgl_lahir = $data['tgl_lahir'];
$password = md5(date('dmY', strtotime($tgl_lahir)));

// echo "$tgl_lahir";
// echo "$password";

$data = $con->reset_password_alumni($id_alumni, $password);
$_SESSION['sukses'] = "Password Alumni berhasil di reset!";
header("location: ../../?menu=data-alumni");
exit();

?>