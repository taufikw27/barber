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
                            
                                        <form action="<?= base_url();?>ud/ubahData" method="post">
                                <input type="hidden" name="id" value="<?= $users['id'] ?>">
                                <div class="form-group">
                                            <label for="email">Email</label>
                                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email..." value="<?= $users['email'] ?>">
                                            </div>
                                            <div class="form-group">
                                            <label for="password1">Password</label>
                                                <input type="password" class="form-control form-control-user"
                                                    id="password1" name="password1" placeholder="Enter Password..." value="<?= $users['password'] ?>" >
                                            </div>
                                            <div class="form-group">
                                            <label for="password2">Repeat Password</label>
                                                <input type="password" class="form-control form-control-user"
                                                    id="password2" name="password2" placeholder="Enter Repeat Password..." value="<?= $users['password'] ?>">
                                            </div>
                                            <div class="form-group">
                                            <label for="name">Nama</label>
                                                <input type="text" class="form-control form-control-user"
                                                    id="name" name="name" placeholder="Enter Nama..."  value="<?= $users['name'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="as">Login sebagai: </label>
                                                <select name="as" id="as" class="form-control">
                                                    <option value="admin">Admin</option>
                                                    <option value="barbershop">Barbershop</option>
                                                    <option value="costumers">Customers</option>
                                            </select>
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
