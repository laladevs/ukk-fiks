<?php include 'header.php'; ?>

<div class="container py-4">
      <div class="col">
        <div class="row">
        <div class="card">
            <div class="card-body">
               <form action="proses-upload.php" method="post" enctype="multipart/form-data">
                <h2>Tambah album</h2>
               <div class="form-floating mb-3 text-dark">
                    <input type="judulfoto" class="form-control rounded-3" id="judulfoto" placeholder="kenangan" name="judulfoto">
                    <label for="text">judulfoto</label>
                </div>
               <div class="form-floating mb-3 text-dark">
                    <input type="deskripsifoto" class="form-control rounded-3" id="deskripsifoto" placeholder="deskripsifoto" name="deskripsifoto">
                    <label for="text">deskripsifoto</label>
                </div>
                <div class="mb-3">
                <label for="lokasifile" class="form-label">upload</label>
                <input class="form-control" type="file" id="lokasifile" name="lokasifile" accept="('png','jpeg','jpg')">
              </div>
              <select class="form-select" aria-label="Default select example" name="albumid">
              <option selected>Open this select menu</option>
              <?php 
              include 'koneksi.php';
              $sql = mysqli_query($koneksi, "SELECT * FROM album");
             
              while($album = mysqli_fetch_array($sql)){
              ?>
            
              <option value="<?= $album['albumid'] ?>"><?= $album['namaalbum'] ?></option>
              <?php } ?>
            </select>
            <br>
                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-success" type="submit">Tambah</button>
               </form>
            </div>
            </div>
        </div>
      </div>
    </div>
    
<?php include 'footer.php'; ?>