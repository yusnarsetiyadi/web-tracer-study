<?php
$id = $_SESSION['id_alumni'];
$data = $con->select_alumni($id);
?>
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="index.php" class="logo d-flex align-items-center">
      <img src="../../assets/img/logo.png" alt="">
      <span><img src="../../assets/img/logo_header.png" alt="" width="100%"> </span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <?php
          if ($_SESSION['foto_alumni'] == null) {
            echo '

                        <img src="../../admin/dashboard/alumni/foto/default.png" alt="Foto-Profile" class="rounded-circle">
                        <span class="ms-1 d-none d-md-inline-block">
                            ' . ucfirst($_SESSION['nama_lengkap']) . '<i class="mdi mdi-chevron-down"></i>
                        </span>';

          } else {
            echo '

                      <img src="../../admin/dashboard/alumni/foto/' . $data['foto_alumni'] . '" alt="Foto-Profile" class="rounded-circle">
                      <span class="ms-1 d-none d-md-inline-block">
                          ' . ucfirst($_SESSION['nama_lengkap']) . '<i class="mdi mdi-chevron-down"></i>
                      </span>';
          }
          ?>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?php echo ucfirst($_SESSION['nama_lengkap']); ?></h6>
            <span><?php echo ucfirst($_SESSION['nisn']); ?> - <?php echo ucfirst($_SESSION['jurusan']); ?></span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="?menu=my-profile">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a onclick="return confirm('Apakah anda yakin akan Logout?')"
              class="dropdown-item d-flex align-items-center" href="../proses/proses-logout.php">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header>