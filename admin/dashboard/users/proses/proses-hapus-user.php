<?php
session_start();

include "../../../../db/db_koneksi.php";
$con = new db_koneksi;

$id = $_GET['id_user'];
$data = $con->select_user($id);

$gambar = "../../../../assets/img/users/" . $data['foto_profil'];

if ($con) {
    if ($data['foto_profil'] != 'default.png') {
        unlink($gambar);
    }
    $data = $con->hapus_user($id);
    $_SESSION['sukses'] = 'Data berhasil dihapus!';
    header("location: ../../?menu=data-user");
}
?>