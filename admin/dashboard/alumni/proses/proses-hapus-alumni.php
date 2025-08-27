<?php
session_start();

include "../../../../db/db_koneksi.php";
$con = new db_koneksi;

$id = $_GET['id_alumni'];
$data = $con->select_alumni($id);

$gambar = "../foto/" . $data['foto_alumni'];

if ($con->foreignkey_alumni($id)) {
    $_SESSION['gagal'] = 'Data tidak dapat dihapus karena sudah memiliki tracer study!';
    header("location: ../../?menu=data-alumni");
} else {
    if ($data['foto_profil'] != 'default.png') {
        unlink($gambar);
    }
    $data = $con->hapus_alumni($id);
    $_SESSION['sukses'] = 'Data berhasil dihapus!';
    header("location: ../../?menu=data-alumni");
}
?>