<?php
use PHPUnit\Framework\TestCase;

// Mock DB
class MockDb {
    public $cekNisnReturn = false;
    public $cekEmailReturn = false;
    public $tambahAlumniCalled = false;

    public function cek_nisn($nisn) {
        return $this->cekNisnReturn;
    }

    public function cek_email_alumni($email) {
        return $this->cekEmailReturn;
    }

    public function tambah_alumni(...$args) {
        $this->tambahAlumniCalled = true;
    }
}

class AlumniTest extends TestCase {
    private $dbMock;
    private $alumni;

    protected function setUp(): void {
        $this->dbMock = new MockDb();
        $this->alumni = new Alumni($this->dbMock);
    }

    public function testTambahAlumniBerhasil() {
        $this->dbMock->cekNisnReturn = false;
        $this->dbMock->cekEmailReturn = false;

        $result = $this->alumni->tambahAlumni(
            "123456", "Budi", "Jakarta", "2000-01-01", "2018",
            "RPL", "Jl. Merdeka", "08123456789", "budi@test.com"
        );

        $this->assertTrue($result['success']);
        $this->assertEquals("Data Berhasil Ditambah!", $result['message']);
        $this->assertTrue($this->dbMock->tambahAlumniCalled);
    }

    public function testTambahAlumniGagalKarenaNisnSudahAda() {
        $this->dbMock->cekNisnReturn = true;

        $result = $this->alumni->tambahAlumni(
            "123456", "Budi", "Jakarta", "2000-01-01", "2018",
            "RPL", "Jl. Merdeka", "08123456789", "budi@test.com"
        );

        $this->assertFalse($result['success']);
        $this->assertContains("NISN sudah ada di sistem!", $result['errors']);
    }

    public function testTambahAlumniGagalKarenaEmailSudahAda() {
        $this->dbMock->cekNisnReturn = false;
        $this->dbMock->cekEmailReturn = true;

        $result = $this->alumni->tambahAlumni(
            "123456", "Budi", "Jakarta", "2000-01-01", "2018",
            "RPL", "Jl. Merdeka", "08123456789", "budi@test.com"
        );

        $this->assertFalse($result['success']);
        $this->assertContains("Email sudah digunakan!", $result['errors']);
    }
}
