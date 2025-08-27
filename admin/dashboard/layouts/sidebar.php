<?php
$menu = $_GET['menu'];

if ($_SESSION['level'] == 'admin') {
  ?>
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Menu</li>
      <li class="nav-item">
        <a class="nav-link <?php echo $menu !== 'dashboard' ? 'collapsed' : ''; ?>" href="?menu=dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- Start Setting - Administrator -->
      <li class="nav-heading">Setting</li>

      <li class="nav-item">
        <a class="nav-link <?php echo ($menu !== 'data-user' && $menu !== 'tambah-user' && $menu !== 'edit-user') ? 'collapsed' : ''; ?>"
          href="?menu=data-user">
          <i class="bi bi-person"></i>
          <span>Kelola User</span>
        </a>
      </li><!-- End Users Page Nav -->


      <li class="nav-heading">Logout</li>
      <li class="nav-item">
        <a onclick="return confirm('Apakah anda yakin akan Logout?')" class="nav-link collapsed"
          href="../proses/proses-logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End logout Nav -->
      <!-- End Setting - Administrator -->
    </ul>
  </aside>
  <?php
} elseif ($_SESSION['level'] == 'operator') {
  ?>
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-heading">Menu</li>
      <li class="nav-item">
        <a class="nav-link <?php echo $menu !== 'dashboard' ? 'collapsed' : ''; ?>" href="?menu=dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- Start Alumni -->
      <li class="nav-heading">Alumni</li>

      <li class="nav-item">
        <a class="nav-link <?php echo ($menu !== 'data-alumni' && $menu !== 'tambah-alumni' && $menu !== 'edit-alumni') ? 'collapsed' : ''; ?>"
          href="?menu=data-alumni">
          <i class="bi bi-person"></i>
          <span>Kelola Alumni</span>
        </a>
      </li><!-- End Alumni Page Nav -->

      <!-- Start tracer -->
      <li class="nav-heading">Stracer Study</li>

      <li class="nav-item">
        <a class="nav-link <?php echo ($menu !== 'laporan-tracer') ? 'collapsed' : ''; ?>" href="?menu=laporan-tracer">
          <i class="bi bi-person"></i>
          <span>Laporan Tracer Study</span>
        </a>
      </li><!-- End Alumni Page Nav -->
      <li class="nav-heading">Logout</li>
      </li>
      <li class="nav-item">
        <a onclick="return confirm('Apakah anda yakin akan Logout?')" class="nav-link collapsed"
          href="../proses/proses-logout.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End logout Nav -->
      <!-- End Setting - Administrator -->
    </ul>
  </aside>
  <?php
}
?>