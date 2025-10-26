<?php
class Alumni {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function tambahAlumni($nisn, $nama_lengkap, $tempat_lahir, $tgl_lahir, $tahun_lulus, $jurusan, $alamat, $no_hp, $email) {
        $tanggal_lahir = date('Ymd', strtotime($tgl_lahir));
        $password = md5(date('dmY', strtotime($tgl_lahir)));
        $foto_alumni = 'default.png';

        $errors = [];
        if ($this->con->cek_nisn($nisn)) {
            $errors[] = "NISN sudah ada di sistem!";
        }
        if ($this->con->cek_email_alumni($email)) {
            $errors[] = "Email sudah digunakan!";
        }
        if (!empty($errors)) {
            return ['success' => false, 'errors' => $errors];
        }

        $this->con->tambah_alumni($nisn, $nama_lengkap, $tempat_lahir, $tanggal_lahir, $tahun_lulus, $jurusan, $alamat, $no_hp, $email, $password, $foto_alumni);

        return ['success' => true, 'message' => "Data Berhasil Ditambah!"];
    }
}
