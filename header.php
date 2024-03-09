<?php 
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:landing-page.php");
    }
?>

<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head><script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>GALERY</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="./assets/assets/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="./assets/assets/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="./assets/assets/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="./assets/assets/favicons/manifest.json">
    <link rel="mask-icon" href="./assets/assets/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="./assets/assets/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">

    <!-- Custom styles for this template -->
    <link href="./assets/headers.css" rel="stylesheet">
    <style>
      .profil{
        margin : 0px;
        padding: 50px;
      }
    </style>
  </head>
  <body>
<main>
  <div class="b-example-divider"></div>

  

  <div class="b-example-divider"></div>

  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="album.php" class="nav-link px-2 text-white">Album</a></li>
          <li><a href="create.php" class="nav-link px-2 text-white">Upload</a></li>
        </ul>
        <div class="dropdown text-end">
    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="<?= $_SESSION['profile'];?>" alt="mdo" width="32" height="32" class="rounded-circle">
    </a>
    <ul class="dropdown-menu text-small">
    <?php     
      require 'koneksi.php';
      $sql = mysqli_query($koneksi, "SELECT * FROM user");
          $data = mysqli_fetch_array($sql); {

      ?>
      <li><a class="dropdown-item" href="profile.php?userid=<?= $data['userid']; ?>">Profile</a></li>
      <?php } ?>
      <li><a class="dropdown-item" href="logout.php" onclick="return confirm('apakah anda yakin ingin logout');">logout</a></li>
    </ul>
  </div>
      </div>
    </div>
  </header>
  <div class="b-example-divider"></div>
</main>
