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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
<i class="fas fa-plus"></i>Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="user" method="post" action="<?= base_url('artikel/input_artikel');?>"  enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="nama_artikel">Nama Artikel</label>
                                    <input type="text" class="form-control form-control-user"
                                        id="nama_artikel" name="nama_artikel" placeholder="Enter Nama Artikel..." value="<?= set_value('nama_artikel')?>">
                                        <?= form_error('nama_artikel', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                <label for="link">Link</label>
                                    <input type="link" class="form-control form-control-user"
                                        id="link" name="link" placeholder="Enter Link..." value="<?= set_value('link')?>">
                                        <?= form_error('link', '<small class="text-danger pl-3">', '</small>');?>
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
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Artikel</th>
                        <th>Link</th>
                        <th>Gambar</th> 
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($artikel as $a) :
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $a['nama_artikel'] ?></td>
                        <td><?= $a['link'] ?></td>
                        <td>
                            <div class="image-wrapper">
                            <img src="<?= base_url('assets/gambar/artikel/'.$a['gambar'])?>" style="width:50px;">
                            </div>
                        </td>
                        <td>
                            <a href="<?= base_url('artikel/delete/'.$a['id_artikel'])?>" class="btn btn-danger btn"><i class="fas fa-trash-alt"></i> Hapus</a>     
                            <a href="<?= base_url('artikel/formEdit/'.$a['id_artikel'])?>"class="btn btn-primary"><i class="fas fa-edit"></i> Ubah</a>
                        </td>
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