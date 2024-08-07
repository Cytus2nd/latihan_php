<?php 
    include 'config/app.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-primary">
  <div class="container">
    <a class="navbar-brand text-light fw-bold" href="">CRUD PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">

          <?php if($_SESSION['level'] == 1 OR $_SESSION['level'] == 2) : ?>
          <li class="nav-item">
            <a class="nav-link text-light" href="index">Barang</a>
          </li>
          <?php endif; ?>
          
          <?php if($_SESSION['level'] == 1 OR $_SESSION['level'] == 3) : ?>
          <li class="nav-item">
            <a class="nav-link text-light" href="mahasiswa">Mahasiswa</a>
          </li>
          <?php endif; ?>


          <li class="nav-item">
            <a class="nav-link text-light" href="crud-modal">Akun</a>
          </li>
        </ul>
    </div>

    <div>
      <a class="navbar-brand text-light">Hai, <span class="fw-bold"><?= $_SESSION['nama']; ?> !</span></a>
      <a href="logout.php" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin ingin Logout?')"><i class="fas fa-sign-out-alt"></i></a>
    </div>
  </div>
</nav>