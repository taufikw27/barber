
<!-- End of Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>
        

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
<i class="fas fa-plus"></i>Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="user" method="post" action="<?= base_url('service/input_service');?>"  enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="nama_service">Nama Service</label>
                                    <input type="text" class="form-control form-control-user"
                                        id="nama_service" name="nama_service" placeholder="Enter Nama Service..." value="<?= set_value('nama_service')?>">
                                        <?= form_error('nama_service', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                <label for="harga">Harga</label>
                                    <input type="harga" class="form-control form-control-user"
                                        id="harga" name="harga" placeholder="Enter Harga..." value="<?= set_value('harga')?>">
                                        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                <label for="barbershop">Barbershop</label>
                                    <input type="barbershop" class="form-control form-control-user"
                                        id="barbershop" name="barbershop" placeholder="Enter Barbershop..." value="<?= set_value('barbershop')?>">
                                        <?= form_error('barbershop', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                <label for="alamat">Alamat</label>
                                    <input type="alamat" class="form-control form-control-user"
                                        id="alamat" name="alamat" placeholder="Enter Alamat..." value="<?= set_value('alamat')?>">
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
                           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-user">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
    </div>
    <!-- Button trigger modal -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Service</th>
                        <th>Harga</th>
                        <th>Barbershop</th>
                        <th>Gambar</th> 
                        <th>Alamat</th> 
                        <th>Kategori</th> 
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($service as $s) :
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $s['nama_service'] ?></td>
                        <td><?= $s['harga'] ?></td>
                        <td><?= $s['barbershop'] ?></td>
                        <td>
                            <div class="image-wrapper">
                            <img src="<?= base_url('assets/gambar/service/'.$s['gambar'])?>" style="width:50px;">
                            </div>
                        </td>
                        <td><?= $s['alamat'] ?></td>
                        <td><?= $s['kategori'] ?></td>
                        <td>
                            <a href="<?= base_url('service/delete/'.$s['id_service'])?>" class="btn btn-danger btn"><i class="fas fa-trash-alt"></i> Hapus</a>       
                            <a href="<?= base_url('service/FormEdit/'.$s['id_service'])?>" class="btn btn-primary"><i class="fas fa-edit"></i> Ubah</a>
    
                    </tr>
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
