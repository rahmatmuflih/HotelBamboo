    <?php
        $value="";
        
        //Header
        include('../inc/admin/header.php');

        if (!isset($_SESSION['admin_id'])) {
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        }
        if(isset($_POST['submit'])){
            $password=md5($_POST['password']);
            $new_password=md5($_POST['newpassword']);
            $admin_id= $_SESSION['admin_id'];
            $sql ="SELECT password FROM admin WHERE admin_id=".$admin_id." AND password='".$password."'";
            $hasil=mysqli_query($con,$sql);
            if(mysqli_num_rows($hasil)>0){
                $update = "UPDATE admin SET password='".$new_password."' WHERE admin_id=".$admin_id;
                $result = mysqli_query($con,$update) or die
                (mysqli_error($con));
                echo'
                    <script>
                        alert("password berhasil diganti");
                        window.location = "dashboard.php";
                    </script>
                ';
            } else {
                echo'
                    <script>
                        alert("password gagal diganti");
                        window.location = "ubah-password.php";
                    </script>
                ';
            }
        }
        
        //Sidebar
        include('../inc/admin/sidebar.php');

    ?>

    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Password</h1>
        </div>
        <div class="card">
            <div class="card-body">
                <form name="chngpwd" method="POST" onSubmit="return valid();">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password Sebelumnya</label>
                                <input type="password" name="password" class="form-control" required>
                                <label for="">Password Baru</label>
                                <input type="password" name="newpassword" class="form-control" required>
                                <label for="">Konfirmasi Password Baru</label>
                                <input type="password" name="confirmpassword" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <button Type="submit" name="submit" class="btn btn-primary mt-4">Simpan</button>
                                <button Type="reset" class="btn btn-danger mt-4">Reset</button>
                        </div>    
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

      <!-- Footer -->
      <?php include('../inc/admin/footer.php');?>