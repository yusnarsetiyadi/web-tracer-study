<?php
class User {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function tambahUser($username, $nama, $email, $password, $jabatan, $level) {
        $foto_profil = 'default.png';
        $errors = [];

        if ($this->con->cek_username($username)) {
            $errors[] = "Username sudah digunakan!";
        }
        if ($this->con->cek_email($email)) {
            $errors[] = "Email sudah digunakan!";
        }
        if (empty($level)) {
            $errors[] = "Mohon pilih level!";
        }

        if (!empty($errors)) {
            return ['success' => false, 'errors' => $errors];
        }

        $this->con->tambah_user($username, $nama, $email, $password, $jabatan, $level, $foto_profil);

        return ['success' => true, 'message' => "Data Berhasil Ditambah!"];
    }
}
