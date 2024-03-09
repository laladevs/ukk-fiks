<?php 
session_start();
include 'koneksi.php';

    $userid = $_SESSION['userid'];
    $fotoid = $_GET['fotoid'];
    $tanggallike = date("Y-m-d");
    $cek = mysqli_query($koneksi, "SELECT * FROM likefoto where fotoid='$fotoid' AND userid='$userid'");

    if (mysqli_num_rows($cek) == 1) {
        while($row = mysqli_fetch_array($cek)){
            $likeid = $row['likeid'];
            mysqli_query($koneksi, "DELETE FROM likefoto WHERE likeid='$likeid'");
        }
       
     header("location:index.php");
    }else{
       
        mysqli_query($koneksi, "INSERT INTO likefoto(userid, fotoid, tanggallike) VALUES('$userid', '$fotoid', '$tanggallike') ");
        header("location:index.php");
    }
?>                                                                                                          