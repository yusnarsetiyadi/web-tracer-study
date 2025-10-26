<?php
use PHPUnit\Framework\TestCase;

class FakeDBAdmin {
    public function login($username) {
        if ($username === "admin") {
            return [
                "id_user" => 1,
                "username" => "admin",
                "nama" => "Administrator",
                "jabatan" => "IT",
                "email" => "admin@test.com",
                "level" => "superadmin",
                "foto_profil" => "admin.jpg",
                "password" => md5("secret")
            ];
        }
        return null;
    }
}

class AuthAdminTest extends TestCase {
    public function testLoginAdminBerhasil() {
        $auth = new AuthAdmin(new FakeDBAdmin());
        $result = $auth->login("admin", "secret");
        $this->assertTrue($result["status"]);
        $this->assertEquals("Administrator", $result["user"]["nama"]);
    }

    public function testLoginAdminPasswordSalah() {
        $auth = new AuthAdmin(new FakeDBAdmin());
        $result = $auth->login("admin", "salah");
        $this->assertFalse($result["status"]);
        $this->assertEquals("Password salah", $result["message"]);
    }

    public function testLoginAdminUserTidakAda() {
        $auth = new AuthAdmin(new FakeDBAdmin());
        $result = $auth->login("bukanadmin", "secret");
        $this->assertFalse($result["status"]);
        $this->assertEquals("User tidak ditemukan", $result["message"]);
    }
}
