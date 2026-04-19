<div class="card">
    <h5 class="card-title text-center mb-0">INFO LOKER</h5>
    <hr>

    <div class="card-body">
        <h5 class="card-title text-center mb-0">Daftar Lowongan Kerja</h5>
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="input-group">
                <input type="text" class="form-control" id="searchLoker" placeholder="Cari loker...">
            </div>
        </div>

        <div class="alert alert-info">
            <i class="bi bi-info-circle"></i> Info loker ini disediakan oleh sekolah sebagai umpan balik untuk alumni. Silakan cek lowongan kerja yang tersedia.
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Pekerjaan</th>
                        <th>Nama Perusahaan</th>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                        <th>Link</th>
                        <th>Dibuat Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../../../../db/db_koneksi.php";
                    $con = new db_koneksi;
                    $lokers = $con->get_data_loker();
                    $no = 1;
                    
                    if ($lokers->num_rows > 0) {
                        while ($row = $lokers->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['judul_pekerjaan']) ?></td>
                                <td><?= htmlspecialchars($row['nama_perusahaan']) ?></td>
                                <td><?= htmlspecialchars($row['lokasi']) ?></td>
                                <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                                <td>
                                    <?php if (!empty($row['link'])): ?>
                                        <a href="<?= htmlspecialchars($row['link']) ?>" target="_blank" class="btn btn-sm btn-info">
                                            <i class="bi bi-link-45deg"></i> Buka Link
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($row['nama_admin']) ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data loker</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
