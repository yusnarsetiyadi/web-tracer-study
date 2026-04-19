<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Laporan Data Tracer</h4>

                <?php
                // Notifikasi
                if (isset($_SESSION['sukses'])) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        ' . $_SESSION['sukses'] . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    unset($_SESSION['sukses']);
                }

                if (isset($_SESSION['gagal'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ' . $_SESSION['gagal'] . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                <th>Apakah Bekerja?</th>
                                <th>Gaji</th>
                                <th>Waktu Tunggu</th>
                                <th>Instansi Pertama</th>
                                <th>Gaji Pertama</th>
                                <th>Usaha Mandiri?</th>
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
                                        <td><?= $no++ ?></td>
                                        <td><?= htmlspecialchars($data['nama_alumni']) ?></td>
                                        <td><?= htmlspecialchars($data['jurusan']) ?></td>
                                        <td><?= htmlspecialchars($data['tahun_lulus']) ?></td>
                                        <td><?= htmlspecialchars($data['nama_instansi']) ?></td>
                                        <td><?= htmlspecialchars($data['alamat_instansi']) ?></td>
                                        <td><?= htmlspecialchars($data['sedang_bekerja']) ?></td>
                                        <td><?= htmlspecialchars($data['nilai_gaji']) ?></td>
                                        <td><?= htmlspecialchars($data['waktu_tunggu_kerja']) ?></td>
                                        <td><?= htmlspecialchars($data['instansi_pertama']) ?></td>
                                        <td><?= htmlspecialchars($data['gaji_pertama_manual']) ?></td>
                                        <td><?= htmlspecialchars($data['usaha_mandiri']) ?></td>
                                        <td><?= htmlspecialchars($data['created_at']) ?></td>
                                        <td><?= htmlspecialchars($data['updated_at']) ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="17" class="text-center">Data tidak tersedia.</td></tr>';
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