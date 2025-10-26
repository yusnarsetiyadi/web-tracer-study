<?php
use PHPUnit\Framework\TestCase;

// Mock DB
class MockDbUser {
    public $cekUsernameReturn = false;
    public $cekEmailReturn = false;
    public $tambahUserCalled = false;

    public function cek_username($username) {
        return $this->cekUsernameReturn;
    }

    public function cek_email($email) {
        return $this->cekEmailReturn;
    }

    public function tambah_user(...$args) {
        $this->tambahUserCalled = true;
    }
}

class UserTest extends TestCase {
    private $dbMock;
    private $user;

    protected function setUp(): void {
        $this->dbMock = new MockDbUser();
        $this->user = new User($this->dbMock);
    }

    public function testTambahUserBerhasil() {
        $this->dbMock->cekUsernameReturn = false;
        $this->dbMock->cekEmailReturn = false;

        $result = $this->user->tambahUser(
            "admin", "Admin User", "admin@test.com", md5("123456"), "Admin", "Admin"
        );

        $this->assertTrue($result['success']);
        $this->assertEquals("Data Berhasil Ditambah!", $result['message']);
        $this->assertTrue($this->dbMock->tambahUserCalled);
    }

    public function testTambahUserGagalUsernameSudahAda() {
        $this->dbMock->cekUsernameReturn = true;

        $result = $this->user->tambahUser(
            "admin", "Admin User", "admin@test.com", md5("123456"), "Admin", "Admin"
        );

        $this->assertFalse($result['success']);
        $this->assertContains("Username sudah digunakan!", $result['errors']);
    }

    public function testTambahUserGagalEmailSudahAda() {
        $this->dbMock->cekUsernameReturn = false;
        $this->dbMock->cekEmailReturn = true;

        $result = $this->user->tambahUser(
            "admin", "Admin User", "admin@test.com", md5("123456"), "Admin", "Admin"
        );

        $this->assertFalse($result['success']);
        $this->assertContains("Email sudah digunakan!", $result['errors']);
    }

    public function testTambahUserGagalLevelKosong() {
        $this->dbMock->cekUsernameReturn = false;
        $this->dbMock->cekEmailReturn = false;

        $result = $this->user->tambahUser(
            "admin", "Admin User", "admin@test.com", md5("123456"), "Admin", ""
        );

        $this->assertFalse($result['success']);
        $this->assertContains("Mohon pilih level!", $result['errors']);
    }
}
