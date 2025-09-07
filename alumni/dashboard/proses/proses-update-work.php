<?php
session_start();
include "../../../db/db_koneksi.php";
$con = new db_koneksi;

$id_alumni = test_input($_POST['id_alumni']);
$reason = test_input($_POST['reason']);

$con->update_reason_alumni($id_alumni, $reason);
$_SESSION['res_update'] = 'Penyebab belum kerja berhasil diperbarui';
header("location: ../");
exit();

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
