<?php
session_start();
// Cek apakah session 'user_id' ada
if (isset($_SESSION['id'])) {
  // Jika ada, arahkan pengguna ke halaman dashboard
  header("Location: dashboard/index.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tracer Study</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.jpg" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">

            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


              <div class="card mb-3">

                <div class="card-body">
                  <div class="pt-4 pb-2 mb-3 text-center ">

                    <span><img src="../assets/img/logo_smk.png" alt="" width="60%"></span>
                    <h6 class="card-title text-center pb-0 fs-4 mb-0">Alumni - Tracer Study Login</h6>
                  </div>


                  <!-- Start Notifikasi -->
                  <?php
                  if (isset($_SESSION['logout'])) {
                    echo '
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-block-helper me-2"></i>
                                ' . $_SESSION['logout'] . '
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                                ';
                    unset($_SESSION['logout']);
                  }
                  if (isset($_SESSION['gagal'])) {
                    echo '
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="mdi mdi-block-helper me-2"></i>
                                ' . $_SESSION['gagal'] . '
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                                ';
                    unset($_SESSION['gagal']);
                  }
                  ?>
                  <!-- End Notifikasi -->

                  <form action="./proses/proses-login.php" method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="yourNisn" class="form-label">NISN</label>
                      <div class="input-group has-validation">
                        <input type="text" name="nisn" class="form-control" id="nisn" placeholder="Masukkan NISN"
                          required>
                        <div class="invalid-feedback">Please enter your NISN!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password"
                        placeholder="Masukkan Password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="remember"
                          checked>
                        <label class="form-check-label" for="remember">Remember me</label>
                      </div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="login" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits col-12 text-center">
                <span>Copyright &copy;
                  <script>
                    document.write(new Date().getFullYear())
                  </script>
                  Arif Wahyudin
                </span>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>