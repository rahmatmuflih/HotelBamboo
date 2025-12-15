      <?php
        $value="dashboard"; 
        
        //Header
        include('../inc/admin/header.php');
        
        //Sidebar
        include('../inc/admin/sidebar.php');
      ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <div class="section-header">
          <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Admin</h4>
                  </div>
                  <div class="card-body">
                    <?php
                      $query = "SELECT * FROM admin";
                      $hasil = mysqli_query($con,$query);
                      echo mysqli_num_rows($hasil);
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-hotel"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Kamar</h4>
                  </div>
                  <div class="card-body">
                    <?php
                      $query = "SELECT * FROM kamar";
                      $hasil = mysqli_query($con,$query);
                      echo mysqli_num_rows($hasil);
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-comment-dots"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Feedback</h4>
                  </div>
                  <div class="card-body">
                    <?php
                      $query = "SELECT * FROM feedback";
                      $hasil = mysqli_query($con,$query);
                      echo mysqli_num_rows($hasil);
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Users</h4>
                  </div>
                  <div class="card-body">
                    <?php
                      $query = "SELECT * FROM pelanggan";
                      $hasil = mysqli_query($con,$query);
                      echo mysqli_num_rows($hasil);
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- Footer -->
      <?php include('../inc/admin/footer.php');?>