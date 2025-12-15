<?php 
  include('./inc/customer/header.php');
  if (!isset($_SESSION['user_id'])) {
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
  }
  function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
  }
?>

<style>
  .edit{
    height:200px;
  }
  .page-heading h1{
    margin-top:-220px;
  }
  .container-tab{
    border:#eeeeee 1px solid;
    width:972px;
    margin-left:50px;
  }
  .tab{
    background-color:#eeeeee;
    width:972px;
    height:60px;
    position:relative;
    right:15px;
  }
  .nav-tabs>li>a:hover{
    border-color: #a5b636;
    color:white;
  }
  .nav-tabs > li a{
    background: #eeeeee none repeat scroll 0 0;
    color:#555;
    height:60px;
    padding-top:20px;
    width:200px;
  }
  .tab-content{
    margin:30px;
  }
  .table>thead>tr>th,.table>tbody>tr>td,.table>tbody>tr>th{
    border:0;
  }
  .head{
    font-weight:bold;
  }
  .actions{
    position:relative;
    text-align:right;
    /* left:680px; */
  }
  .tutup{
    border-radius:50%;
    width:5vh;
    height:5vh;
    margin-left:60%;
    background: #000000 none repeat scroll 0 0;
    color: #ffffff;
    border-color:#000;
    font-size:14pt;
  }
  .input-semua:focus{
    background: #eeeeee none repeat scroll 0 0;
    color: #000;
  }
</style>
<script type="text/javascript">
  function valid(){
    if(document.chngpwd.password.value != document.chngpwd.conf_password.value){
      alert("Password baru dan konfirmasi password salah!!");
      document.chngpwd.confirmpassword.focus();
      return false;
    }
    return true;
  }
</script>

<!--Page Header-->
<section id='page-title-area' class="page-header edit" style='margin-top:80px;'>
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Dashboard Profile</h1>
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> 
        <i class="fas fa-user" style='font-size:50pt'></i>
      </div>
      <div class="dealer_info" style='position:relative;right:100px;'>
        <h4>
          <?php
            $query="SELECT nama_pengguna FROM pelanggan WHERE user_id=".$_SESSION['user_id'];
            $hasil=mysqli_query($con,$query);
            if(mysqli_num_rows($hasil)>0){
              while($res=mysqli_fetch_array($hasil)){
                echo $res['nama_pengguna'];
              }
            }
          ?>
        </h4>
      </div>
      <marquee scrolldelay="200">Ketika sudah melakukan pemesanan harap melakukan pembayaran dengan mengirimkan ke nomor rekening yang tertera di order status, setelah itu lakukan konfirmasi.</marquee>
    </div>
  
    <div class="row">
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <div class="container container-tab">
            <?php
              $query = "SELECT user_id,nama_pengguna,email,phone FROM pelanggan WHERE user_id=".$_SESSION['user_id'];
              $hasil = mysqli_query($con,$query);
              if($hasil){
                while($res = mysqli_fetch_array($hasil)){
            ?>
            <ul class="nav nav-tabs tab">
              <li class="active"><a href="#profile" data-toggle='tab'>Profil</a></li>
              <li><a href="#order" data-toggle='tab'>Order Status</a></li>
              <li><a href="#history" data-toggle='tab'>Riwayat</a></li>
            </ul>
            <div class="tab-content">
              <div id="profile" class='tab-pane fade in active tab-content'>
                <table class='table' style='width:300px;'>
                  <tr>
                    <td class='head'>Email</td>
                    <td>: <?php echo $res['email']; ?> </td>
                  </tr>
                  <tr>
                    <td class="head">No Telepon</td>
                    <td>: +62 <?php echo $res['phone']; ?></td>
                  </tr>
                </table>
                <div class="actions">
                <a href="" style='text-decoration:none'
                  data-toggle="modal" 
                  data-target="#MyModal<?php echo $res['user_id'] ?>"
                  >Ubah Password</a>
                | <a href="" data-toggle="modal" data-target="#ChangeProfile<?php echo $res['user_id'] ?>">Ubah Profile</a>
                </div>
              </div>
              
              <!-- MODAL UPDATE PASSWORD-->
              <div class="modal fade" style='margin-left:-50vh;'
              tabindex="-1" role="dialog" id="MyModal<?php echo $res['user_id'] ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content" style='width:150%;'>
                    <div class="modal-header">
                      <h3 class="modal-title">Ubah Password</h3>
                      <button type="button" class="tutup" 
                        style='margin-left:50%!important;'
                      data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"
                        >&times;</span>
                      </button>
                    </div>
                    <form name='chngpwd' action="" method="post" role="form" onSubmit="return valid();">
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-12">
                            <div class="form-group">
                              <label>Password Sebelumnya</label>
                              <input type="password" name="old_password"
                              class=' input-semua form-control' id="old_password">
                            </div>
                            <div class="form-group">
                              <label>Password Baru</label>
                              <input type="password" name="password" class='input-semua form-control' id="password">
                            </div>
                            <div class="form-group">
                              <label>Konfirmasi Password</label>
                              <input type="password" name="conf_password" class='input-semua form-control' id="conf_password">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button Type="submit" name="s_pass" class="btn btn-primary ">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.END modal UPDATE PASSWORD -->
              <!-- MODAL UPDATE PROFILE-->
              <div class="modal fade" id="ChangeProfile<?php echo $res['user_id']; ?>">
                  <div class="modal-dialog" >
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Update Profile</h4>
                          <button type="button" class="tutup"
                          style='margin-left:50%!important;'
                          data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="" role="form" method="post" onSubmit="return valid();">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="">Nama </label>
                              <input type="text" name="nama" value="<?php echo $res['nama_pengguna']; ?>" class="input-semua form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Email</label>
                              <input type="text" name="email" value="<?php echo $res['email']; ?>" class="input-semua form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="">Telepon</label>
                              <input type="number" name="telepon" value="<?php echo $res['phone']; ?>" class="input-semua form-control" required>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button Type="submit" name="update_profile" class="btn btn-primary ">Save</button>
                          </div>
                        </form>
                      </div>
                  <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
              </div>
              <?php }} ?>
              <!-- /.END modal UPDATE -->
              <div id="order" class='tab-pane fade tab-content'>
                <h4>
                  <span>Kirim Ke Nomor Rekening:</span>
                  9384937375
                </h4>
                <table class="table table-striped" style='width:140vh;margin-left:-50px;'>
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Kamar</th>
                      <th scope="col">Total Harga</th>
                      <th scope="col">Tanggal Inap</th>
                      <th scope="col">Tanggal Kembali</th>
                      <th scope="col">Status</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $nomor=1;
                      $query="SELECT * FROM invoice, kamar, pelanggan WHERE invoice.room_id=kamar.room_id
                      AND invoice.user_id=pelanggan.user_id AND invoice.user_id=".$_SESSION['user_id'];
                      $hasil=mysqli_query($con,$query);
                      if(mysqli_num_rows($hasil)>0){
                        while($res=mysqli_fetch_assoc($hasil)){
                    ?>
                    <tr>
                      <th><?php echo $nomor; ?></th>
                      <td><?php echo $res['nama_kamar']; ?></td>
                      <td><?php echo rupiah($res['total_harga']); ?></td>
                      <td><?php echo $res['tanggal_inap']; ?></td>
                      <td><?php echo $res['tanggal_pergi']; ?></td>
                      <td>
                        <?php 
                          if($res['status_inv']==''){
                            echo 'Belum Membayar';
                          } else {
                            echo $res['status_inv'];
                          }
                        ?>
                      </td>
                      <td>
                        <a href="" 
                        data-toggle='modal'
                        data-target='#viewModal<?php echo $res['inv_id']; ?>'
                        > detail</a>
                        <?php 
                          if($res['status_inv']==''){
                            echo "
                              &emsp;|&emsp;
                              <a href=''
                              data-toggle='modal'
                              data-target='#confirmModal".$res['inv_id']."'
                              > confirm</a>
                            ";
                          } else {
                            echo '';
                          }
                        ?>
                      </td>
                    </tr>
                    <?php $nomor++;}}?>
                  </tbody>
                </table>
              </div>

              <!--Modal view Start-->
              <?php
                $nomor=1;
                $query="SELECT * FROM invoice, kamar, pelanggan WHERE invoice.room_id=kamar.room_id
                AND invoice.user_id=pelanggan.user_id AND invoice.user_id=".$_SESSION['user_id']."
                ORDER BY invoice.inv_id ASC";
                $hasil=mysqli_query($con,$query);
                if(mysqli_num_rows($hasil)>0){
                  while($res=mysqli_fetch_assoc($hasil)){
              ?>
              <div class="modal fade" tabindex="-1" role="dialog" style='margin-left:-50vh;'
              id="viewModal<?php echo $res['inv_id']; ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content" style='width:150%;'>
                    <div class="modal-header">
                      <h3 class="modal-title">Detail Invoice</h3>
                      <button type="button" class="tutup" 
                      style='margin-left:60%!important;'
                      data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>ID Invoice</label>
                            <h5><?php echo $res['inv_id']; ?></h5>
                          </div>
                          <div class="form-group">
                            <label>Nama Kamar</label>
                            <h5><?php echo $res['nama_kamar']; ?></h5>
                          </div>
                          <div class="form-group">
                            <label>Kelompok</label>
                            <h5><?php echo $res['kelompok']; ?></h5>
                          </div>
                          <div class="form-group">
                            <label>Lokasi</label>
                            <h5><?php echo $res['lokasi']; ?></h5>
                          </div>
                          <div class="form-group">
                            <label>Jumlah Maksimal</label>
                            <h5><?php echo $res['jml_orang']; ?></h5>
                          </div>
                          <div class="form-group">
                            <label>Gambar</label><br><br>
                            <img src="./admin/img/kamar/<?php echo $res['gambar']; ?>" 
                            alt="" style='width:80%;height:50%;'>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Sudah Mengirimkan Struk?</label>
                            <h5>
                              <?php
                                if($res['struk']==''){
                                  echo 'Belum';
                                } else{
                                  echo 'Sudah';
                                }
                              ?>
                            </h5>
                            <img src="./receptionist/img/BuktiPembayaran/<?php echo $res["struk"];?>"
                            alt="" style="width:80%;height:50%;">
                          </div>
                          <div class="form-group">
                            <label>Status</label><br>
                            <h5>
                              <?php
                                if($res['status_inv']==''){
                                  echo 'Belum Membayar';
                                } else{
                                  echo $res['status_inv'];
                                }
                              ?>
                            </h5>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Inap</label><br>
                            <h5><?php echo $res['tanggal_inap']; ?></h5>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Pergi</label><br>
                            <h5><?php echo $res['tanggal_pergi']; ?></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--Modal view End-->

              <!--Modal confirm Start-->
              <div class="modal fade" tabindex="-1" role="dialog" style='margin-left:-50vh;'
              id="confirmModal<?php echo $res['inv_id']; ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content" style='width:150%;'>
                    <div class="modal-header">
                      <h3 class="modal-title">Confirm</h3>
                      <button type="button" class="tutup" 
                      style='margin-left:75%!important;'
                      data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="" method="post" enctype='multipart/form-data'>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <?php $inv_id = $res['inv_id']; ?>
                              <label>Silahkan Inputkan Struk Pembayaran Anda disini ⬇:</label><br>  
                              <input type="file" name="struk" class='input-semua form-control'>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button Type="file" name="confirm" class="btn btn-primary ">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--Modal confirm End-->
              <?php $nomor++;}}?>
              
              <div id="history" class='tab-pane fade tab-content'>
                <table class="table table-striped" style='width:140vh;margin-left:-50px;'>
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Kamar</th>
                      <th scope="col">Total Harga</th>
                      <th scope="col">Tanggal Inap</th>
                      <th scope="col">Tanggal Kembali</th>
                      <th scope="col">Status</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $nomor=1;
                      $t = time();
                      $tanggal = date("Y-m-d",$t);
                      $query="SELECT * FROM invoice, pelanggan, kamar WHERE invoice.user_id=pelanggan.user_id 
                      AND invoice.room_id=kamar.room_id AND invoice.user_id=".$_SESSION['user_id']." AND 
                      invoice.tanggal_pergi <='".$tanggal."'";
                      $hasil=mysqli_query($con,$query);
                      if(mysqli_num_rows($hasil)>0){
                        while($res=mysqli_fetch_assoc($hasil)){
                    ?>
                    <tr>
                      <th><?php echo $nomor;?></th>
                      <td><?php echo $res['nama_kamar']; ?></td>
                      <td><?php echo rupiah($res['total_harga']); ?></td>
                      <td><?php echo $res['tanggal_inap']; ?></td>
                      <td><?php echo $res['tanggal_pergi']; ?></td>
                      <td>
                        <?php 
                          if($res['status_inv']==''){
                            echo 'Belum Membayar';
                          } else {
                            echo $res['status_inv'];
                          }
                        ?>
                      </td>
                      <td>
                        <a href="" 
                        data-toggle='modal'
                        data-target='#viewModal<?php echo $res['inv_id']; ?>'
                        > detail</a>
                        &nbsp;|&nbsp;
                        <a href=''
                        data-toggle='modal'
                        data-target='#feedbackModal<?php echo $res['inv_id']; ?>'
                        > feedback</a>
                      </td>
                    </tr>
                    <?php $nomor++;}}?>
                  </tbody>
                </table>
              </div>

              <!--Modal Form Input Feedback start-->

              <?php
                $nomor=1;
                $t = time();
                $tanggal = date("Y-m-d",$t);
                $query="SELECT * FROM invoice, pelanggan, kamar WHERE invoice.user_id=pelanggan.user_id 
                AND invoice.room_id=kamar.room_id AND invoice.user_id=".$_SESSION['user_id']." AND 
                invoice.tanggal_pergi <='".$tanggal."'";
                $hasil=mysqli_query($con,$query);
                if(mysqli_num_rows($hasil)>0){
                  while($res=mysqli_fetch_assoc($hasil)){
              ?>

              <div class="modal fade" tabindex="-1" role="dialog" style='margin-left:-50vh;'
              id="feedbackModal<?php echo $res['inv_id']; ?>">
                <div class="modal-dialog" role="document">
                  <div class="modal-content" style='width:150%;'>
                    <form action="" method="post">
                      <div class="modal-header">
                        <h3 class="modal-title">Input Feedback</h3>
                        <button type="button" style='margin-left:50%!important;'
                        class="tutup" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Nama Kamar</label>
                              <h5>
                                <?php 
                                  $id_room=$res['room_id'];
                                  echo $res['nama_kamar']; 
                                ?>
                              </h5>
                            </div>
                            <div class="form-group">
                              <label>Nilai</label>
                              <select class="w-25 form-control input-semua" id="inputGroupSelect04" name='nilai'>
                                <option selected hidden>Pilih Salah satu</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Pesan</label>
                              <textarea class="form-control input-semua" 
                              style='height:20vh;'
                              name='pesan' required></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-utama" name='feedback'>Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <?php $nomor++;}}?>
              
              <!--Modal Form Input Feedback end-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  
  if(isset($_POST['s_pass'])){
    $user_id = $_SESSION['user_id'];
    $old_password = md5($_POST['old_password']);
    $password = md5($_POST['password']);
    $query = "SELECT password FROM pelanggan WHERE user_id=".$user_id." AND password='".$old_password."'";
    $hasil = mysqli_query($con,$query);
    if(mysqli_num_rows($hasil)>0){
      $update = "UPDATE pelanggan SET password='".$password."' WHERE user_id=".$user_id;
      $result = mysqli_query($con,$update) or die
      (mysqli_error($con));
      echo'
        <script>
          alert("password berhasil diganti");
          window.location = "profile.php";
        </script>
      ';
    } else {
      echo'
        <script>
          alert("password gagal diganti");
          window.location = "profile.php";
        </script>
      ';
    }
  }
  if(isset($_POST['update_profile'])){
    $user_id = $_SESSION['user_id'];
    $nama_pengguna = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['telepon'];
    $query = "UPDATE pelanggan SET nama_pengguna='".$nama_pengguna."',email='".$email."',phone='".$phone."'
    WHERE user_id=".$user_id;
    $result = mysqli_query($con,$query) or die
    (mysqli_error($con));
    echo'
      <script>
        alert("profile berhasil diganti");
        window.location = "profile.php";
      </script>
    ';
  }
  if(isset($_POST['confirm'])){
    $user_id = $_SESSION['user_id'];
    $struk = $_FILES['struk']['name'];
    move_uploaded_file($_FILES['struk']['tmp_name'],"./receptionist/img/BuktiPembayaran/".$_FILES['struk']['name']);
    $query = "UPDATE invoice SET struk='".$struk."', status_inv='Menunggu Konfirmasi' WHERE invoice.user_id=".$user_id." AND invoice.inv_id=".$inv_id;
    $result = mysqli_query($con,$query) or die
    (mysqli_error($con));
    echo'
      <script>
        alert("Konfirmasi Berhasil");
        window.location = "profile.php";
      </script>
    ';
  }
  if(isset($_POST['feedback'])){
    $user_id=$_SESSION['user_id'];
    $nilai=$_POST['nilai'];
    $pesan=$_POST['pesan'];
    $query="INSERT INTO feedback (room_id,user_id,nilai,pesan)
    VALUES ('".$id_room."','".$user_id."','".$nilai."','".$pesan."')";
    $hasil = mysqli_query($con,$query) or die
    (mysqli_error($con));
    echo'
    <script>
      alert("Memberi Feedback Berhasil!");
      window.location = "profile.php";
    </script>
  ';
  }
?>
<?php include('./inc/customer/footer.php');?>