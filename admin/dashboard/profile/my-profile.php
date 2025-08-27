<?php
include "../../../db/db_koneksi.php";
$con = new db_koneksi;
$id = $_SESSION['id_user'];
$data = $con->select_user($id);
session_start();
?>
<section class="section profile">
    <div class="row">
        <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    <img src="../../assets/img/users/<?= $data['foto_profil'] ?>" alt="Profile" class="rounded-circle">
                    <h2><?= ucfirst($data['nama']) ?></h2>
                    <h3><?= ucfirst($data['jabatan']) ?></h3>
                    <span><i class="bi bi-envelope"></i> <?= $data['email'] ?></span>
                </div>
            </div>

        </div>

        <div class="col-xl-8">

            <div class="card">
                <div class="card-body pt-3">

                    <?php
                    if (isset($_SESSION['gagal'])) {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $_SESSION['gagal'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <?php

                        unset($_SESSION['gagal']);

                    }
                    if (isset($_SESSION['sukses'])) {
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $_SESSION['sukses'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <?php

                        unset($_SESSION['sukses']);
                    }

                    ?>
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">My
                                Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Ubah
                                Password</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                <div class="col-lg-9 col-md-8"><?= ucfirst($data['nama']) ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Jabatan</div>
                                <div class="col-lg-9 col-md-8"><?= ucfirst($data['jabatan']) ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Level User</div>
                                <div class="col-lg-9 col-md-8"><?= ucfirst($data['level']) ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8"><?= ucfirst($data['email']) ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Dibuat Pada</div>
                                <div class="col-lg-9 col-md-8"><?= $data['created_at'] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Diubah Pada</div>
                                <div class="col-lg-9 col-md-8"><?= $data['updated_at'] ?></div>
                            </div>

                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                            <!-- Profile Edit Form -->
                            <form class="row g-3" method="post" enctype="multipart/form-data"
                                action="profile/proses/proses-ubah-password.php?id=<?= $id ?>">

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Input Password Baru">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="password2" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="password2" name="password2"
                                            placeholder="Konfirmasi Password Baru">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="edit" value="edit">Simpan
                                        Perubahan</button>
                                </div>
                            </form><!-- End Profile Edit Form -->

                        </div>
                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
    </div>
</section>