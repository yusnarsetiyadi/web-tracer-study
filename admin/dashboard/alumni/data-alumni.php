<div class="row">
  <div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Alumni</h4>
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

        <a class="btn btn-sm btn-primary my-2" href="?menu=tambah-alumni"><i class="bi bi-plus"></i> Tambah Data
          Alumni</a>

        <!-- Table with stripped rows -->
        <!-- Tabel data User -->
        <div class="table-responsive">
          <table class="table datatable">
            <thead>
              <tr>
                <th>No.</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Tahun Lulus</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $counter = 1;

              foreach ($con->get_data_alumni() as $data) {
                ?>
                <tr>
                  <td><?= $counter++; ?></td>
                  <td><?= $data['nisn']; ?></td>
                  <td><img src="alumni/foto/<?= $data["foto_alumni"] ?>" alt="foto_alumni"
                      class="img-fluid rounded-circle" width="30" /><?= $data['nama_lengkap']; ?></td>
                  <td><?= $data['jurusan']; ?></td>
                  <td><?= $data['tahun_lulus']; ?></td>
                  <td><?= $data['alamat']; ?></td>
                  <td><?= $data['no_hp']; ?></td>
                  <td><?= $data['email']; ?></td>
                  <td>

                    <a class="btn btn-primary mb-1"
                      href="?menu=tambah-foto-alumni&id_alumni=<?php echo $data['id_alumni']; ?>">
                      <i class="bi bi-repeat"> </i><i class="bi bi-card-image"> </i>
                    </a>

                    <a onclick="return confirm('Apakah yakin Alumni <?php echo $data['nama_lengkap']; ?> akan di reset passwordnya?')"
                      href="alumni/proses/proses-reset-password-alumni.php?id_alumni=<?php echo $data['id_alumni']; ?>"
                      class="btn btn-warning btn-icon-split mb-1">
                      <span class="icon text-white">
                        <i class="bi bi-repeat"> </i> <i class="bi bi-key"></i>
                      </span>
                    </a>

                    <a class="btn btn-info mb-1" href="?menu=detail-alumni&id_alumni=<?php echo $data['id_alumni']; ?>">
                      <i class="bi bi-info-square"> </i>
                    </a>

                    <a class="btn btn-success mb-1" href="?menu=edit-alumni&id_alumni=<?php echo $data['id_alumni']; ?>">
                      <i class="bi bi-pencil-square"> </i>
                    </a>

                    <a onclick="return confirm('Apakah yakin Alumni <?php echo $data['nama_lengkap']; ?> akan di hapus?')"
                      href="alumni/proses/proses-hapus-alumni.php?id_alumni=<?php echo $data['id_alumni']; ?>"
                      class="btn btn-danger btn-icon-split mb-1">
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