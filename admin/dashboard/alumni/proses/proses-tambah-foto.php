<?php
include "../../../../db/db_koneksi.php";
$con = new db_koneksi;
$id = isset($_GET['id_alumni']) ? $_GET['id_alumni'] : null;

session_start();

if (isset($_POST["tambah"])) {
    date_default_timezone_set('Asia/Jakarta');

    $nama_file_lengkap = $_FILES['foto_alumni_upload']['name'];

    if (!$nama_file_lengkap == '') {
        $ext_file = pathinfo($nama_file_lengkap, PATHINFO_EXTENSION);
        $tipe_file = $_FILES['foto_alumni_upload']['type'];
        $ukuran_file = $_FILES['foto_alumni_upload']['size'];
        $tmp_file = $_FILES['foto_alumni_upload']['tmp_name'];
        $max_file_size = 5 * 1024 * 1024; // 2MB

        $allowed_mime_types = array("image/png", "image/jpeg", "image/jpg");

        if ($ukuran_file > $max_file_size) {
            $_SESSION['gagal'] = "Ukuran file terlalu besar. Maksimal 5MB.";
            header("location: ../../?menu=tambah-foto-alumni&id_alumni=$id");
            exit();
        } elseif (!in_array($tipe_file, $allowed_mime_types)) {
            $_SESSION['gagal'] = "Jenis file tidak didukung. Silakan unggah file .png/.jpeg/.jpg.";
            header("location: ../../?menu=tambah-foto-alumni&id_alumni=$id");
            exit();
        } else {
            $nama_file_baru = uniqid() . '.' . $ext_file;
            $path = "../foto/" . $nama_file_baru;

            $data = $con->select_alumni($id);
            $gambar = "../foto/" . $data['foto_alumni'];
            $data = $con->tambah_foto($id, $nama_file_baru);
            if ($data) {
                if (move_uploaded_file($tmp_file, $path)) {
                    $_SESSION['sukses'] = 'Data berhasil diubah';
                    unlink($gambar);
                    header("location: ../../?menu=data-alumni");
                    exit();
                } else {
                    $_SESSION['gagal'] = "Terjadi kesalahan saat mengunggah file. Silakan coba lagi.";
                }
            } else {
                $_SESSION['gagal'] = 'Data gagal diubah';
            }
        }

    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
