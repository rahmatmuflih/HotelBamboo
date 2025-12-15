<?php
        $value="manage-confirmation";

        //Header
        include('../inc/receptionist/header.php');
        //Sidebar
        include('../inc/receptionist/sidebar.php');
      ?>

      <!-- Main Content start-->
      <div class="main-content">
        <section class="section">

          <!-- Section Header start-->
          <div class="section-header">
            <h1>Menampilkan Tabel Konfirmasi</h1>
          </div>
          <!-- Section Header end-->

          <div class="section-body">
            <div class="row">
              <div class="col-12">

                <!-- Table Content start-->
                <div class="card">
                  <div class="card-header">
                    <h4 style='color:#a5b636;'>Tabel Konfirmasi</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="example1">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Invoice ID</th>
                            <th>Tanggal Bayar</th>
                            <th>Tanggal Check-IN</th>
                            <th>Tanggal Check-OUT</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $nomor=1;
                            $query = mysqli_query($con,'SELECT * FROM 
                            confirmation, invoice WHERE confirmation.inv_id=invoice.inv_id ORDER BY confirmation.conf_id ASC');
                            if($query){
                              while($record = mysqli_fetch_array($query)){
                          ?>
                          <tr>
                            <td> <?php echo $nomor; ?> </td>
                            <td> <?php echo $record['inv_id']; ?> </td>
                            <td> <?php echo $record['pay_date']; ?> </td>
                            <td> <?php echo $record['checkin_date'];?> </td>
                            <td><?php echo $record['checkout_date'];?></td>
                            <td><?php echo $record['status_conf'];?></td>
                            <td> 
                              <a href="" style='text-decoration:none'
                              data-toggle="modal" 
                              data-target="#viewModal<?php echo $record['conf_id'];?>"
                              >detail</a>
                              &emsp;|&emsp;
                              <a href="ubah-status-conf.php?cid=<?php echo $record['conf_id']; ?>" style='text-decoration:none'>ubah status</a>
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

      <!--Modal Form View Data start-->

      <?php
        $nomor=1;
        $query = mysqli_query($con,'SELECT * FROM 
        confirmation, invoice WHERE confirmation.inv_id=invoice.inv_id ORDER BY confirmation.conf_id ASC');
        if($query){
          while($record = mysqli_fetch_array($query)){
      ?>

      <div class="modal fade" tabindex="-1" role="dialog" id="viewModal<?php echo $record["conf_id"];?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style='width:150%;'>
            <div class="modal-header">
              <h3 class="modal-title">Detail Confrimation</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Confirmation ID</label>
                    <h5><?php echo $record["conf_id"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Invoice ID</label>
                    <h5><?php echo $record["inv_id"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Bayar</label>
                    <h5><?php echo $record["pay_date"]; ?></h5>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tanggal Check IN</label>
                    <h5><?php echo $record['checkin_date'];?></h5>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Check OUT</label>
                    <h5><?php echo $record['checkout_date'];?></h5>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <h5><?php echo $record['status_conf'];?></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php $nomor++;}}?>

      <!--Modal Form View Data end-->

      <!-- Footer -->
      <?php  include('../inc/receptionist/footer.php'); ?>