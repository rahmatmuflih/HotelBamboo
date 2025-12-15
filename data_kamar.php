<?php
        session_start();
        include('./inc/customer/header.php');
    ?>
    
    <!--== Page Title Area Start ==-->
    <section id="page-title-area" class="section-padding overlay">
        <div class="container">
        
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Kamar Kami</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p>Menampilkan hasil dari kamar yang siap di booking</p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 pb-5">
                    <div class="newsletter-area">
                        <form action="" method="GET">
                            <input type="text" name="cari" placeholder="Cari..">
                            <button type="submit" class="newsletter-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    </div>
                </div>
                    <div class="car-list-content">
                        <div class="row">
                            <!-- Single Car Start -->
                            <?php
                                function rupiah($angka){
	
                                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                                    return $hasil_rupiah;
                                     
                                }
                                if(isset($_GET['cari'])){
                                    $cari = $_GET['cari'];
                                    $query=$con->prepare("SELECT room_id,nama_kamar,lokasi,kelompok,fasilitas,harga,status,jml_orang,gambar
                                                        from  kamar
                                                        WHERE kamar.nama_kamar like '%".$cari."%' or kamar.kelompok like '%".$cari."%' 
                                                        or kamar.lokasi like '%".$cari."%' or kamar.fasilitas like '%".$cari."%'
                                                        or kamar.harga like '%".$cari."%' or kamar.status like '%".$cari."%'
                                                        or kamar.jml_orang like '%".$cari."%'
                                                        order by kamar.nama_kamar ASC LIMIT ?,?");
                                    
                                }
                                else{
                                    $query=$con->prepare("SELECT room_id,nama_kamar,lokasi,kelompok,fasilitas,harga,status,jml_orang,gambar
                                     FROM kamar ORDER BY kamar.nama_kamar ASC LIMIT ?,?");
                                }
                                $batas=6;
                                $pages=isset($_GET['halaman'])?(int)$_GET['halaman']:1;
                                $mulai=($pages>1)?($pages*$batas)-$batas:0;
                                $query->bind_param('ii',$mulai,$batas);
                                $query->execute();
                                $result=$query->get_result();
                                $total_query=mysqli_query($con,'SELECT room_id FROM kamar');
                                $total=mysqli_num_rows($total_query);
                                $pages=ceil($total/$batas);
                                while($res=$result->fetch_assoc()){

                            ?>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-car-wrap">
                                    <img class="car-list-thumb" src="./admin/img/kamar/<?php echo $res['gambar']; ?>" alt="ga bisa tampil euy" width='768px' height='432px'>
                                    <div class="car-list-info without-bar">
                                        <h2><?php echo $res['nama_kamar']; ?></h2>
                                        <h5><?php echo rupiah($res['harga']); ?>/malam</h5>
                                        <ul class="car-info-list">
                                            <li> Kelompok <br>
                                                <span class='car-info-value'><?php echo $res['kelompok'] ?></span>
                                            </li>
                                            <li> Max<br>
                                                <span class='car-info-value'>
                                                    <?php echo $res['jml_orang'] ?> Orang
                                                </span>
                                            </li>
                                            <li style='font-size:11pt;'> Lokasi <br>
                                                <span class='car-info-value'style='font-size:10pt;'>
                                                    <?php echo $res['lokasi'] ?>
                                                </span>
                                            </li>
                                        </ul>
                                        <a href="detail_kamar.php?rid=<?php echo $res['room_id'];?>" class="rent-btn">Detail</a>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- Single Car End -->
                        </div>
                    </div>
                </div>
                <!-- Car List Content End -->
            </div>
            <!-- Page Pagination Start -->
            <div class="page-pagi">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="?halaman=
                        <?php
                            if(($_GET['halaman'])>1){
                                echo $_GET['halaman']-1;
                            }else{
                                echo 1;
                            }
                        ?>">Previous</a></li>
                        <?php for ($i=1; $i <= $pages ; $i++) { ?>
                            <li 
                            <?php
                                if(isset($_GET['halaman'])){
                                    if ($_GET['halaman']==$i) {
                                        echo'class="page-item active"';
                                    } else{
                                        echo'class="page-item"';
                                    }
                                } else{
                                    $_GET['halaman']=1;
                                    echo'class="page-item active"';
                                }
                            ?>
                            ><a class="page-link data-toggle='tab'" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                        <li class="page-item"><a class="page-link" href="?halaman=
                        <?php
                            if(($_GET['halaman'])>=1 && ($_GET['halaman'])<$pages) {
                                echo $_GET['halaman']+1;
                            } else{
                                echo $pages;
                            }
                        ?>">Next</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Page Pagination End -->
        </div>
    </section>
    <!--== Car List Area End ==-->
    <?php include('./inc/customer/footer.php');?>