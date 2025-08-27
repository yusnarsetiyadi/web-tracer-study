<div class="row">
  <div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data User</h4>
        <?php
        // notifikasi
        if (isset($_SESSION['sukses'])) {
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['sukses'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          <?php
        }
        unset($_SESSION['sukses']);
        if (isset($_SESSION['gagal'])) {
          ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['gagal'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          <?php
        }
        unset($_SESSION['gagal']);
        ?>

        <a class="btn btn-sm btn-primary my-2" href="?menu=tambah-user"><i class="bi bi-plus"></i> Tambah</a>

        <!-- Table with stripped rows -->
        <!-- Tabel data User -->
        <div class="table-responsive">
          <table class="table datatable">
            <thead>
              <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Level</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $counter = 1;

              foreach ($con->get_data_user() as $data) {
                ?>
                <tr>
                  <td><?= $counter++; ?></td>
                  <td><img src="../../assets/img/users/<?= $data["foto_profil"] ?>" alt="foto_profil"
                      class="img-fluid rounded-circle" width="30" />
                    <?= $data['username']; ?></td>
                  <td><?= $data['nama']; ?></td>
                  <td><?= $data['email']; ?></td>
                  <td><?= $data['jabatan']; ?></td>
                  <td><?= $data['level']; ?></td>
                  <td>


                    <a class="btn btn-success" href="?menu=edit-user&id_user=<?php echo $data['id_user']; ?>">
                      <i class="bi bi-pencil-square"></i>
                    </a>

                    <a onclick="return confirm('Apakah yakin User <?php echo $data['username']; ?> akan di hapus?')"
                      href="users/proses/proses-hapus-user.php?id_user=<?php echo $data['id_user']; ?>"
                      class="btn btn-danger btn-icon-split">
                      <span class="icon text-white">
                        <i class="bi bi-trash"></i>
                      </span>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>


        </div>
        <!-- End Table with stripped rows -->

      </div>
    </div>

  </div>
</div>