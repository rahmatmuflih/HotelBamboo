    <?php
        $value="manage-invoice";

        // Header
        include('../inc/receptionist/header.php');
        // Sidebar
        include('../inc/receptionist/sidebar.php');

        $id = intval($_GET['iid']);
    ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Ubah Status</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php
                        $update = 'SELECT * FROM invoice WHERE invoice.inv_id='.$id;
                        $hasil = mysqli_query($con,$update);
                        if($hasil){
                            while($record=mysqli_fetch_array($hasil)){
                    ?>
                    <form action="" method="post" onSubmit="return valid();" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php 
                                        $id_invoice = $record['inv_id'];
                                        $id_room = $record['room_id'];
                                        $id_user = $record['user_id'];
                                    ?>
                                    <label>Ubah Status Tamu Hotel</label>
                                    <select class="custom-select input-semua" id="inputGroupSelect04" name='status_inv'>
                                        <option selected hidden>Pilih Salah satu</option>
                                        <option value="Konfirmasi Berhasil">Konfirmasi Berhasil</option>
                                        <option value="">Konfirmasi Gagal</option>
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
            $status_inv=$_POST['status_inv'];
            $query = "UPDATE invoice SET status_inv='".$status_inv."' WHERE inv_id=".$id_invoice." AND room_id=".$id_room." AND user_id=".$id_user;
            $hasil = mysqli_query($con,$query) or die
            (mysqli_error($con));
  
            $query_insert = "INSERT INTO confirmation (inv_id)
            VALUES (".$id_invoice.")";
            $hasil_insert = mysqli_query($con,$query_insert) or die
            (mysqli_error($con));
  
            echo'
              <script>
                alert("Perubahan dan Penambahan data berhasil");
                window.location = "manage-invoice.php";
              </script>
            ';
        }
    ?>