<?php
$id = $_GET['id_alumni'];
$data = $con->select_alumni($id);
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Detail Data Alumni</h5>

        <!-- Form Edit Alumni -->
        <form class="row g-3" method="post" action="alumni/proses/proses-edit-alumni.php?id=<?= $id ?>">

            <div class="col-md-6">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" maxlength="10"
                    value="<?php echo $data['nisn'] ?>" disabled>
            </div>
            <div class="col-md-6">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                    value="<?php echo $data['nama_lengkap'] ?>" maxlength="50" pattern="^[A-Za-z ]+$" disabled>
            </div>
            <div class="col-md-6">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                    value="<?php echo $data['tempat_lahir'] ?>" maxlength="50" pattern="^[A-Za-z ]+$" disabled>
            </div>

            <div class="col-md-6">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir (mm-dd-yyyy)</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir"
                    value="<?php echo isset($_POST['tgl_lahir']) ? $_POST['tgl_lahir'] : htmlspecialchars($data['tgl_lahir']); ?>"
                    disabled>
            </div>

            <div class="col-md-6">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan"
                    value="<?php echo $data['jurusan'] ?>" maxlength="50" maxlength="50" disabled>
            </div>

            <div class="col-md-6">
                <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus"
                    value="<?php echo $data['tahun_lulus'] ?>" maxlength="50" maxlength="4" pattern="^\d{4}$" disabled>
            </div>


            <div class="col-md-6">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat'] ?>"
                    maxlength="50" disabled>
            </div>

            <div class="col-md-6">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp'] ?>"
                    maxlength="15" disabled>
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="30"
                    value="<?php echo $data['email'] ?>" disabled>
            </div>
            <div class="text-center">
                <a class="btn btn-success" href="?menu=data-alumni">Kembali</a>
            </div>
        </form><!-- End No Labels Form -->

    </div>
</div>