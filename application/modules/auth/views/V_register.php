<div class="container">

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
                                <h1 class="h4 text-gray-900 mb-4">Sign Up</h1>
                            </div>
                            
                            <form method="post" action="<?= base_url('auth/registration')?>" enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="name">Name</label>
                                    <input type="text" class="form-control form-control-user"
                                        id="name" name="name" placeholder="Enter Name..." value="<?= set_value('name')?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                <label for="email">Email</label>
                                    <input type="email" class="form-control form-control-user"
                                        id="email" name="email" placeholder="Enter Email..." value="<?= set_value('email')?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                <label for="password1">Password</label>
                                    <input type="password" class="form-control form-control-user"
                                        id="password1" name="password1" placeholder="Enter Password..." >
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');?>
                                </div>
                                <div class="form-group">
                                <label for="pass2">Enter Repeat Password</label>
                                    <input type="password" class="form-control form-control-user"
                                        id="password2" name="password2" placeholder="Enter Repeat Password...">
                                </div>
                                <div class="form-group">
                                <label for="gambar">Upload Gambar</label>
                                    <input type="file" class="form-control form-control-user"
                                        id="gambar" name="gambar">
                                </div>
                                <div class="form-group">
                                    <label for="as">Login sebagai: </label>
                                    <select name="as" id="as" class="form-control">
                                        <option value="barbershop">Barbershop</option>
                                        <option value="costumers">Customers</option>
                                </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                   Daftar
                                </button>
                            
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth');?>">I have account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
