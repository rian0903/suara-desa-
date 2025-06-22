<?php
session_start();
$page = $_GET['page'] ?? 'splash';
include 'partials/head.php';
include 'partials/header.php';
switch ($page) {
  case 'splash': include 'pages/splash.php'; break;
  case 'welcome': include 'pages/welcome.php'; break;
  case 'login-qr': include 'pages/login-qr.php'; break;
  case 'dashboard': include 'pages/dashboard.php'; break;
  case 'confirm': include 'pages/confirm.php'; break;
  case 'success': include 'pages/success.php'; break;
  case 'dashboard-admin':
    if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
      include 'pages/dashboard-admin.php';
    } else {
      header("Location: login-admin.php"); exit;
    }
    break;
  default:
    echo "<div style='padding:30px'>404 - Halaman tidak ditemukan</div>";
    break;
}
include 'partials/footer.php';