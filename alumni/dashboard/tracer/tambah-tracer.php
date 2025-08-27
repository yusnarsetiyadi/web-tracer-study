<div class="card">
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
                <label for="sektor" class="form-label">Bergerak di sektor apakah perusahaan Anda bekerja saat ini
                    ?</label>
                <select class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>" name="sektor"
                    id="sektor">
                    <option selected disabled>
                        <?php
                        if (!isset($_SESSION['isi_sektor'])) {
                            echo 'Pilih sektor instansi anda saat ini bekerja...';
                        } else {
                            echo $_SESSION['isi_sektor'];
                            unset($_SESSION['isi_sektor']);
                        }
                        ?>
                    </option>
                    <?php
                    $sektors = ['Instansi Pemerintahan', 'Finansial', 'Pendidikan', 'Kesehatan', 'Jasa', 'Lainnya'];

                    foreach ($sektors as $sektor) {
                        $selected = isset($_POST['sektor']) && $_POST['sektor'] == $sektor ? 'selected' : '';
                        echo '<option value="' . $sektor . '" ' . $selected . '>' . $sektor . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-6">
                <label for="no_telepon_instansi" class="form-label">Nomor Telepon Instansi</label>
                <input type="no_telepon_instansi" class="form-control" id="No TeleponInstansi" name="no_telepon_instansi"
                    maxlength="15" placeholder="Nomor Telepon Instansi" value="<?php echo isset($_SESSION['isi_no_telepon_instansi']) ? htmlspecialchars($_SESSION['isi_no_telepon_instansi'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_no_telepon_instansi']); ?>" required>
            </div>

            <div class="col-md-6">
                <label for="nilai_gaji" class="form-label">Berapakah Nilai Gaji Anda Saat Ini ?</label>
                <select class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>"
                    name="nilai_gaji" id="nilai_gaji">
                    <option selected disabled>
                        <?php
                        if (!isset($_SESSION['isi_nilai_gaji'])) {
                            echo 'Pilih nilai gaji anda saat ini...';
                        } else {
                            echo $_SESSION['isi_nilai_gaji'];
                            unset($_SESSION['isi_nilai_gaji']);
                        }
                        ?>
                    </option>
                    <?php
                    $nilai_gajis = ['< 2 Juta', '2-3 Juta', '3-5 Juta', '5-7 Juta', '7-10 Juta', '> 10 Juta'];

                    foreach ($nilai_gajis as $nilai_gaji) {
                        $selected = isset($_POST['nilai_gaji']) && $_POST['nilai_gaji'] == $nilai_gaji ? 'selected' : '';
                        echo '<option value="' . $nilai_gaji . '" ' . $selected . '>' . $nilai_gaji . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="ket_umr" class="form-label">Apakah nilai gaji/pendapatan anda sesuai dengan UMR daerah
                    ?</label>
                <select class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>" name="ket_umr"
                    id="ket_umr">
                    <option selected disabled>
                        <?php
                        if (!isset($_SESSION['isi_ket_umr'])) {
                            echo 'Pilih ket umr gaji anda saat ini...';
                        } else {
                            echo $_SESSION['isi_ket_umr'];
                            unset($_SESSION['isi_ket_umr']);
                        }
                        ?>
                    </option>
                    <?php
                    $ket_umrs = ['Sesuai UMR', 'Tidak Sesuai UMR - Lebih Kecil', 'Tidak Sesuai UMR - Lebih Besar'];

                    foreach ($ket_umrs as $ket_umr) {
                        $selected = isset($_POST['ket_umr']) && $_POST['ket_umr'] == $ket_umr ? 'selected' : '';
                        echo '<option value="' . $ket_umr . '" ' . $selected . '>' . $ket_umr . '</option>';
                    }
                    ?>
                </select>
            </div>
            <hr>
            <div class="col-md-6">
                <label for="waktu_tunggu" class="form-label">Berapa lama waktu tunggu anda mendapatkan pekerjaan pertama
                    kali ?</label>
                <select class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>"
                    name="waktu_tunggu" id="waktu_tunggu">
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
                <label for="nama_instansi_pertama" class="form-label">Di instansi mana anda pertama kali bekerja
                    ?</label>
                <input type="text" class="form-control" id="nama_instansi_pertama" name="nama_instansi_pertama"
                    maxlength="50" placeholder="Masukan nama instansi pertama anda bekerja" value="<?php echo isset($_SESSION['isi_nama_instansi_pertama']) ? htmlspecialchars($_SESSION['isi_nama_instansi_pertama'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_nama_instansi_pertama']); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="sektor_pertama" class="form-label">Di instansi sektor mana anda pertama kali bekerja
                    ?</label>
                <select class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>"
                    name="sektor_pertama" id="sektor_pertama">
                    <option selected disabled>
                        <?php
                        if (!isset($_SESSION['isi_sektor_pertama'])) {
                            echo 'Pilih sektor instansi pertama bekerja...';
                        } else {
                            echo $_SESSION['isi_sektor_pertama'];
                            unset($_SESSION['isi_sektor_pertama']);
                        }
                        ?>
                    </option>
                    <?php
                    $sektor_pertamas = ['Instansi Pemerintahan', 'Finansial', 'Pendidikan', 'Kesehatan', 'Jasa', 'Lainnya'];

                    foreach ($sektor_pertamas as $sektor_pertama) {
                        $selected = isset($_POST['sektor_pertama']) && $_POST['sektor_pertama'] == $sektor_pertama ? 'selected' : '';
                        echo '<option value="' . $sektor_pertama . '" ' . $selected . '>' . $sektor_pertama . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-6">
                <label for="nilai_gaji_pertama" class="form-label">Berapakah Nilai Gaji Anda Pertama Kali Bekerja
                    ?</label>
                <select class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>"
                    name="nilai_gaji_pertama" id="nilai_gaji_pertama">
                    <option selected disabled>
                        <?php
                        if (!isset($_SESSION['isi_nilai_gaji_pertama'])) {
                            echo 'Pilih nilai gaji anda saat Pertama Bekerja...';
                        } else {
                            echo $_SESSION['isi_nilai_gaji_pertama'];
                            unset($_SESSION['isi_nilai_gaji_pertama']);
                        }
                        ?>
                    </option>
                    <?php
                    $nilai_gaji_pertamas = ['< 2 Juta', '2-3 Juta', '3-5 Juta', '5-7 Juta', '7-10 Juta', '> 10 Juta'];

                    foreach ($nilai_gaji_pertamas as $nilai_gaji_pertama) {
                        $selected = isset($_POST['nilai_gaji_pertama']) && $_POST['nilai_gaji_pertama'] == $nilai_gaji_pertama ? 'selected' : '';
                        echo '<option value="' . $nilai_gaji_pertama . '" ' . $selected . '>' . $nilai_gaji_pertama . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="ket_umr_gaji_pertama" class="form-label">Apakah nilai gaji/pendapatan Pertama anda sesuai
                    dengan UMR daerah
                    ?</label>
                <select class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>"
                    name="ket_umr_gaji_pertama" id="ket_umr_gaji_pertama">
                    <option selected disabled>
                        <?php
                        if (!isset($_SESSION['isi_ket_umr_gaji_pertama'])) {
                            echo 'Pilih ket umr gaji anda saat ini...';
                        } else {
                            echo $_SESSION['isi_ket_umr_gaji_pertama'];
                            unset($_SESSION['isi_ket_umr_gaji_pertama']);
                        }
                        ?>
                    </option>
                    <?php
                    $ket_umr_gaji_pertamas = ['Sesuai UMR', 'Tidak Sesuai UMR - Lebih Kecil', 'Tidak Sesuai UMR - Lebih Besar'];

                    foreach ($ket_umr_gaji_pertamas as $ket_umr_gaji_pertama) {
                        $selected = isset($_POST['ket_umr_gaji_pertama']) && $_POST['ket_umr_gaji_pertama'] == $ket_umr_gaji_pertama ? 'selected' : '';
                        echo '<option value="' . $ket_umr_gaji_pertama . '" ' . $selected . '>' . $ket_umr_gaji_pertama . '</option>';
                    }
                    ?>
                </select>
            </div>
            <hr>
            <div class="text-center">
                <button onclick="return confirm('Apakah data yang diinput sudah benar dan siap disimpan?')"
                    type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                <a onclick="return confirm('Apakah Anda Yakin untuk membatalkan input tracer study ini?')"
                    class="btn btn-danger" href="?menu=data-tracer">Kembali</a>
            </div>
        </form><!-- End No Labels Form -->

    </div>
</div>

<?php unset($_SESSION['gagal']); ?>