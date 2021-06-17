<?php
session_start();
//mengatasi jika user langsung masuk menggunakan link, tanpa login
if(empty($_SESSION['username']))
{
  echo "<script>
      alert('Maaf, untuk mengakses halaman ini, silahkan Login terlebih dahulu..!!');
      document.location='index.php';
      </script>";
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <title>PENDATAAN BLT</title>
  </head>
  <body>
    <!-- Awal Nav / Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="?"><img src="assets/sby.png" width="50" style="margin-right: 10px">Pendataan BLT 2021</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="?">Beranda <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Input</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="?halaman=data_pekerjaan">Data Pekerjaan</a>
                  <a class="dropdown-item" href="?halaman=gol_pendapatan">Gol Pendapatan</a>
                  <a class="dropdown-item" href="?halaman=input_data_warga">Data Warga</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?halaman=data_warga">Penerima BLT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?halaman=keluar">Keluar</a>
              </li>
            </ul>
          </div>
      </div>
      
    </nav>
    <!-- Akhir Nav/Menu -->
    <!-- Awal Container -->
    <div class="container">