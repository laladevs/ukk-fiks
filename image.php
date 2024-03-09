<?php 
include 'header.php';
        ?>  
        <div class="container py-4">
            <?php
            $fotoid = $_GET['fotoid'];
            include 'koneksi.php';
            $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
           while ($foto = mysqli_fetch_array($sql)) {
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
                        <span class="fs-4" style="padding-right: 40px;"><h4><?= $_SESSION['username'] ?></h4></span>
                                </a><p class="card-text"><small class="text-body-secondary"></small><?= $foto['tanggalunggah'] ?></p></header>
                                </div>
                        
                                <a class="nav-link fw-bold py-1 px-0" data-bs-toggle="modal" data-bs-target="#Edit<?= $foto['fotoid'] ?>">Edit</a>
                                <a href="hapus-foto.php?fotoid=<?= $foto['fotoid'] ?>" onclick="return confirm('Apakah anda yakin ingin menhapus album ini');">Hapus</a>
                    </div>
                    </div>
                </div>
            </div>     
            <div class="modal fade" id="Edit<?=$foto['fotoid'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content rounded-4 shadow">
                                    <div class="modal-header p-5 pb-4 border-bottom-0">
                                        <h1 class="fw-bold mb-0 fs-2 text-align-center text-dark">Sign up for free</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-5 pt-0">
                                    <form action="edit-foto.php" method="post" enctype="multipart/form-data">
                                        <h2>Edit album</h2>
                                    <div class="form-floating mb-3 text-dark">
                                        <input type="fotoid" class="form-control rounded-3" id="fotoid" placeholder="kenangan" name="fotoid" value="<?=$foto['fotoid'];?>">
                                        <label for="number">fotoid</label>
                                    </div>
                                    <div class="form-floating mb-3 text-dark">
                                        <input type="judulfoto" class="form-control rounded-3" id="judulfoto" placeholder="kenangan" name="judulfoto" value="<?=$foto['judulfoto'];?>">
                                        <label for="text">judulfoto</label>
                                    </div>
                                    <div class="form-floating mb-3 text-dark">
                                        <input type="deskripsifoto" class="form-control rounded-3" id="deskripsifoto" placeholder="kenangan" name="deskripsifoto" value="<?=$foto['deskripsifoto'];?>">
                                        <label for="text">deskripsifoto</label>
                                    </div>
                                    <div class="mb-3">
                                       <label for="lokasifile" class="form-label">upload</label>
                                       <input class="form-control" type="file" id="lokasifile" name="lokasifile" accept="('png','jpeg','jpg')">
                                    </div>
                                    <select class="form-select" aria-label="Default select example" name="albumid" value="<?=$foto['albumid'] ?>">
                                    <option selected>Open this select menu</option>
                                    <option value="<?=$foto['albumid'] ?>"><?= $foto['albumid'] ?></option>
                                    </select>
                                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-success" type="submit">Edit</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
        <?php } ?>
        </div>
<?php include 'footer.php';?>