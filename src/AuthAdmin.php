<?php
class AuthAdmin {
    private $db;

    public function __construct($db_koneksi) {
        $this->db = $db_koneksi;
    }

    public function login(string $username, string $password): array {
        $data = $this->db->login($username);

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
