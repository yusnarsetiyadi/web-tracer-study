<div class="card">
    <h5 class="card-title text-center mb-0">STATISTIK ALUMNI</h5>
    <canvas id="alumniChart" style="max-height:400px;"></canvas>
    <hr>

    <div class="card-body">
        <h5 class="card-title text-center" mb-0>TAMBAH TRACER</h5>
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

        <h6 class="card-title">Data Pekerjaan</h6>
        <!-- Form Tambah User -->
        <form class="row g-3" method="post" action="tracer/proses/proses-tambah-tracer.php">
            <div class="col-md-6">
                <label for="sedang_bekerja" class="form-label">Apakah Anda Bekerja Saat Ini?</label>
                <select class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>" name="sedang_bekerja"
                    id="sedang_bekerja">
                    <option selected disabled>
                        <?php
                        if (!isset($_SESSION['isi_sedang_bekerja'])) {
                            echo 'Pilih status pekerjaan saat ini...';
                        } else {
                            echo $_SESSION['isi_sedang_bekerja'];
                            unset($_SESSION['isi_sedang_bekerja']);
                        }
                        ?>
                    </option>
                    <?php
                    $status_bekerja = ['Ya', 'Tidak'];
                    foreach ($status_bekerja as $status) {
                        $selected = isset($_POST['sedang_bekerja']) && $_POST['sedang_bekerja'] == $status ? 'selected' : '';
                        echo '<option value="' . $status . '" ' . $selected . '>' . $status . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="nama_instansi" class="form-label">Nama Instansi</label>
                <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" maxlength="50"
                    placeholder="Masukan nama instansi saat ini anda bekerja" value="<?php echo isset($_SESSION['isi_nama_instansi']) ? htmlspecialchars($_SESSION['isi_nama_instansi'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_nama_instansi']); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="alamat_instansi" class="form-label">Alamat Instansi</label>
                <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi" maxlength="50"
                    pattern="^[A-Za-z ]+$" placeholder="Alamat instansi" value="<?php echo isset($_SESSION['isi_alamat_instansi']) ? htmlspecialchars($_SESSION['isi_alamat_instansi'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_alamat_instansi']); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="nilai_gaji" class="form-label">Berapakah Nilai Gaji Anda Saat Ini?</label>
                <input type="text" class="form-control" id="nilai_gaji" name="nilai_gaji" maxlength="100"
                    placeholder="Contoh: 3.500.000 atau 5 Juta" value="<?php echo isset($_SESSION['isi_nilai_gaji']) ? htmlspecialchars($_SESSION['isi_nilai_gaji'], ENT_QUOTES, 'UTF-8') : ''; 
                    unset($_SESSION['isi_nilai_gaji']); ?>">
            </div>
            <hr>
            <h6 class="card-title">Pertanyaan Tambahan</h6>
            <div class="col-md-6">
                <label for="waktu_tunggu" class="form-label">Berapa lama waktu tunggu anda mendapatkan pekerjaan pertama kali?</label>
                <select class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>" name="waktu_tunggu"
                    id="waktu_tunggu">
                    <option selected disabled>
                        <?php
                        if (!isset($_SESSION['isi_waktu_tunggu'])) {
                            echo 'Pilih waktu tunggu pertama kali mendapatkan pekerjaan...';
                        } else {
                            echo $_SESSION['isi_waktu_tunggu'];
                            unset($_SESSION['isi_waktu_tunggu']);
                        }
                        ?>
                    </option>
                    <?php
                    $waktu_tunggus = ['Telah bekerja sebelum lulus', '< 3 bulan', '3-6 bulan', '6-12 bulan', '1-2 tahun', '> 2 tahun'];

                    foreach ($waktu_tunggus as $waktu_tunggu) {
                        $selected = isset($_POST['waktu_tunggu']) && $_POST['waktu_tunggu'] == $waktu_tunggu ? 'selected' : '';
                        echo '<option value="' . $waktu_tunggu . '" ' . $selected . '>' . $waktu_tunggu . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="instansi_pertama" class="form-label">Di instansi mana anda pertama kali bekerja?</label>
                <input type="text" class="form-control" id="instansi_pertama" name="instansi_pertama" maxlength="100"
                    placeholder="Contoh: PT Teknologi Indonesia atau Dinas Kesehatan" value="<?php echo isset($_SESSION['isi_instansi_pertama']) ? htmlspecialchars($_SESSION['isi_instansi_pertama'], ENT_QUOTES, 'UTF-8') : ''; 
                    unset($_SESSION['isi_instansi_pertama']); ?>">
            </div>
            <div class="col-md-6">
                <label for="gaji_pertama_manual" class="form-label">Berapakah Nilai Gaji Pertama Kali Anda Bekerja?</label>
                <input type="text" class="form-control" id="gaji_pertama_manual" name="gaji_pertama_manual"
                    maxlength="100" placeholder="Contoh: 3.500.000 atau 5 Juta" value="<?php echo isset($_SESSION['isi_gaji_pertama_manual']) ? htmlspecialchars($_SESSION['isi_gaji_pertama_manual'], ENT_QUOTES, 'UTF-8') : ''; 
                    unset($_SESSION['isi_gaji_pertama_manual']); ?>">
            </div>
            <div class="col-md-6">
                <label for="usaha_mandiri" class="form-label">Apakah anda mempunyai usaha mandiri saat ini?</label>
                <select class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>" name="usaha_mandiri"
                    id="usaha_mandiri">
                    <option selected disabled>
                        <?php
                        if (!isset($_SESSION['isi_usaha_mandiri'])) {
                            echo 'Pilih status usaha mandiri...';
                        } else {
                            echo $_SESSION['isi_usaha_mandiri'];
                            unset($_SESSION['isi_usaha_mandiri']);
                        }
                        ?>
                    </option>
                    <?php
                    $usaha_mandiris = ['Ya', 'Tidak'];
                    foreach ($usaha_mandiris as $usaha_mandiri) {
                        $selected = isset($_POST['usaha_mandiri']) && $_POST['usaha_mandiri'] == $usaha_mandiri ? 'selected' : '';
                        echo '<option value="' . $usaha_mandiri . '" ' . $selected . '>' . $usaha_mandiri . '</option>';
                    }
                    ?>
                </select>
            </div>
            <hr>
            <div class="text-center">
                <button onclick="return confirm('Apakah data yang diinput sudah benar dan siap disimpan?')"
                    type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                <a class="btn btn-danger" href="?menu=data-tracer">Kembali</a>
            </div>
        </form><!-- End No Labels Form -->

    </div>
</div>

<?php unset($_SESSION['gagal']); ?>