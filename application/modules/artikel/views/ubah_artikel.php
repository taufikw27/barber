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
                            
                                <form action="<?= base_url();?>artikel/ubah" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $artikel['id_artikel'] ?>">
                                <div class="form-group">
                                <label for="nama_artikel">Nama Artikel</label>
                                    <input type="text" class="form-control form-control-user"
                                        id="nama_artikel" name="nama_artikel" placeholder="Enter Nama Artikel..." value="<?= $artikel['nama_artikel'] ?>">
                                        <?= form_error('nama_artikel', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                <label for="link">Link</label>
                                    <input type="link" class="form-control form-control-user"
                                        id="link" name="link" placeholder="Enter Link..." value="<?= $artikel['link'] ?>">
                                        <?= form_error('link', '<small class="text-danger pl-3">', '</small>');?>
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
