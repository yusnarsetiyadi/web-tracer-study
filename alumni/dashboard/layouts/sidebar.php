<?php
$menu = $_GET['menu'];

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
      <a class="nav-link <?php echo ($menu !== 'data-tracer' && $menu !== 'tambah-tracer' && $menu !== 'edit-tracer') ? 'collapsed' : ''; ?>"
        href="?menu=data-tracer">
        <i class="bi bi-building"></i>
        <span>Tracer Study</span>
      </a>
    </li><!-- End tracers Page Nav -->


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