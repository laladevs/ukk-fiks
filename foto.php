
<?php
include 'header.php';
include 'koneksi.php';
$userid = $_SESSION['userid'];
   ?>

<div class="container ms-auto">
        <div class="card">
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Namaalbum</th>
                    <th scope="col">deksripsi</th>
                    <th scope="col">tanggal</th>
                    <th scope="col">foto</th>
                    <th scope="col">user</th>
 
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <?php 
                $no = 1;
                $sql1 = mysqli_query($koneksi, "SELECT * FROM foto,user WHERE foto.userid = user.userid");
                foreach ($sql1 as $data) :
                ?>
                <tbody>
                    <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['judulfoto']; ?></td>
                    <td><?= $data['deskripsifoto']; ?></td>
                    <td><?= $data['tanggalunggah']; ?></td>
                    <td><?= $data['userid']; ?></td>
                    <td><img src="img/<?=$data['lokasifile']; ?>" alt="" style="width: 50px;" ></td>
                  <td>

                    <?php 
                    $fotoid = $data['fotoid'];
                   $sql = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid' ");
                    if (mysqli_num_rows($sql) === 1) { ?>
                     
                    <?php } ?> <a href="like.php?fotoid=<?= $data['fotoid']; ?>" type="submit">like :</a>
                   

                    <td>
                        <?php 
                        $suka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' ");
                        echo mysqli_num_rows($suka). 'suka';
                        ?>
                    </td>
                    </td>
                    </tr>
                        <!-- log in -->
                            <div class="modal fade" id="Edit<?= $data['fotoid'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <input type="fotoid" class="form-control rounded-3" id="fotoid" placeholder="kenangan" name="fotoid" value="<?= $data['fotoid'];?>">
                                        <label for="number">fotoid</label>
                                    </div>
                                    <div class="form-floating mb-3 text-dark">
                                        <input type="judulfoto" class="form-control rounded-3" id="judulfoto" placeholder="kenangan" name="judulfoto" value="<?= $data['judulfoto'];?>">
                                        <label for="text">judulfoto</label>
                                    </div>
                                    <div class="form-floating mb-3 text-dark">
                                        <input type="deskripsifoto" class="form-control rounded-3" id="deskripsifoto" placeholder="kenangan" name="deskripsifoto" value="<?= $data['deskripsifoto'];?>">
                                        <label for="text">deskripsifoto</label>
                                    </div>
                                    <div class="mb-3">
                                       <label for="lokasifile" class="form-label">upload</label>
                                       <input class="form-control" type="file" id="lokasifile" name="lokasifile" accept="('png','jpeg','jpg')">
                                    </div>
                                    <select class="form-select" aria-label="Default select example" name="albumid" value="<?= $data['albumid'] ?>">
                                    <option selected>Open this select menu</option>
                                    <option value="<?= $data['albumid'] ?>"><?= $data['albumid'] ?></option>
                                    </select>
                                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-success" type="submit">Edit</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                     </tbody>
                <?php endforeach; ?>
                                                    
                </table>
            </div>
        </div>
    </div>           
 <?php include 'footer.php'; ?>
 