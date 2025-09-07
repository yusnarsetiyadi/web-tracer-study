<?php
session_start();
// Cek apakah session 'id' ada
if (!isset($_SESSION['nisn'])) {
  // Jika tidak ada, arahkan pengguna ke halaman login
  header("Location: ../index.php");
  exit();
}

$dataAlumni = $con->select_alumni($_SESSION['id_alumni']);

// cek session sukses untuk menampilkan notifikasi
if (isset($_SESSION['sukses'])) {
  ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_SESSION['sukses'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php

  if ($dataAlumni["work"] == 0 && $dataAlumni["reason"] != null){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <form action="./proses/proses-update-work.php" method="post">
        <input type="hidden" name="id_alumni" value="<?= $_SESSION['id_alumni'] ?>">

        <label for="reason" class="form-label">Update penyebab kamu belum kerja:</label>
        <textarea class="form-control mb-2" name="reason" id="reason" rows="1" required></textarea>

        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
      </form>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
  }
}
unset($_SESSION['sukses']);

if (isset($_SESSION['res_update'])) {
  ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_SESSION['res_update'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
}
unset($_SESSION['res_update']);

if ($dataAlumni["work"] == 0 && $dataAlumni["reason"] == null){
  ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <form action="./proses/proses-update-work.php" method="post">
      <input type="hidden" name="id_alumni" value="<?= $_SESSION['id_alumni'] ?>">

      <label for="reason" class="form-label">Input penyebab kamu belum kerja:</label>
      <textarea class="form-control mb-2" name="reason" id="reason" rows="1" required></textarea>

      <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
    </form>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
}
?>

<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<!-- Left side columns -->
<div class="col-lg-12">
  <div class="row">

    <!-- Sales Card -->
    <div class="col-xxl-4 col-md-6">
      <div class="card info-card sales-card">
        <div class="card-body">
          <h5 class="card-title">Tracer Saya <span>| Total</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
              <h6><?= $con->total_tracer_saya($id) ?></h6>
            </div>
          </div>
        </div>

      </div>
    </div><!-- End Sales Card -->

    <!-- Revenue Card -->
    <div class="col-xxl-4 col-md-6">
      <div class="card info-card revenue-card">
        <div class="card-body">
          <h5 class="card-title">Alumni <span>| Jumlah</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-clipboard-data"></i>
            </div>
            <div class="ps-3">
              <h6><?= $con->total_alumni() ?></h6>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Revenue Card -->


    <!-- Revenue Card -->
    <div class="col-xxl-4 col-md-6">
      <div class="card info-card customers-card">
        <div class="card-body">
          <h5 class="card-title">Tracer <span>| Jumlah</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
              <h6><?= $con->total_tracer() ?></h6>
            </div>
          </div>
        </div>

      </div>
    </div><!-- End Revenue Card -->


  </div><!-- End Left side columns -->

<h5 class="card-title text-center mb-0">STATISTIK ALUMNI</h5>
<canvas id="alumniChart" style="max-height:400px;"></canvas>
<hr>

<?php 
$dataAlumniBelumKerja = $con->get_data_alumni_no_work();
$totalAlumniBelumKerja = 0;
$with_reasonAlumniBelumKerja = 0;
$alumniDenganReason = [];
while ($row = $dataAlumniBelumKerja->fetch_assoc()) {
    $totalAlumniBelumKerja++;
    if (!empty($row['reason'])) {
        $with_reasonAlumniBelumKerja++;
        $alumniDenganReason[] = [
            'nama' => $row['nama_lengkap'],
            'jurusan' => $row['jurusan'],
            'tahun_lulus' => $row['tahun_lulus'],
            'reason' => htmlspecialchars($row['reason']),
            'updated_at' => $row['updated_at']
        ];
    }
}
?>

<h5 class="card-title mb-0">🔵 Track Record Alumni Belum Bekerja</h5>
<p><?php echo $with_reasonAlumniBelumKerja; ?> dari <?php echo $totalAlumniBelumKerja; ?> alumni memberikan tanggapan</p>

<?php if (!empty($alumniDenganReason)) { ?>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Tahun Lulus</th>
            <th>Alasan Belum Bekerja</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alumniDenganReason as $alumni) { ?>
        <tr>
            <td><?php echo $alumni['nama']; ?></td>
            <td><?php echo $alumni['jurusan']; ?></td>
            <td><?php echo $alumni['tahun_lulus']; ?></td>
            <td><?php echo $alumni['reason']; ?></td>
            <td><?php echo $alumni['updated_at']; ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php } else { ?>
<p><i>Tidak ada tanggapan yang diberikan</i></p>
<?php } ?>

<?php 
$dataAlumniBekerja = $con->get_data_tracer_with_alumni();
$totalAlumniBekerja = 0;
$alumniBekerja = [];
$alumniCurrent = 0;
while ($row = $dataAlumniBekerja->fetch_assoc()) {
    if ($row['id_alumni'] != $alumniCurrent){
      $totalAlumniBekerja++;
      $alumniCurrent = $row['id_alumni'];
    }
    $alumniBekerja[] = [
        'nama' => $row['nama_alumni'],
        'jurusan' => $row['jurusan'],
        'tahun_lulus' => $row['tahun_lulus'],
        'instansi' => $row['nama_instansi'],
        'sektor' => $row['sektor_perusahaan'],
        'waktu_tunggu' => $row['waktu_tunggu_kerja'],
        'mulai_kerja' => date('Y', strtotime($row['created_at']))
    ];
}
?>

<h5 class="card-title mb-0">🟢 Track Record Alumni Sudah Bekerja</h5>
<p>Total Alumni: <?php echo $totalAlumniBekerja; ?></p>

<!-- 🔽 Filter Dropdown -->
<div class="row mb-3">
    <div class="col-md-3">
        <select id="filterSektor" class="form-select">
            <option value="">Filter Sektor Perusahaan</option>
            <?php 
            $sektorList = array_unique(array_column($alumniBekerja, 'sektor'));
            foreach ($sektorList as $sektor) {
                echo "<option value='".htmlspecialchars($sektor)."'>$sektor</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-3">
        <select id="filterWaktu" class="form-select">
            <option value="">Filter Waktu Tunggu Kerja</option>
            <?php 
            $waktuList = array_unique(array_column($alumniBekerja, 'waktu_tunggu'));
            foreach ($waktuList as $waktu) {
                echo "<option value='".htmlspecialchars($waktu)."'>$waktu</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-3">
        <select id="filterMulai" class="form-select">
            <option value="">Filter Tahun Mulai Kerja</option>
            <?php 
            $mulaiList = array_unique(array_column($alumniBekerja, 'mulai_kerja'));
            sort($mulaiList);
            foreach ($mulaiList as $mulai) {
                echo "<option value='".htmlspecialchars($mulai)."'>$mulai</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-md-3 d-flex">
        <button id="clearFilter" class="btn btn-secondary w-100">Clear Filter</button>
    </div>
</div>

<?php if (!empty($alumniBekerja)) { ?>
<table class="table table-bordered table-striped" id="alumniTable">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Tahun Lulus</th>
            <th>Instansi</th>
            <th>Sektor Perusahaan</th>
            <th>Waktu Tunggu Kerja</th>
            <th>Tanggal Mulai Kerja</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alumniBekerja as $alumni) { ?>
        <tr>
            <td><?php echo htmlspecialchars($alumni['nama']); ?></td>
            <td><?php echo htmlspecialchars($alumni['jurusan']); ?></td>
            <td><?php echo htmlspecialchars($alumni['tahun_lulus']); ?></td>
            <td><?php echo htmlspecialchars($alumni['instansi']); ?></td>
            <td><?php echo htmlspecialchars($alumni['sektor']); ?></td>
            <td><?php echo htmlspecialchars($alumni['waktu_tunggu']); ?></td>
            <td><?php echo htmlspecialchars($alumni['mulai_kerja']); ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<!-- 🔽 Counter tampil -->
<p id="countDisplay"><b>Jumlah data ditampilkan: <?php echo count($alumniBekerja); ?></b></p>

<?php } else { ?>
<p><i>Belum ada data alumni yang bekerja</i></p>
<?php } ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const filterSektor = document.getElementById("filterSektor");
    const filterWaktu = document.getElementById("filterWaktu");
    const filterMulai = document.getElementById("filterMulai");
    const clearFilter = document.getElementById("clearFilter");
    const rows = document.querySelectorAll("#alumniTable tbody tr");
    const countDisplay = document.getElementById("countDisplay");

    function applyFilter() {
        const sektorVal = filterSektor.value.toLowerCase();
        const waktuVal = filterWaktu.value.toLowerCase();
        const mulaiVal = filterMulai.value.toLowerCase();

        let visibleCount = 0;

        rows.forEach(row => {
            const sektor = row.cells[4].textContent.toLowerCase();
            const waktu = row.cells[5].textContent.toLowerCase();
            const mulai = row.cells[6].textContent.toLowerCase();

            const match = 
                (sektorVal === "" || sektor.includes(sektorVal)) &&
                (waktuVal === "" || waktu.includes(waktuVal)) &&
                (mulaiVal === "" || mulai.includes(mulaiVal));

            if (match) {
                row.style.display = "";
                visibleCount++;
            } else {
                row.style.display = "none";
            }
        });

        countDisplay.textContent = "Jumlah data ditampilkan: " + visibleCount;
    }

    filterSektor.addEventListener("change", applyFilter);
    filterWaktu.addEventListener("change", applyFilter);
    filterMulai.addEventListener("change", applyFilter);

    // 🔽 Reset filter
    clearFilter.addEventListener("click", function() {
        filterSektor.value = "";
        filterWaktu.value = "";
        filterMulai.value = "";
        applyFilter();
    });
});
</script>
