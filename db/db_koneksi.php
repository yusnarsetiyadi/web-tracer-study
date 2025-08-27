<?php

class db_koneksi
{
    private $koneksi;

    // Koneksi Database 
    function __construct()
    {
        $server = '127.0.0.1';
        $username = 'root';
        $password = 'Yusnar12345*';
        $database = 'tracer_study';
    
        $this->koneksi = new mysqli($server, $username, $password, $database);   
        if ($this->koneksi->connect_error) {
            die("Koneksi database gagal: " . $this->koneksi->connect_error);
        }
    }

    // Fungsi Login
    function login($username)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }
    function loginalumni($nisn)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM alumni WHERE nisn = ?");
        $stmt->bind_param("s", $nisn);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    //USERS
    //ambil data user
    function get_data_user()
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM user");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    // tampilkan data user berdasarkaan id
    function select_user($id)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM user WHERE id_user = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    // cek username yang sudah ada di sistem
    function cek_username($username)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    // cek email yang sudah ada di sistem
    function cek_email($email)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    //tambah user ke database 
    function tambah_user($username, $nama, $email, $password, $jabatan, $level, $foto_profil)
    {
        $stmt = $this->koneksi->prepare("INSERT INTO user (username, nama, email, password, jabatan, level, foto_profil) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $username, $nama, $email, $password, $jabatan, $level, $foto_profil);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Cek Foreign Key User
    function foreignkey_alumni($id)
    {
        $stmt = $this->koneksi->prepare("SELECT COUNT(*) AS total FROM tracer WHERE id_alumni = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'] > 0;
    }

    //hapus user dari database 
    function hapus_user($id)
    {
        $stmt = $this->koneksi->prepare("DELETE FROM user WHERE id_user = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    //edit user dari database 
    function edit_user($id, $username, $nama, $email, $password, $jabatan, $level)
    {
        $stmt = $this->koneksi->prepare("UPDATE user SET username = ?, nama = ?, email = ?, password = ?, jabatan = ?, level = ? WHERE id_user = ?");
        $stmt->bind_param("ssssssi", $username, $nama, $email, $password, $jabatan, $level, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    //edit profil dari database 
    function edit_profile($id, $nama, $email, $password, $nama_file_lengkap)
    {
        $stmt = $this->koneksi->prepare("UPDATE user SET nama = ?, email = ?, password = ?, foto_profil = ? WHERE id_user = ?");
        $stmt->bind_param("ssssi", $nama, $email, $password, $nama_file_lengkap, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // total user
    function total_user()
    {
        $stmt = $this->koneksi->prepare("SELECT COUNT(*) AS total FROM user");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'];
    }

    function ubah_password_user($id, $password)
    {
        $stmt = $this->koneksi->prepare("UPDATE user SET password = ? WHERE id_user = ?");
        $stmt->bind_param("si", $password, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    // Alumni
    function total_alumni()
    {
        $stmt = $this->koneksi->prepare("SELECT COUNT(*) AS total FROM alumni");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'];
    }

    //tambah alumni ke database 
    function tambah_alumni($nisn, $nama_lengkap, $tempat_lahir, $tanggal_lahir, $tahun_lulus, $jurusan, $alamat, $no_hp, $email, $password, $foto_alumni)
    {
        $stmt = $this->koneksi->prepare("INSERT INTO alumni (nisn, nama_lengkap, tempat_lahir, tgl_lahir, tahun_lulus, jurusan, alamat, no_hp, email, password, foto_alumni) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssisssssss", $nisn, $nama_lengkap, $tempat_lahir, $tanggal_lahir, $tahun_lulus, $jurusan, $alamat, $no_hp, $email, $password, $foto_alumni);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    function edit_alumni($id_alumni, $nisn, $nama_lengkap, $tempat_lahir, $tanggal_lahir, $tahun_lulus, $jurusan, $alamat, $no_hp, $email)
    {
        $stmt = $this->koneksi->prepare("UPDATE alumni SET nisn = ?, nama_lengkap = ?, tempat_lahir = ?, tgl_lahir = ?, tahun_lulus = ?, jurusan = ?, alamat = ?, no_hp = ?, email = ? WHERE id_alumni = ?");
        $stmt->bind_param("sssssssssi", $nisn, $nama_lengkap, $tempat_lahir, $tanggal_lahir, $tahun_lulus, $jurusan, $alamat, $no_hp, $email, $id_alumni);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }


    function get_data_alumni()
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM alumni");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
    function select_alumni($id)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM alumni WHERE id_alumni = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    function tambah_foto($id_alumni, $foto_alumni)
    {
        $stmt = $this->koneksi->prepare("UPDATE alumni SET foto_alumni = ? WHERE id_alumni = ?");
        $stmt->bind_param("si", $foto_alumni, $id_alumni);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    function cek_nisn($nisn)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM alumni WHERE nisn = ?");
        $stmt->bind_param("s", $nisn);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }
    // cek email yang sudah ada di sistem
    function cek_email_alumni($email)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM alumni WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }

    //hapus user dari database 
    function hapus_alumni($id)
    {
        $stmt = $this->koneksi->prepare("DELETE FROM alumni WHERE id_alumni = ?");
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    function ubah_password_alumni($id, $password)
    {
        $stmt = $this->koneksi->prepare("UPDATE alumni SET password = ? WHERE id_alumni = ?");
        $stmt->bind_param("si", $password, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    function reset_password_alumni($id, $password)
    {
        $stmt = $this->koneksi->prepare("UPDATE alumni SET password = ? WHERE id_alumni = ?");
        $stmt->bind_param("si", $password, $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }


    // tracer
    function tambah_tracer(
        $id_alumni,
        $nama_instansi,
        $alamat_instansi,
        $sektor_perusahaan,
        $no_telepon_instansi,
        $nilai_gaji,
        $ket_umr,
        $waktu_tunggu_kerja,
        $instansi_pertama,
        $sektor_instansi_pertama,
        $nilai_gaji_pertama,
        $ket_umr_gaji_pertama
    ) {
        $stmt = $this->koneksi->prepare("INSERT INTO tracer (id_alumni, nama_instansi, alamat_instansi, sektor_perusahaan, no_telepon_instansi, nilai_gaji, ket_umr, waktu_tunggu_kerja, instansi_pertama, sektor_instansi_pertama, nilai_gaji_pertama, ket_umr_gaji_pertama
        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("isssssssssss", $id_alumni, $nama_instansi, $alamat_instansi, $sektor_perusahaan, $no_telepon_instansi, $nilai_gaji, $ket_umr, $waktu_tunggu_kerja, $instansi_pertama, $sektor_instansi_pertama, $nilai_gaji_pertama, $ket_umr_gaji_pertama);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    function total_tracer()
    {
        $stmt = $this->koneksi->prepare("SELECT COUNT(*) AS total FROM tracer");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'];
    }

    function total_tracer_saya($id)
    {
        $stmt = $this->koneksi->prepare("SELECT COUNT(*) AS total FROM tracer where id_alumni=$id");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'];
    }


    function get_data_tracer()
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM tracer");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    function get_laporan_data_tracer()
    {
        $stmt = $this->koneksi->prepare("SELECT 
        tracer.*, 
        alumni.nama_lengkap AS nama_alumni, 
        alumni.jurusan AS jurusan, 
        alumni.tahun_lulus AS tahun_lulus
        FROM tracer 
        JOIN alumni ON alumni.id_alumni = tracer.id_alumni 
       ");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }


    function get_data_tracer_by_id($id)
    {
        $stmt = $this->koneksi->prepare("SELECT * FROM tracer where id_alumni=$id");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }
}