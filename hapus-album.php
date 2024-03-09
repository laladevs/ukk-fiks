<?php 
    include 'koneksi.php';
    $albumid = $_GET['albumid'];

    $sql = mysqli_query($koneksi, "DELETE FROM album WHERE albumid='$albumid'");
    if ($sql) {
        ?>
        <script>
        window.location.assign('album.php');
        alert('selamat anda berhasil men ghapus album ini');
      </script>
      <?php
    }else{
        ?>
        <script>
        window.location.assign('album.php');
        alert('album anda gagal dihapus');
      </script>
      <?php
    }
?>