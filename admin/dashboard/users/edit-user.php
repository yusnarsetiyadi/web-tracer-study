<?php
$id = $_GET['id_user'];
$data = $con->select_user($id);
?>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Edit Data User</h5>

        <?php
        // notifikasi
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


        <!-- Form Edit User -->
        <form class="row g-3" method="post" action="users/proses/proses-edit-user.php?id=<?= $id ?>">
            <div class="col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" maxlength="30"
                    value="<?php echo $data['username'] ?>">
            </div>
            <div class="col-md-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama'] ?>"
                    maxlength="50" pattern="^[A-Za-z ]+$" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="30"
                    value="<?php echo $data['email'] ?>" required>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" maxlength="50" name="password"
                    placeholder="Masukan Password">
            </div>
            <div class="col-md-6">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" maxlength="30"
                    value="<?php echo $data['jabatan'] ?>" required>
            </div>
            <div class="col-md-6">
                <label for="level" class="form-label">Level User</label>
                <select class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>" name="level"
                    id="level">
                    <?php
                    $levels = ['admin', 'operator'];

                    foreach ($levels as $level1) {
                        $selected = isset($data['level']) && $data['level'] == $level1 ? 'selected' : '';
                        echo '<option value="' . $level1 . '" ' . $selected . '>' . $level1 . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="edit" value="edit">Simpan</button>
                <a class="btn btn-danger" href="?menu=data-user">Kembali</a>
            </div>
        </form><!-- End No Labels Form -->

    </div>
</div>