<?php
session_start();

include "../../../../db/db_koneksi.php";
$con = new db_koneksi;

$id = $_GET['id_loker'];

if ($con) {
   $data = $con->hapus_loker($id);
   $_SESSION['sukses'] = "Info Loker Berhasil Dihapus!";
   header("location: ../../?menu=data-loker");
}
?>