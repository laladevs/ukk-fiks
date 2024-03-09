<?php 
include 'koneksi.php';
    $fotoid = $_GET['fotoid'];
    mysqli_query($koneksi, "DELETE FROM foto WHERE fotoid='$fotoid'");
    ?>
    <script>
    window.location.assign('profile.php');
    alert('selamat anda berhasil menghapus data ini');
  </script>
  <?php
?>