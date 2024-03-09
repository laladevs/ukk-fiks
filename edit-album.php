<?php
session_start();
include 'koneksi.php';

    $albumid = $_POST['albumid'];
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $userid = $_SESSION['userid'];
    $sql = mysqli_query($koneksi, "UPDATE `album` SET `namaalbum`='$namaalbum',`deskripsi`='$deskripsi',`userid`='$userid' WHERE `albumid`='$albumid'");
    if ($sql) {
      ?>
      <script>
        window.location.assign('album.php');
        alert('selamat anda berhasil mengedit album');
      </script>
      <?php
    }else{
        ?>
      <script>
        window.location.assign('album.php');
        alert('Anda Gagal mengedit album');
      </script>
      <?php
    }

?>