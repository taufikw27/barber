<div class="service" id="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>Pelayanan Barbershop</p>
                    <h2>Silahkan dipesan</h2>
                </div>
                <div class="row">
                <?php
                $no = 1;
                foreach ($service as $s) :
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item" style="width:400px; height:600px;">
                            <div class="service">
                                <img src="<?= base_url('assets/gambar/service/'.$s['gambar']);?>" alt="Image" style="width:300px; height:300px;">
                            </div>
                            <h3><?= $s['nama_service']?></h3>
                            <h6><i class="fas fa-map-marked-alt" style="color:black;"> <?= $s['alamat']?></i></h6>
                            <h6><i class="fas fa-cut" style="color:black;"> <?= $s['barbershop']?></i></h6>
                            <h6 style="color:black;"><strong>Rp.<?= number_format($s['harga'])?></strong></h6>
                            <a> <?=anchor('home/tambah_pesanan/'.$s['id_service'], 'pesan' , [
                        'class'    => 'btn btn-primary','role'    => 'button'])?></a>
                        </div>
                    </div>
                    
                
                        <?php
                endforeach;
                ?>
                </div>
                </div>
                </div>
                    </div>
                </div>
                
            </div>
        </div>

        