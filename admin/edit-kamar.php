    <?php
        $value="manage-room";

        // Header
        include('../inc/admin/header.php');
        // Sidebar
        include('../inc/admin/sidebar.php');

        $id = intval($_GET['id']);
    ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Update Kamar</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php
                        $update = 'SELECT * FROM kamar WHERE kamar.room_id='.$id;
                        $hasil = mysqli_query($con,$update);
                        if($hasil){
                            while($record=mysqli_fetch_array($hasil)){
                    ?>
                    <form action="" method="post" onSubmit="return valid();" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama Kamar</label>
                                    <input type="text" name="nama_kamar" class="form-control input-semua" 
                                    value='<?php echo $record['nama_kamar']; ?>' required>
                                </div>
                                <div class="form-group">
                                    <label for="">Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control input-semua"  
                                    value='<?php echo $record['lokasi']; ?>' required>
                                </div>
                                <div class="form-group">
                                    <label for="">Kelompok</label>
                                    <select class="custom-select input-semua" id="inputGroupSelect04" name='kelompok'>
                                        <option selected value = '<?php echo $record['kelompok']; ?>' hidden><?php echo $record['kelompok']; ?></option>
                                        <option value="Reguler">Reguler</option>
                                        <option value="VIP">VIP</option>
                                        <option value="VVIP">VVIP</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Fasilitas</label>
                                    <textarea class="form-control input-semua" name='fasilitas' style='height:30vh !important;' required>   
                                        <?php
                                            $split = explode("-",$record["fasilitas"]);
                                            for($i=1;$i<count($split);$i++){
                                                echo '- '.$split[$i];
                                            }
                                        ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="number" class="form-control currency input-semua" 
                                        name='harga' value='<?php echo $record['harga']; ?>' required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah Orang</label>
                                    <input type="number" class="form-control currency input-semua" name='jml_orang' 
                                    value='<?php echo $record['jml_orang']; ?>' required>
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <br><img src="img/kamar/<?php echo $record['gambar']; ?>" 
                                    width="300" height="200" style="border:solid 1px #000">
                                    <br><br>
                                    <p>Gambar ini akan digantikan oleh: </p>
                                    <input type="file" class="form-control input-semua" name='gambar' required>
                                </div>
                                <button Type="submit" name="update" class="btn btn-utama mt-4">Update</button>
                                <button Type="reset" class="btn btn-danger mt-4">Reset</button>
                            </div>    
                        </div>
                    </form>
                    <?php } }?>
                </div>
            </div>
        </section>
    </div>
    <?php 
        include('../inc/admin/footer.php'); 

        if(isset($_POST['update'])){

            $nama_kamar = $_POST["nama_kamar"];
            $lokasi = $_POST["lokasi"];
            $kelompok = $_POST["kelompok"];
            $fasilitas = $_POST["fasilitas"];
            $harga = $_POST["harga"];
            $jml_orang = $_POST["jml_orang"];
            $gambar = $_FILES['gambar']['name'];
            move_uploaded_file($_FILES["gambar"]["tmp_name"],"img/kamar/".$_FILES["gambar"]["name"]);
  
            $update = mysqli_query($con,"UPDATE kamar SET nama_kamar='".$nama_kamar."',lokasi='".$lokasi.
            "', kelompok='".$kelompok."',fasilitas='".$fasilitas."',harga='".$harga."',jml_orang='".$jml_orang."'
            ,gambar='".$gambar."'WHERE room_id=".$id) or die
            (mysqli_error($con));
  
            if($update){
    ?>
    <script>
        alert("Berhasil di update!");
        window.location = "manage-room.php";
    </script>
    <?php  
            } else{
    ?>
    <script>
        alert("Gagal di update!");
        window.location = "manage-room.php";
    </script>
    <?php
            }
          }
    ?>