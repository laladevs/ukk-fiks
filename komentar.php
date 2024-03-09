<?php
 include 'koneksi.php';
    $fotoid = $_POST['fotoid'];
    $userid = $_POST['userid'];
    $isikomentar = $_POST['isikomentar'];
    $tanggalkomentar = date("Y-m-d");

    mysqli_query($koneksi, "INSERT INTO `komentarfoto`(fotoid, userid, isikomentar, tanggalkomentar) VALUES('$fotoid','$userid','$isikomentar','$tanggalkomentar')");
   header("location: index.php?fotoid");
?>