<?php 
include 'header.php';
        ?>  
        <div class="container py-4">
            <?php
            $fotoid = $_GET['fotoid'];
            include 'koneksi.php';
            $pun = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
           while ($foto = mysqli_fetch_array($pun)) {
          
                ?>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="img/<?=$foto['lokasifile']; ?>" class="img-fluid rounded-start" alt="gambar"  >
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                    <div class="container">
                    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                        <img src="<?= $_SESSION['profile'];?>" alt="mdo" width="32" height="32 margin: 20px; padding: 40px;" class="rounded-circle">
                        <span class="fs-4" style="padding-right: 40px;"> diunggah oleh user :<h4><?= $foto['userid'] ?></h4></span>
                                </a><p class="card-text"><small class="text-body-secondary"></small><?= $foto['tanggalunggah'] ?></p></header>
                                </div>
                                
                        <h6 class="card-title"><?= $foto['judulfoto'] ?></h6>
                        <h6 class="card-title"><?= $foto['deskripsifoto'] ?></h6>
                        <form action="komentar.php" method="post">
                        <?php 
                        include 'koneksi.php';
                        $userid = $_SESSION['userid'];
                        $sql = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid' ");
                        
                        ?>
                        <div class="form-floating mb-3 text-dark">
                        <input type="hidden" class="form-control rounded-3" id="userid" placeholder="userid" name="userid" value="<?= $foto['userid'] ?>">
                        <label for="number">userid</label>
                        <div class="form-floating mb-3 text-dark">
                        <input type="hidden" class="form-control rounded-3" id="fotoid" placeholder="fotoid" name="fotoid" value="<?= $foto['fotoid'] ?>">
                        <label for="number">fotoid</label>
                        <input type="text" class="form-control rounded-3" id="isikomentar" placeholder="isikomentar" name="isikomentar">
                        <label for="text">komentar sebagai <?= $_SESSION['username']; ?></label>
                       <br>
                        <button type="submit" class="btn btn-primary mb-3"><i class="bi bi-send"></i></button>
                       
                        </form>
                        <?php  if (mysqli_num_rows($sql) === 1) { ?>
                     
                     <?php } ?> <a href="like.php?fotoid=<?= $foto['fotoid']; ?>" type="submit"><i class="bi bi-heart"></i></a>
                     <a href="img/<?= $foto['lokasifile'] ?>" download><i class="bi bi-box-arrow-down"></i></a>
                        <?php } ?> 
                        
                        <br>
                    </div>
                    <?php 
                        $suka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' ");
                        echo mysqli_num_rows($suka). 'suka';
                        ?>
                    </div>
                </div>
            </div>     
          
<?php include 'footer.php';?>