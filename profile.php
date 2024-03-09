<?php 
    include 'header.php';
    require 'koneksi.php';

    $userid = $_SESSION['userid'];
   
    $sql = mysqli_query($koneksi ,"SELECT * FROM foto WHERE userid='$userid'");
    $cek = mysqli_num_rows($sql);
    if ($cek > 0) {
      ?>
    <div class="profil">
    <img src="<?= $_SESSION['profile']; ?>" alt="" width="150" height="150" class="rounded-circle mx-auto">
    <p><?= $_SESSION['username']; ?></p>
    </div>
     <br>
     <?php
   foreach($sql as $data ):
    ?>
     <div class="card">
      <div class="card-body">
      <a href="image.php?fotoid=<?= $data['fotoid']; ?>"><img src="img/<?= $data['lokasifile']; ?>" alt="gambar"  class="rounded"></a>
      </div>
     </div>
     <?php endforeach ; ?>
      <?php
    }else{?>
      <h1 class="position-absolute top-50 start-50">anda belum memosting apapun</h1>
   <?php  }?>
?>
<?php include 'footer.php'; ?>