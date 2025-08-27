<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tambah Alumni</h5>
        <!-- Cek Session -->
        <?php
        if (isset($_SESSION['cek'])) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['cek'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
        }
        unset($_SESSION['cek']);
        ?>


        <!-- Form Tambah Alumni -->
        <form class="row g-3" method="post" action="alumni/proses/proses-tambah-alumni.php">
            <div class="col-md-6">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" maxlength="10" placeholder="NISN" value="<?php echo isset($_SESSION['isi_nisn']) ? htmlspecialchars($_SESSION['isi_nisn'], ENT_QUOTES, 'UTF-8') : '';
                unset($_SESSION['isi_nisn']); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" maxlength="50"
                    pattern="^[A-Za-z ]+$" placeholder="nama_lengkap" value="<?php echo isset($_SESSION['isi_nama_lengkap']) ? htmlspecialchars($_SESSION['isi_nama_lengkap'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_nama_lengkap']); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" maxlength="50"
                    pattern="^[A-Za-z ]+$" placeholder="tempat_lahir" value="<?php echo isset($_SESSION['isi_tempat_lahir']) ? htmlspecialchars($_SESSION['isi_tempat_lahir'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_tempat_lahir']); ?>" required>
            </div>

            <div class="col-md-6">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo isset($_SESSION['isi_tgl_lahir']) ? htmlspecialchars($_SESSION['isi_tgl_lahir'], ENT_QUOTES, 'UTF-8') : '';
                unset($_SESSION['isi_tgl_lahir']); ?>" required>
            </div>

            <div class="col-md-6">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" maxlength="50" placeholder="jurusan"
                    value="<?php echo isset($_SESSION['isi_jurusan']) ? htmlspecialchars($_SESSION['isi_jurusan'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_jurusan']); ?>" required>
            </div>

            <div class="col-md-6">
                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus" maxlength="4"
                    pattern="^\d{4}$" placeholder="tahun_lulus" value="<?php echo isset($_SESSION['isi_tahun_lulus']) ? htmlspecialchars($_SESSION['isi_tahun_lulus'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_tahun_lulus']); ?>" required>
            </div>

            <div class="col-md-6">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" maxlength="100" placeholder="alamat"
                    value="<?php echo isset($_SESSION['isi_alamat']) ? htmlspecialchars($_SESSION['isi_alamat'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_alamat']); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" maxlength="15" placeholder="no_hp"
                    value="<?php echo isset($_SESSION['isi_no_hp']) ? htmlspecialchars($_SESSION['isi_no_hp'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_no_hp']); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="30" placeholder="Email"
                    value="<?php echo isset($_SESSION['isi_email']) ? htmlspecialchars($_SESSION['isi_email'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_email']); ?>" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                <a class="btn btn-danger" href="?menu=data-alumni">Kembali</a>
            </div>
        </form><!-- End No Labels Form -->

    </div>
</div>

<?php unset($_SESSION['gagal']); ?>