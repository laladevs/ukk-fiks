<?php 
  session_start();
  include 'koneksi.php';

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
  mysqli_query($koneksi, "INSERT INTO foto VALUES(NULL, '$judulfoto','$deskripsifoto','$tanggalunggah','$foto','$albumid','$userid')");
  ?>
  <script>
    window.location.assign('create.php');
    alert('foto berhasil ditambahkan');
  </script>
  <?php
  if(!$upload){
    print_r($_FILES['lokasifile']['error']);
  }
  /*try{
    $sql = mysqli_query ($koneksi, "INSERT INTO foto(judulfoto, deskripsifoto, tanggalunggah, lokasifile, albumid, userid) VALUES('$judulfoto','$deskripsifoto','$tanggalunggah','$foto','$albumid','$userid')");
    if ($koneksi->query($sql) == true) {
      ?>
      <script>
        window.location.assign('create.php');
        alert('foto berhasil ditambahkan');
      </script>
      <?php
    }else{
        throw new exception("eror:" .$sql. "<br>" .$koneksi->error);
    }
  }catch(Exception $koneksi){
    echo $koneksi->getMessage();
  }*/
?>