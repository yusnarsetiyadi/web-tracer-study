<?php
use PHPUnit\Framework\TestCase;

class FakeDB {
    public function loginalumni($nisn) {
        if ($nisn === "12345") {
            return [
                "id_alumni" => 1,
                "nisn" => "12345",
                "nama_lengkap" => "Budi",
                "email" => "budi@test.com",
                "jurusan" => "RPL",
                "foto_alumni" => "budi.jpg",
                "password" => md5("rahasia")
            ];
        }
        return null;
    }
}

class AuthTest extends TestCase {
    public function testLoginBerhasil() {
        $auth = new Auth(new FakeDB());
        $result = $auth->login("12345", "rahasia");
        $this->assertTrue($result["status"]);
        $this->assertEquals("Budi", $result["user"]["nama_lengkap"]);
    }

    public function testLoginGagalPasswordSalah() {
        $auth = new Auth(new FakeDB());
        $result = $auth->login("12345", "salah");
        $this->assertFalse($result["status"]);
        $this->assertEquals("Password salah", $result["message"]);
    }

    public function testLoginGagalUserTidakAda() {
        $auth = new Auth(new FakeDB());
        $result = $auth->login("99999", "rahasia");
        $this->assertFalse($result["status"]);
        $this->assertEquals("User tidak ditemukan", $result["message"]);
    }
}
