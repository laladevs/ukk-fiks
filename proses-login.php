<?php
session_start();
 include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = mysqli_query($koneksi, "SELECT * FROM `user` WHERE username='$username' AND password='$password'");

    $cek = mysqli_num_rows($login);

    if ($cek == 1) {
        while ($data = mysqli_fetch_array($login)) {
            $_SESSION['userid'] = $data['userid'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['namalengkap'] = $data['namalengkap'];
            $_SESSION['profile'] = $data['profile'];
           
        }?>
        <script>
          window.location.assign('index.php');
          alert('selamat anda berhasil login');
        </script>
        <?php
    }else{
        ?>
        <script>
          window.location.assign('landing-page.php');
          alert('username/password anda salah');
        </script>
        <?php
    }
?>