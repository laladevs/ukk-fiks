<?php include 'header.php'; ?>
    <div class="container py-4">
      <div class="col">
        <div class="row">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
               <form action="tambah-album.php" method="post">
                <h2>Tambah album</h2>
               <div class="form-floating mb-3 text-dark">
                    <input type="namaalbum" class="form-control rounded-3" id="namaalbum" placeholder="kenangan" name="namaalbum">
                    <label for="text">namaalbum</label>
                </div>
               <div class="form-floating mb-3 text-dark">
                    <input type="deskripsi" class="form-control rounded-3" id="deskripsi" placeholder="deskripsi" name="deskripsi">
                    <label for="text">deskripsi</label>
                </div>
                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-success" type="submit">Tambah</button>
               </form>
            </div>
            </div>
        </div>
      </div>
    </div>
    
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
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <?php 
                include 'koneksi.php';
                $no = 1;
                $sql = mysqli_query($koneksi, "SELECT * FROM album");
                while($data = mysqli_fetch_array($sql)){
                ?>
                <tbody>
                    <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['namaalbum']; ?></td>
                    <td><?= $data['deskripsi']; ?></td>
                    <td><?= $data['tanggaldibuat']; ?></td>
                    <td>
                    <a class="nav-link fw-bold py-1 px-0" data-bs-toggle="modal" data-bs-target="#Edit<?= $data['albumid'] ?>">Edit</a>
                    <a href="hapus-album.php?albumid=<?= $data['albumid'] ?>" onclick="return confirm('Apakah anda yakin ingin menhapus album ini');">Hapus</a>
                    </td>
                    </tr>
                        <!-- log in -->
                            <div class="modal fade" id="Edit<?= $data['albumid'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content rounded-4 shadow">
                                    <div class="modal-header p-5 pb-4 border-bottom-0">
                                        <h1 class="fw-bold mb-0 fs-2 text-align-center text-dark">Sign up for free</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-5 pt-0">
                                    <form action="edit-album.php" method="post">
                                        <h2>Edit album</h2>
                                    <div class="form-floating mb-3 text-dark">
                                        <input type="albumid" class="form-control rounded-3" id="albumid" placeholder="kenangan" name="albumid" value="<?= $data['albumid'];?>">
                                        <label for="number">namaalbum</label>
                                    </div>
                                    <div class="form-floating mb-3 text-dark">
                                        <input type="namaalbum" class="form-control rounded-3" id="namaalbum" placeholder="kenangan" name="namaalbum" value="<?= $data['namaalbum'];?>">
                                        <label for="text">namaalbum</label>
                                    </div>
                                    <div class="form-floating mb-3 text-dark">
                                        <input type="deskripsi" class="form-control rounded-3" id="deskripsi" placeholder="deskripsi" name="deskripsi" value="<?= $data['deskripsi'];?>">
                                        <label for="text">deskripsi</label>
                                    </div>
                                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-success" type="submit">Edit</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                </tbody>
                <?php } ?>
                </table>
            </div>
        </div>
    </div>
  
<?php include 'footer.php'; ?>