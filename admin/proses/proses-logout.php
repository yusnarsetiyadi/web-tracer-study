<?php
session_start();
session_unset();
session_destroy();

session_start();
$_SESSION['logout'] = 'Berhasil Logout';
header('location: ../index.php');
exit();
?>