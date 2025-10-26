<?php
class Auth {
    private $db;

    public function __construct($db_koneksi) {
        $this->db = $db_koneksi;
    }

    public function login(string $nisn, string $password): array {
        $data = $this->db->loginalumni($nisn);

        if (!$data) {
            return [
                "status" => false,
                "message" => "User tidak ditemukan"
            ];
        }

        if ($data["password"] === md5($password)) {
            return [
                "status" => true,
                "user" => $data
            ];
        }

        return [
            "status" => false,
            "message" => "Password salah"
        ];
    }
}
