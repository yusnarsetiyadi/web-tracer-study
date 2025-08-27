<div class="card">
    <div class="card-body">
        <h5 class="card-title">Tambah User</h5>
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


        <!-- Form Tambah User -->
        <form class="row g-3" method="post" action="users/proses/proses-tambah-user.php">
            <div class="col-md-6">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" maxlength="30"
                    placeholder="Username" value="<?php echo isset($_SESSION['isi_username']) ? htmlspecialchars($_SESSION['isi_username'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_username']); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" maxlength="50" pattern="^[A-Za-z ]+$"
                    placeholder="Nama" value="<?php echo isset($_SESSION['isi_nama']) ? htmlspecialchars($_SESSION['isi_nama'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_nama']); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" maxlength="30" placeholder="Email"
                    value="<?php echo isset($_SESSION['isi_email']) ? htmlspecialchars($_SESSION['isi_email'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_email']); ?>" required>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" maxlength="50" name="password"
                    placeholder="Password" required>
            </div>
            <div class="col-md-6">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" maxlength="30" placeholder="Jabatan"
                    value="<?php echo isset($_SESSION['isi_jabatan']) ? htmlspecialchars($_SESSION['isi_jabatan'], ENT_QUOTES, 'UTF-8') : '';
                    unset($_SESSION['isi_jabatan']); ?>" required>
            </div>

            <div class="col-md-6">
                <label for="level" class="form-label">Level User</label>
                <select class="form-control <?php echo isset($_SESSION['gagal']) ? 'is-invalid' : ''; ?>" name="level"
                    id="level">
                    <option selected disabled>
                        <?php
                        if (!isset($_SESSION['isi_level'])) {
                            echo 'Pilih Level User...';
                        } else {
                            echo $_SESSION['isi_level'];
                            unset($_SESSION['isi_level']);
                        }
                        ?>
                    </option>
                    <?php
                    $levels = ['admin', 'operator'];

                    foreach ($levels as $level) {
                        $selected = isset($_POST['level']) && $_POST['level'] == $level ? 'selected' : '';
                        echo '<option value="' . $level . '" ' . $selected . '>' . $level . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                <a class="btn btn-danger" href="?menu=data-user">Kembali</a>
            </div>
        </form><!-- End No Labels Form -->

    </div>
</div>

<?php unset($_SESSION['gagal']); ?>