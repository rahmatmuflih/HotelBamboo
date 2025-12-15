      <?php
        $value="manage-feedback";

        //Header
        include('../inc/admin/header.php');
        //Sidebar
        include('../inc/admin/sidebar.php');
      ?>

      <!-- Main Content start-->
      <div class="main-content">
        <section class="section">

          <!-- Section Header start-->
          <div class="section-header">
            <h1>Menampilkan Tabel Feedback</h1>
          </div>
          <!-- Section Header end-->

          <div class="section-body">
            <div class="row">
              <div class="col-12">

                <!-- Table Content start-->
                <div class="card">
                  <div class="card-header">
                    <h4 style='color:#a5b636;'>Tabel Feedback</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="example1">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Nama Kamar</th>
                            <th>Nama User</th>
                            <th>Nilai</th>
                            <th>Pesan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $nomor=1;
                            $query = mysqli_query($con,"SELECT *
                              FROM feedback,kamar,pelanggan WHERE feedback.room_id=kamar.room_id AND 
                              feedback.user_id=pelanggan.user_id ORDER BY feedback_id ASC
                            ");
                            if($query){
                              while($record = mysqli_fetch_array($query)){
                          ?>
                          <tr>
                            <td> <?php echo $nomor; ?> </td>
                            <td> <?php echo $record['nama_kamar']; ?> </td>
                            <td> <?php echo $record['nama_pengguna']; ?> </td>
                            <td> <?php echo $record['nilai']; ?> </td>
                            <td> <?php echo $record['pesan']; ?> </td>
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
        $sql = 'SELECT * FROM feedback WHERE feedback.room_id=kamar.room_id AND 
        kamar.user_id=pelanggan.user_id ';
        $query = mysqli_query($con,$sql);
        if($query){
          while($record = mysqli_fetch_array($query)){
      ?>
      <div class="modal fade" tabindex="-1" role="dialog" id="viewModal<?php echo $record["feedback_id"];?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style='width:150%;'>
            <div class="modal-header">
              <h3 class="modal-title">Detail Feedback</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>ID Feedback</label>
                    <h5><?php echo $record["feedback_id"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Nama Kamar</label>
                    <h5><?php echo $record["nama_kamar"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Nama User</label>
                    <h5><?php echo $record["nama_user"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Nilai</label>
                    <h5><?php echo $record["nilai"]; ?></h5>
                  </div>
                  <div class="form-group">
                    <label>Pesan</label>
                    <h5><?php echo $record["pesan"]; ?></h5>
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
      <?php include('../inc/admin/footer.php');?>