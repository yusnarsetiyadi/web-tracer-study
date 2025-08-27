<div class="row">
  <div class="col-lg-12">

    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Data Tracer</h4>
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

        <a class="btn btn-sm btn-primary my-2" href="?menu=tambah-tracer"><i class="bi bi-plus"></i> Tambah</a>

        <!-- Table with stripped rows -->
        <!-- Tabel data Tracer -->
        <div class="table-responsive">
          <table class="table datatable">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Instansi</th>
                <th>Alamat Instansi</th>
                <th>Sektor Perusahaan</th>
                <th>No Telepon Perusahaan</th>
                <th>Gaji Sekarang</th>
                <th>Ket UMR</th>
                <th>Waktu Tunggu Pertama Kerja</th>
                <th>Instansi Pertama</th>
                <th>Sektor Instansi Pertama</th>
                <th>Gaji Pertama</th>
                <th>Ket UMR</th>
                <th>Diinput</th>
                <th>Diedit</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $counter = 1;

              foreach ($con->get_data_tracer_by_id($id) as $data) {
                ?>
                <tr>
                  <td><?= $counter++; ?></td>
                  <td><?= $data['nama_instansi']; ?></td>
                  <td><?= $data['alamat_instansi']; ?></td>
                  <td><?= $data['sektor_perusahaan']; ?></td>
                  <td><?= $data['no_telepon_instansi']; ?></td>
                  <td><?= $data['nilai_gaji']; ?></td>
                  <td><?= $data['ket_umr']; ?></td>
                  <td><?= $data['waktu_tunggu_kerja']; ?></td>
                  <td><?= $data['instansi_pertama']; ?></td>
                  <td><?= $data['sektor_instansi_pertama']; ?></td>
                  <td><?= $data['nilai_gaji_pertama']; ?></td>
                  <td><?= $data['ket_umr_gaji_pertama']; ?></td>
                  <td><?= $data['created_at']; ?></td>
                  <td><?= $data['updated_at']; ?></td>
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