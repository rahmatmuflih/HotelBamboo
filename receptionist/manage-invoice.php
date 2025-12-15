<?php
        $value="manage-invoice";

        //Header
        include('../inc/receptionist/header.php');
        //Sidebar
        include('../inc/receptionist/sidebar.php');

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
            <h1>Menampilkan Tabel Invoice</h1>
          </div>
          <!-- Section Header end-->

          <div class="section-body">
            <div class="row">
              <div class="col-12">

                <!-- Table Content start-->
                <div class="card">
                  <div class="card-header">
                    <h4 style='color:#a5b636;'>Tabel Invoice</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="example1">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Nama User</th>
                            <th>Nama Kamar</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $nomor=1;
                            $query = mysqli_query($con,'SELECT * FROM 
                            pelanggan, invoice, kamar WHERE pelanggan.user_id=invoice.user_id AND 
                            kamar.room_id=invoice.room_id ORDER BY invoice.inv_id ASC');
                            if($query){
                              while($record = mysqli_fetch_assoc($query)){
                          ?>
                          <tr>
                            <td> <?php echo $nomor; ?> </td>
                            <td> <?php echo $record['nama_pengguna']; ?> </td>
                            <td> <?php echo $record['nama_kamar']; ?> </td>
                            <td> <?php echo rupiah($record['total_harga']); ?> </td>
                            <td> 
                              <?php 
                                if($record['status_inv']==""){
                                  echo 'Belum Membayar';
                                } else {
                                  echo $record['status_inv'] ;
                                }
                              ?> 
                            </td>
                            <td> 
                              <a href="" style='text-decoration:none'
                              data-toggle="modal" 
                              data-target="#viewModal<?php echo $record['inv_id'];?>"
                              >detail</a>
                              &emsp;|&emsp;
                              <a href="ubah-status.php?iid=<?php echo $record['inv_id']; ?>" style='text-decoration:none'>ubah status</a>
                            </td>
                          </tr>
                          <?php $nomor++;}}?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- Table Content end-->

              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- Main Content end-->

      <!--Modal View Data start-->

      <?php
        $nomor=1;
        $query = mysqli_query($con,'SELECT * FROM 
        invoice,pelanggan,kamar WHERE invoice.user_id=pelanggan.user_id AND 
        invoice.room_id=invoice.room_id ');
        if($query){
          while($record = mysqli_fetch_array($query)){
      ?>
      <div class="modal fade" tabindex="-1" role="dialog" id="viewModal<?php echo $record["inv_id"];?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style='width:150%;'>
            <div class="modal-header">
              <h3 class="modal-title">Detail Invoice</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>ID invoice</label>
                    <h5><?php echo $record["inv_id"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Nama Kamar</label>
                    <h5><?php echo $record["nama_kamar"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Nama User</label>
                    <h5><?php echo $record["nama_pengguna"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Total Harga</label>
                    <h5><?php echo $record["total_harga"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Inap</label>
                    <h5><?php echo $record["creation_date"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Pergi</label>
                    <h5><?php echo $record["creation_date"]; ?></h5>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Bukti Pembayaran</label>
                    <img src="img/BuktiPembayaran/<?php echo $record['struk']?>" alt="">
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <h5><?php echo $record["status"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Buat</label>
                    <h5><?php echo $record["creation_date"]; ?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!--Modal View Data end-->

      <?php $nomor++;}}?>

      <!-- Footer -->
      <?php include('../inc/receptionist/footer.php'); ?>