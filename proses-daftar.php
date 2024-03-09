<?php
include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $namalengkap = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $profile = 'kucing.jpg';
    $sql = mysqli_query($koneksi, "INSERT INTO `user`(username, password, email, namalengkap, alamat, profile) VALUES('$username','$password','$email','$namalengkap','$alamat','$profile')");
    if ($sql) {
      ?>
      <script>
        window.location.assign('landing-page.php');
        alert('selamat anda berhasil daftar');
      </script>
      <?php
    }else{
        ?>
      <script>
        window.location.assign('landing-page.php');
        alert('Anda Gagal Daftar');
      </script>
      <?php
    }

?>