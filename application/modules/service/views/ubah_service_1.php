<!-- Outer Row --> 
<div class="row justify-content-center">

    <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Data</h1>
                            </div>
                            
                                <form action="<?= base_url();?>service/ubah1" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $service['id_service'] ?>">
                                <div class="form-group">
                                <label for="nama_service">Nama Service</label>
                                    <input type="text" class="form-control form-control-user"
                                        id="nama_service" name="nama_service" placeholder="Enter Nama Service..." value="<?= $service['nama_service'] ?>">
                                        <?= form_error('nama_service', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                <label for="harga">Harga</label>
                                    <input type="harga" class="form-control form-control-user"
                                        id="harga" name="harga" placeholder="Enter Harga..." value="<?= $service['harga'] ?>">
                                        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                <label for="barbershop">Barbershop</label>
                                    <input type="barbershop" class="form-control form-control-user"
                                        id="barbershop" name="barbershop" placeholder="Enter Barbershop..." value="<?= $service['barbershop'] ?>">
                                        <?= form_error('barbershop', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                <label for="alamat">Alamat</label>
                                    <input type="alamat" class="form-control form-control-user"
                                        id="alamat" name="alamat" placeholder="Enter Alamat..." value="<?= $service['alamat'] ?>">
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori </label>
                                    <select name="kategori" id="kategori" class="form-control">
                                        <option value="rambut">Rambut</option>
                                        <option value="kumis">Kumis</option>
                                        <option value="jenggot">Jenggot</option>
                                        <option value="brewo">Brewo</option>
                                        <option value="wajah">Wajah</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form" id="gambar" name="gambar">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
