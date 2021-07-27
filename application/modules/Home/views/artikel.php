 <!-- Service Start -->
 <div class="service" id="service">
            <div class="container">
                <div class="section-header text-center">
                    <p>Artikel</p>
                    <h2>Tentang Dunia Cukur</h2>
                </div>
                <div class="row">
                <?php
                $no = 1;
                foreach ($artikel as $a) :
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item" style="width:500px; height:500px;">
                            <div class="service">
                                <img src="<?= base_url('assets/gambar/artikel/'.$a['gambar']);?>" alt="Image" style="width:250px; height:300px;">
                            </div>
                            <h3><?= $a['nama_artikel']?></h3>
                            <a href="<?= $a['link']?>" class="btn btn-primary">Kunjungi</a>
                        </div>
                    </div>
                    
                
                        <?php
                endforeach;
                ?>
                </div>
            </div>
        </div>
        <!-- Service End -->