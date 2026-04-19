<div class="card">
    <h5 class="card-title text-center mb-0">INFO LOKER</h5>
    <hr>

    <div class="card-body">
        <h5 class="card-title text-center mb-0">Daftar Lowongan Kerja</h5>
        
        <div class="d-flex mb-3 gap-2">
            <div class="flex-grow-1">
                <div class="input-group">
                    <span class="input-group-text bg-white">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" 
                        class="form-control" 
                        id="searchLoker" 
                        placeholder="Cari loker...">
                </div>
            </div>
            <a href="?menu=tambah-loker" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Loker
            </a>
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
                        <th>Aksi</th>
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
                                <td>
                                    <a href='?menu=edit-loker&id=<?= $row['id_loker'] ?>' class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a onclick="return confirm('Apakah Anda yakin akan menghapus loker ini?')"
                                        href="info-loker/proses/proses-hapus-loker.php?id_loker=<?= $row['id_loker'] ?>"
                                        class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9" class="text-center">Belum ada data loker</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
