<?php
session_start();

include "../../db/db_koneksi.php";
$con = new db_koneksi;

// Cek apakah session 'id' ada
if (!isset($_SESSION['username'])) {
  // Jika tidak ada, arahkan pengguna ke halaman login
  header("Location: ../index.php");
  exit();
}
?>

<?php
$currentYear = (int)date('Y');
$startYear   = $currentYear - 4;
$dataForChart = $con->get_data_alumni();
$stats = [];

for ($y = $startYear; $y <= $currentYear; $y++) {
  $stats[$y] = ['work_0' => 0, 'work_1' => 0];
}

while ($r = $dataForChart->fetch_assoc()) {
  $year = (int)date('Y', strtotime($r['updated_at']));
  if ($year >= $startYear && $year <= $currentYear) {
    $w = (int)$r['work'] === 1 ? 'work_1' : 'work_0';
    $stats[$year][$w]++;
  }
}

ksort($stats);
?>

<script>
// lempar ke JS sebagai variabel global
window.ALUMNI_STATS = <?= json_encode($stats) ?>;
window.ALUMNI_CHART_TITLE = 'Statistik Alumni (5 Tahun Terakhir)';
</script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tracer Study</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.jpg" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
</head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="./assets/js/alumni-chart.js"></script>
<body>

  <!-- ======= Header ======= -->
  <?php
  include "layouts/header.php";
  ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php
  include "layouts/sidebar.php";
  ?>
  <!-- End Sidebar-->

  <main id="main" class="main">
    <section class="section dashboard">
      <div class="row">
        <?php
        error_reporting(0);
        switch ($_GET['menu']) {
          case 'dashboard':
            include "dashboard.php";
            break;

          // user
          case 'data-user':
            include "users/data-user.php";
            break;

          case 'tambah-user':
            include "users/tambah-user.php";
            break;

          case 'edit-user':
            include "users/edit-user.php";
            break;

          // alumni
          case 'data-alumni':
            include "alumni/data-alumni.php";
            break;

          case 'tambah-alumni':
            include "alumni/tambah-alumni.php";
            break;

          case 'edit-alumni':
            include "alumni/edit-alumni.php";
            break;

          case 'detail-alumni':
            include "alumni/detail-alumni.php";
            break;


          // tracer
          case 'laporan-tracer':
            include "laporan/laporan-tracer.php";
            break;

          case 'export-tracer':
            include "laporan/proses/export-tracer.php";
            break;

          // Profile        
          case 'my-profile':
            include "profile/my-profile.php";
            break;

          // Foto Alumni        
          case 'tambah-foto-alumni':
            include "alumni/tambah-foto-alumni.php";
            break;

          //Default        
          default:
            include "dashboard.php";
            break;

        }
        ?>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include "layouts/footer.php";
  ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>