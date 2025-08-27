<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Laporan Data Tracer</h4>

                <?php
                // Notifikasi
                if (isset($_SESSION['sukses'])) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
                        . $_SESSION['sukses'] .
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['sukses']);
                }

                if (isset($_SESSION['gagal'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                        . $_SESSION['gagal'] .
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['gagal']);
                }
                ?>

                <!-- Tombol Tambah & Export -->
                <div class="mb-3 d-flex gap-2">
                    <a href="laporan/proses/export-tracer.php" class="btn btn-sm btn-success">
                        <i class="bi bi-file-earmark-excel"></i> Export Excel
                    </a>
                </div>

                <!-- Tabel Tracer -->
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Alumni</th>
                                <th>Jurusan</th>
                                <th>Tahun Lulus</th>
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
                            $dataTracer = $con->get_laporan_data_tracer();
                            if (!empty($dataTracer)) {
                                $no = 1;
                                foreach ($dataTracer as $data) {
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['nama_alumni']; ?></td>
                                        <td><?= $data['jurusan']; ?></td>
                                        <td><?= $data['tahun_lulus']; ?></td>
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
                                <?php }
                            } else {
                                echo '<tr><td colspan="13" class="text-center">Data tidak tersedia.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->

            </div>
        </div>

    </div>
</div>