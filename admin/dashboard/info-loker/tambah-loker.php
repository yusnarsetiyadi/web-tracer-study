<div class="card">
    <h5 class="card-title text-center mb-0">TAMBAH INFO LOKER</h5>
    <hr>

    <div class="card-body">
        <h5 class="card-title text-center mb-0">Form Lowongan Kerja</h5>
        
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

        <form method="post" action="info-loker/proses/proses-tambah-loker.php">
            <div class="row">
                <div class="col-md-6">
                    <label for="judul_pekerjaan" class="form-label">Judul Pekerjaan</label>
                    <input type="text" class="form-control" id="judul_pekerjaan" name="judul_pekerjaan" maxlength="100"
                        placeholder="Masukkan judul pekerjaan" value="<?php echo isset($_SESSION['isi_judul_pekerjaan']) ? htmlspecialchars($_SESSION['isi_judul_pekerjaan'], ENT_QUOTES, 'UTF-8') : ''; 
                        unset($_SESSION['isi_judul_pekerjaan']); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" maxlength="100"
                        placeholder="Masukkan nama perusahaan" value="<?php echo isset($_SESSION['isi_nama_perusahaan']) ? htmlspecialchars($_SESSION['isi_nama_perusahaan'], ENT_QUOTES, 'UTF-8') : ''; 
                        unset($_SESSION['isi_nama_perusahaan']); ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" maxlength="100"
                        placeholder="Masukkan lokasi pekerjaan" value="<?php echo isset($_SESSION['isi_lokasi']) ? htmlspecialchars($_SESSION['isi_lokasi'], ENT_QUOTES, 'UTF-8') : ''; 
                        unset($_SESSION['isi_lokasi']); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                        placeholder="Deskripsi pekerjaan" required><?php echo isset($_SESSION['isi_deskripsi']) ? htmlspecialchars($_SESSION['isi_deskripsi'], ENT_QUOTES, 'UTF-8') : ''; 
                        unset($_SESSION['isi_deskripsi']); ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="link" class="form-label">Link Pendaftaran (Opsional)</label>
                    <input type="text" class="form-control" id="link" name="link" maxlength="255"
                        placeholder="Link pendaftaran online (jika ada)" value="<?php echo isset($_SESSION['isi_link']) ? htmlspecialchars($_SESSION['isi_link'], ENT_QUOTES, 'UTF-8') : ''; 
                        unset($_SESSION['isi_link']); ?>">
                </div>
            </div>
            <hr>
            <div class="text-center">
                <button onclick="return confirm('Apakah data yang diinput sudah benar dan siap disimpan?')"
                    type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                <a class="btn btn-danger" href="?menu=data-loker">Kembali</a>
            </div>
        </form>
    </div>
</div>

<?php unset($_SESSION['gagal']); ?>
