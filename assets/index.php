<?php
session_start();

include "../db/db_koneksi.php";
$con = new db_koneksi;

// Cek apakah session 'id' ada
if (!isset($_SESSION['id'])) {
    // Jika tidak ada, arahkan pengguna ke halaman login
    header("Location: ../index.php");
    exit();
} else {
    header("Location: ../dashboard/index.php");
    exit();
}
?>