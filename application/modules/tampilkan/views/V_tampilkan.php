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
    <a href="<?= base_url('tampilkan/tambahdata')?>" class="btn btn-secondary"><i class="fas fa-plus"></i> Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Role</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($users as $u) :
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u['email'] ?></td>
                        <td><?= $u['name'] ?></td>
                        <td>
                            <div class="image-wrapper">
                            <img src="<?= base_url('assets/gambar/profile/'.$u['image'])?>" style="width:50px;">
                            </div>
                        </td>
                        <td><?= $u['role'] ?></td>
                        <td>
                            <a href="<?= base_url()?>ud/hapus/<?= $u['id'] ?>" class="btn btn-danger btn"><i class="fas fa-trash-alt"></i> Hapus</a>       
                            <a href="<?= base_url()?>ud/formEdit/<?= $u['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Ubah</a>
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
<!-- End of Main Content -->
