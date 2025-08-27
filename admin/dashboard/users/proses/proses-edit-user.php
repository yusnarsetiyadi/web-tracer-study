<?php
session_start();

include "../../../../db/db_koneksi.php";
$con = new db_koneksi;
$id = isset($_GET['id']) ? $_GET['id'] : null;
$data = $con->select_user($id);

if (isset($_POST["edit"])) {
    $username = test_input($_POST['username']);
    $nama = test_input($_POST['nama']);
    $email = test_input($_POST['email']);
    $password = !empty($_POST['password']) ? test_input(md5($_POST['password'])) : $password = $data['password'];
    $jabatan = test_input($_POST['jabatan']);
    $level = isset($_POST['level']) ? test_input($_POST['level']) : '';

    date_default_timezone_set('Asia/Jakarta');

    if ($username === $data['username'] && $email === $data['email']) {
        $data = $con->edit_user($id, $username, $nama, $email, $password, $jabatan, $level);
        $_SESSION['sukses'] = "Data Berhasil Diubah!";
        header("location: ../../?menu=data-user");
    } elseif ($username !== $data['username'] && $con->cek_username($username) && $email !== $data['email'] && $con->cek_email($email)) {
        $_SESSION['cek'] = "Username dan email sudah digunakan!";
        header("location: ../../?menu=edit-user&id=$id");
    } elseif ($username !== $data['username'] && $con->cek_username($username)) {
        $_SESSION['cek'] = "Username sudah digunakan!";
        header("location: ../../?menu=edit-user&id=$id");
    } elseif ($email !== $data['email'] && $con->cek_email($email)) {
        $_SESSION['cek'] = "Email sudah digunakan!";
        header("location: ../../?menu=edit-user&id=$id");
    } else {
        if (empty($level)) {
            $_SESSION['gagal'] = 'Mohon pilih level!';
            header("location: ../../?menu=edit-user&id=$id");
        } else {
            $data = $con->edit_user($id, $username, $nama, $email, $password, $jabatan, $level);
            $_SESSION['sukses'] = "Data Berhasil Diubah!";
            header("location: ../../?menu=data-user");
            exit();
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