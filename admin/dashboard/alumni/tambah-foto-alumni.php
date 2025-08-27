<?php
$id = $_GET['id_alumni'];
$data = $con->select_alumni($id);
?>

<div class="card">
    <div class="card-body row">
        <h5 class="card-title">Data Alumni</h5>
        <div class="col-md-6">
            <label for="nama_lengkap" class="form-label">Nama Alumni</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($data['nama_lengkap']) ?>" readonly>
        </div>
        <div class="col-md-6">
            <label for="nisn" class="form-label">NISN</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($data['nisn']) ?>" readonly>
        </div>
    </div>
    <div class="card-body row">
        <h5 class="card-title">Tambah Foto Alumni</h5>
        <form class="row g-3" method="post" enctype="multipart/form-data"
            action="alumni/proses/proses-tambah-foto.php?id_alumni=<?= $id ?>">
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="foto_alumni" class="form-label">Foto Alumni - <span>*Maks 5
                            MB</span></label>
                    <input type="file" class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>"
                        id="foto_alumni_upload" name="foto_alumni_upload" accept="image/png,image/jpeg,image/jpg"
                        autocomplete="off">
                    <div class="invalid-feedback">
                        <?php echo isset($_SESSION['gagal']) ? $_SESSION['gagal'] : ''; ?>
                    </div>
                    <?php unset($_SESSION['gagal']); ?>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="tambah" value="tambah">Simpan Foto</button>
                <a class="btn btn-danger" href="?menu=data-alumni">Kembali</a>
            </div>
        </form><!-- End Profile Edit Form -->
    </div>
</div>