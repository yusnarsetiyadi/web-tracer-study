<?php
include "../../../../db/db_koneksi.php";
$con = new db_koneksi;
$id = isset($_GET['id_user']) ? $_GET['id_user'] : null;
$data = $con->select_user($id);

session_start();

if (isset($_POST["edit"])) {
    $nama = isset($_POST['nama']) ? test_input($_POST['nama']) : $data['nama'];
    $email = isset($_POST['email']) ? test_input($_POST['email']) : $data['email'];
    $password = !empty($_POST['password']) ? md5(test_input($_POST['password'])) : $data['password'];

    date_default_timezone_set('Asia/Jakarta');

    $nama_file_lengkap = $_FILES['foto_profil_upload']['name'];
    $foto_lama = $data['foto_profil'];
    $nama_file_baru = $foto_lama;

    // Cek apakah ada file baru yang diupload
    if (!empty($nama_file_lengkap)) {
        $ext_file = pathinfo($nama_file_lengkap, PATHINFO_EXTENSION);
        $tipe_file = $_FILES['foto_profil_upload']['type'];
        $ukuran_file = $_FILES['foto_profil_upload']['size'];
        $tmp_file = $_FILES['foto_profil_upload']['tmp_name'];
        $max_file_size = 2 * 1024 * 1024; // 2MB
        $allowed_mime_types = ["image/png", "image/jpeg", "image/jpg"];

        if ($ukuran_file > $max_file_size) {
            $_SESSION['gagal'] = "Ukuran file terlalu besar. Maksimal 2MB.";
            header("location: ../../?menu=my-profile");
            exit();
        }

        if (!in_array($tipe_file, $allowed_mime_types)) {
            $_SESSION['gagal'] = "Jenis file tidak didukung. Silakan unggah file .png/.jpeg/.jpg.";
            header("location: ../../?menu=my-profile");
            exit();
        }

        $nama_file_baru = uniqid() . '.' . $ext_file;
        $path_upload = "../../../../assets/img/users/" . $nama_file_baru;
    }

    // Cek email apakah sudah digunakan
    if ($email !== $data['email'] && $con->cek_email($email)) {
        $_SESSION['gagal'] = "Email sudah digunakan!";
        header("location: ../../?menu=my-profile");
        exit();
    }

    // Simpan ke database
    $update = $con->edit_profile($id, $nama, $email, $password, $nama_file_baru);

    if ($update) {
        // Jika ada file baru diupload, simpan dan hapus yang lama (kecuali default.png)
        if (!empty($nama_file_lengkap)) {
            if (move_uploaded_file($tmp_file, $path_upload)) {
                $path_lama = "../../../../assets/img/users/" . $foto_lama;
                if ($foto_lama !== 'default.png' && file_exists($path_lama)) {
                    unlink($path_lama);
                }
            } else {
                $_SESSION['gagal'] = "Terjadi kesalahan saat mengunggah file.";
                header("location: ../../?menu=my-profile");
                exit();
            }
        }

        $_SESSION['sukses'] = "Data berhasil diubah";
    } else {
        $_SESSION['gagal'] = "Data gagal diubah";
    }

    header("location: ../../?menu=my-profile");
    exit();
}

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
