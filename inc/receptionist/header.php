<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include('../inc/koneksi.php');
    if (!isset($_SESSION['resepsionis_id'])) {
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Receptionist &mdash; Hotel Bamboo</title>
  <link rel="shortcut icon" href="../assets/img/icon/Bamboo-favicon.png" type="image/x-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/components.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../assets/css/admin_modify.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body>
  <div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg" style='background-color:#a5b636;'></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle mr-1">
                        <?php
                            if(isset($_SESSION['resepsionis_id'])){
                                $nama = $_SESSION['nama_resepsionis'];
                                $nama_split = explode(' ',$nama);
                            }
                        ?>
                        <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $nama_split[0]; ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="ubah-password.php" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Ganti Password
                        </a>
                        <a href="logout.php" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>