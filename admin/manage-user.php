      <?php 
        $value="manage-user";

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
            <h1>Menampilkan Tabel Tamu Hotel</h1>
          </div>
          <!-- Section Header end-->

          <div class="section-body">
            <div class="row">
              <div class="col-12">

                <!-- Table Content start-->
                <div class="card">
                  <div class="card-header">
                    <h4 style='color:#a5b636;'>Tabel Tamu Hotel</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="example1">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Nama Pengguna</th>
                            <th>Phone</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $query = mysqli_query($con,"
                              SELECT user_id,nama_pengguna,phone
                              FROM pelanggan ORDER BY user_id ASC
                            ");
                            if($query){
                              while($record = mysqli_fetch_array($query)){
                          ?>
                          <tr>
                            <td> <?php echo $record['user_id']; ?> </td>
                            <td> <?php echo $record['nama_pengguna']; ?> </td>
                            <td> <?php echo $record['phone']; ?> </td>
                          </tr>
                          <?php }}?>
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
      <!-- Main Content end -->

      <!-- Footer -->
      <?php include('../inc/admin/footer.php');?>