<?php
session_start();
// Cek apakah session 'id' ada
if (!isset($_SESSION['username'])) {
  // Jika tidak ada, arahkan pengguna ke halaman login
  header("Location: ../index.php");
  exit();
}

// cek session sukses untuk menampilkan notifikasi
if (isset($_SESSION['sukses'])) {
  ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_SESSION['sukses'] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <?php
}
unset($_SESSION['sukses']);
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
          <h5 class="card-title">User <span>| Total</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
              <h6><?= $con->total_user() ?></h6>
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