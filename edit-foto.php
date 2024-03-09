<?php 
  session_start();
  include 'koneksi.php';

  $fotoid = $_POST['fotoid'];
  $judulfoto = $_POST['judulfoto'];
  $deskripsifoto = $_POST['deskripsifoto'];
  $tanggalunggah = date("Y-m-d");
  $albumid = $_POST['albumid'];
  $userid = $_SESSION['userid'];

  $rand = rand();
  $ekstensi = array('png','jpeg','jpg');
  $filename = $_FILES['lokasifile']['name'];
  $ukuran = $_FILES['lokasifile']['size'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  $foto = $rand.'_'.$filename;
  $upload = move_uploaded_file($_FILES['lokasifile']['tmp_name'],'img/'.$rand.'_'.$filename);
  mysqli_query($koneksi, "UPDATE `foto` SET judulfoto='$judulfoto',deskripsifoto='$deskripsifoto',tanggalunggah='$tanggalunggah',lokasifile='$foto',albumid='$albumid',userid='$userid' WHERE fotoid='$fotoid'");
  ?>
  <script>
    window.location.assign('profile.php');
    alert('foto berhasil ditambahkan');
  </script>
  <?php
  if(!$upload){
    print_r($_FILES['lokasifile']['error']);
  }
  ?>