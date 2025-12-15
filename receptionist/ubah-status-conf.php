    <?php
        $value="manage-confirmation";

        // Header
        include('../inc/receptionist/header.php');
        // Sidebar
        include('../inc/receptionist/sidebar.php');

        $id = intval($_GET['cid']);
    ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Ubah Status Confrimation</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php
                        $update = 'SELECT * FROM confirmation, invoice 
                        WHERE confirmation.inv_id=invoice.inv_id AND confirmation.conf_id='.$id;
                        $hasil = mysqli_query($con,$update);
                        if($hasil){
                            while($record=mysqli_fetch_array($hasil)){
                    ?>
                    <form action="" method="post" onSubmit="return valid();" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php 
                                        $id_conf = $record['conf_id'];
                                        $id_invoice = $record['inv_id'];
                                        $checkin_date = $record['checkin_date'];
                                    ?>
                                    <label>Ubah Status Tamu Hotel</label>
                                    <select class="custom-select input-semua" id="inputGroupSelect04" name='status_conf'>
                                        <option selected hidden>Pilih Salah satu</option>
                                        <option value="Check In">Check In</option>
                                        <option value="Check Out">Check Out</option>
                                    </select>
                                </div>
                                <button Type="submit" name="ubah_status" class="btn btn-utama mt-4">Update</button>
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

        if(isset($_POST['ubah_status'])){
            if($_POST['status_conf']=="Check In"){
              $query="UPDATE confirmation SET status_conf='Sudah Check-In',checkout_date='00/00/0000' WHERE conf_id=".$id_conf." AND inv_id=".$id_invoice;
              $hasil=mysqli_query($con,$query) or die
              (mysqli_error($con));
  
              echo'
                <script>
                  alert("Perubahan data berhasil");
                  window.location = "manage-confirmation.php";
                </script>
              ';
            } elseif($_POST['status_conf']=="Check Out"){
              $query="UPDATE confirmation SET status_conf='Sudah Check-Out',checkin_date='".$checkin_date."' WHERE conf_id=".$id_conf." AND inv_id=".$id_invoice;
              $hasil=mysqli_query($con,$query) or die
              (mysqli_error($con));
  
              echo'
                <script>
                  alert("Perubahan data berhasil");
                  window.location = "manage-confirmation.php";
                </script>
              ';
            }
          }
    ?>