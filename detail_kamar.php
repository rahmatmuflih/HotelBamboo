<?php
  include('./inc/customer/header.php');

  $rid=intval($_GET['rid']);

  function rupiah($angka){
	
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
     
  }
  $query_tampil=$con->prepare("SELECT * FROM kamar
  WHERE kamar.room_id=?");
  $query_tampil->bind_param('i',$rid);
  $query_tampil->execute();
  $result_tampil=$query_tampil->get_result();
  while($res=$result_tampil->fetch_assoc()){
    $harga = $res['harga'];
?>

<style>
  input[type="date"]:before {
    content: attr(placeholder) !important;
    color: #aaa;
    margin-right: 0.5em;
  }
  input[type="date"]:focus:before,
  input[type="date"]:valid:before {
    content: "";
  }
  .input-semua:focus{
    background: #eeeeee none repeat scroll 0 0;
    color: #000;
  }
</style>

<img src="./admin/img/kamar/<?php echo $res['gambar']; ?>" alt=""class='image-detail'>
<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-6">
        <h2><?php echo $res['nama_kamar']; ?>, <?php echo $res['kelompok']; ?></h2>
      </div>
      <div class="col-md-6">
        <div class="price_info">
          <p> <?php echo rupiah($res['harga']); ?> </p>Per malam
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="main_features">
          <ul>
            <li> 
              <i class="fas fa-users"></i>
              <p>Jumlah Orang</p>
              <h5><?php echo $res['jml_orang']; ?></h5>
            </li>
            <li> 
              <i class="fas fa-map-marker-alt"></i>
              <p>Lokasi</p>
              <h5><?php echo $res['lokasi']; ?></h5>
            </li>
          </ul>
        </div>
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" style='margin-left:0px; z-index:0;' class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Fasilitas yang didapat </a></li>
            </ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                <p>
                  <?php
                    echo $res['fasilitas'];
                    //$split = explode("-",$res["fasilitas"]);
                    //for($i=1;$i<count($split);$i++){
                      //echo '- '.$split[$i].'<br>';
                    //}
                  ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
      <!--Side-Bar-->
      <aside class="col-md-3">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5 style='font-size:13pt;'><i class="fa fa-envelope" aria-hidden="true"></i>Booking Sekarang!</h5>
          </div>
          <form method="post">
            <div class="form-group">
              <input type="date" class="form-control input-semua" name="tanggal_pemesanan" placeholder='Dari' required>
            </div>
            <div class="form-group">
              <input type="date" class="form-control input-semua" name="tanggal_kembali" placeholder='Sampai' required>
            </div>
            <div class="form-group">
              <textarea rows="4" class="form-control input-semua" name="pesan" placeholder="Pesan" required></textarea>
            </div>
            <?php
              if(isset($_SESSION['user_id'])){
                echo '
                <div class="form-group">
                  <input type="submit" class="btn" name="submit" value="Booking Sekarang">
                </div> ';
              } else {
                echo '
                  <a href="login.php?location='.urlencode($_SERVER['REQUEST_URI']).'" class="btn btn-xs uppercase">Masuk Untuk Booking</a>
                ';
              }
            ?>
          </form>
        </div>
      </aside>
      <!--/Side-Bar--> 
    </div>
    
    <div class="space-20"></div>
    <div class="divider"></div>
    
  </div>
</section>
<!--/Listing-detail--> 

<?php 
  include('./inc/customer/footer.php');

  if(isset($_POST['submit'])){
    $user_id = $_SESSION['user_id'];
    $room_id = $rid;
    $inap=$_POST['tanggal_pemesanan'];
    $pergi=$_POST['tanggal_kembali'];
    $tanggal_inap = date_create($_POST['tanggal_pemesanan']);
    $tanggal_kembali = date_create($_POST['tanggal_kembali']);
    $diff = date_diff($tanggal_kembali,$tanggal_inap);
    $total_hari = $diff->days;
    $total_harga = $total_hari*$harga;
    $pesan=$_POST['pesan'];
    $query="INSERT INTO invoice (user_id,room_id,total_harga,tanggal_inap,tanggal_pergi,struk,status_inv,pesan)
    VALUES (".$user_id.",".$room_id.",".$total_harga.",'".$inap."','".$pergi."','','','".$pesan."')";
    $hasil=mysqli_query($con,$query) or die
    (mysqli_error($con));
    echo '
      <script>
        alert("Sukses Memesan");
        window.location="data_kamar.php";
      </script>
    ';
  }
?>