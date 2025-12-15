      <?php
        $value="manage-room";

        // Header
        include('../inc/admin/header.php');
        // Sidebar
        include('../inc/admin/sidebar.php');

        function rupiah($angka){
          $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
          return $hasil_rupiah;
        }
      ?>
      <!-- Main Content start-->
      <div class="main-content">
        <section class="section">

          <!-- Section Header start-->
          <div class="section-header">
            <h1>Menampilkan Tabel Kamar</h1>
          </div>
          <!-- Section Header end-->

          <div class="section-body">
            <button class="btn btn-utama" style='margin-bottom:30px;'
            data-toggle='modal' data-target='#inputModal'>Tambah Data</button>
            <div class="row">
              <div class="col-12">

                <!-- Table Content start-->
                <div class="card">
                  <div class="card-header">
                    <h4 style='color:#a5b636;'>Tabel Kamar</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="example1">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Kelompok</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql = mysqli_query($con,"SELECT room_id,nama_kamar,
                              lokasi, kelompok, harga, status FROM kamar ORDER BY room_id ASC");
                            $nomor = 1;
                            if($sql){
                              while($record = mysqli_fetch_array($sql)){
                          ?>
                          <tr>
                            <td> <?php echo $nomor ?> </td>
                            <td> <?php echo $record['nama_kamar']; ?> </td>
                            <td> <?php echo $record['lokasi']; ?> </td>
                            <td> <?php echo $record['kelompok']; ?> </td>
                            <td> <?php echo rupiah($record['harga']); ?> </td>
                            <td> <?php echo $record['status']; ?> </td>
                            <td> 
                              <a href="" style='text-decoration:none'
                              data-toggle="modal" 
                              data-target="#viewModal<?php echo $record['room_id'];?>"
                              >detail</a>
                              &emsp;|&emsp;
                              <a href="edit-kamar.php?id=<?php echo $record['room_id'];?>" 
                              style='text-decoration:none'
                              >edit</a>
                              &emsp;|&emsp;
                              <a href="?hapus=<?php echo $record['room_id']; ?>" 
                              onclick ="return confirm('Ingin Menghapus?')" 
                              style='text-decoration:none'>delete</a> 
                            </td>
                          </tr>
                          <?php $nomor++; }}?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Table Content end -->
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- Main Content end -->

      <!--Modal Form Input Data start-->

      <div class="modal fade" tabindex="-1" role="dialog" id="inputModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form action="" method="post" onSubmit="return valid();" enctype="multipart/form-data">
              <div class="modal-header">
                <h3 class="modal-title">Input Data Kamar</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama Kamar</label>
                      <input type="text" class="form-control input-semua" name='nama_kamar' required>
                    </div>
                    <div class="form-group">
                      <label>Lokasi</label>
                      <input type="text" class="form-control input-semua" name='lokasi' required>
                    </div>
                    <div class="form-group">
                      <label>Kelompok</label>
                      <select class="custom-select input-semua" id="inputGroupSelect04" name='kelompok'>
                        <option selected hidden>Pilih Salah satu</option>
                        <option value="Reguler">Reguler</option>
                        <option value="VIP">VIP</option>
                        <option value="VVIP">VVIP</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Fasilitas</label>
                      <textarea class="form-control input-semua" name='fasilitas' required></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Harga (per-malam)</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            Rp
                          </div>
                        </div>
                        <input type="number" class="form-control currency input-semua" name='harga' required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Maksimal Orang Per Kamar</label>
                      <input type="number" class="form-control currency" name='jml_orang' required>
                    </div>
                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="file" class="form-control input-semua" name='gambar' required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-utama" name='submit'>Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!--Modal Form Input Data end-->

      <!--Modal Form View Data start-->

      <?php
        $sql = 'SELECT * FROM kamar';
        $query = mysqli_query($con,$sql);
        if($query){
          while($record = mysqli_fetch_array($query)){
      ?>
      <div class="modal fade" tabindex="-1" role="dialog" id="viewModal<?php echo $record["room_id"];?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style='width:150%;'>
            <div class="modal-header">
              <h3 class="modal-title">Detail Kamar</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>ID Kamar</label>
                    <h5><?php echo $record["room_id"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Nama Kamar</label>
                    <h5><?php echo $record["nama_kamar"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Lokasi</label>
                    <h5><?php echo $record["lokasi"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Kelompok</label>
                    <h5><?php echo $record["kelompok"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Fasilitas</label>
                    <h5>
                      <?php
                        $split = explode("-",$record["fasilitas"]);
                        for($i=1;$i<count($split);$i++){
                          echo '- '.$split[$i].'<br>';
                        }
                      ?>
                    </h5>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <h5><?php echo rupiah($record["harga"]); ?></h5>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Jumlah Maksimal Orang Per Kamar</label>
                    <h5><?php echo $record["jml_orang"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Gambar</label><br>
                    <img src="img/kamar/<?php echo $record['gambar']?>" 
                    alt="Gambar Kamar Hotel" style='width:80%;height:50%;'>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Buat</label><br>
                    <h5><?php echo $record["tanggal_buat"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Update</label><br>
                    <h5>
                    <?php
                      if($record["tanggal_update"]==NULL){
                        echo "Belum Pernah Di-<i>Update</i>";
                      } else {
                        echo $record["tanggal_update"];
                      }
                    ?>
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }} ?>

      <!--Modal Form View Data end-->

      <!-- Footer -->
      <?php 
        include('../inc/admin/footer.php');

        if(isset($_POST['submit'])){

          $nama_kamar = $_POST["nama_kamar"];
          $lokasi = $_POST["lokasi"];
          $kelompok = $_POST["kelompok"];
          $fasilitas = $_POST["fasilitas"];
          $harga = $_POST["harga"];
          $jml_orang = $_POST["jml_orang"];
          $gambar = $_FILES["gambar"]["name"];
          move_uploaded_file($_FILES["gambar"]["tmp_name"],"img/kamar/".$_FILES["gambar"]["name"]);

          $query='INSERT INTO kamar (nama_kamar,lokasi,kelompok,
          fasilitas,harga,jml_orang,gambar) VALUES ("'.$nama_kamar.'",
          "'.$lokasi.'","'.$kelompok.'","'.$fasilitas.'
          ","'.$harga.'","'.$jml_orang.'","'.$gambar.'")';

          $hasil=mysqli_query($con,$query) or die 
          (mysqli_error($con));
      ?>

      <script>
        alert('data sukses ditambahkan');
        window.location='manage-room.php';
      </script>

      <?php 
        }
        if(isset($_GET['hapus'])){
          $id = $_GET['hapus'];
          $query = 'DELETE FROM kamar WHERE room_id='.$id;
          $hasil = mysqli_query($con,$query) or die
          (mysqli_error($con));
      ?>
      <script>
        alert('data berhasil dihapus');
        window.location='manage-room.php';
      </script>
      <?php } ?>