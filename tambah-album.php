<?php
session_start();
include 'koneksi.php';

    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggaldibuat = date("Y-m-d");
    $userid = $_SESSION['userid'];
    $sql = mysqli_query($koneksi, "INSERT INTO `album`(namaalbum, deskripsi, tanggaldibuat, userid) VALUES('$namaalbum','$deskripsi','$tanggaldibuat','$userid')");
    if ($sql) {
      ?>
      <script>
        window.location.assign('album.php');
        alert('selamat anda berhasil menambahkan album');
      </script>
      <?php
    }else{
        ?>
      <script>
        window.location.assign('album.php');
        alert('Anda Gagal menambahkan album');
      </script>
      <?php
    }

?>