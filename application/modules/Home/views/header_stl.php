<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BaBon</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Free Website Template" name="keywords">
        <meta content="Free Website Template" name="description">

        <!-- Favicon -->
        <link href="<?php echo base_url()?>assets/img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/lib/animate/animate.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
        
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar d-none d-md-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top-bar-left">
                            <div class="text">
                                <h2>8:00 - 20:00</h2>
                                <p>Buka senin- jum'at</p>
                            </div>
                            <div class="text">
                                <h2>085 399987 580</h2>
                                <p>Kontak</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="top-bar-right">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="index.html" class="navbar-brand">BaBon <span></span></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="<?= base_url('home/stl')?>" class="nav-item nav-link">Home</a>
                        <a href="<?= base_url('home/stl')?>#about" class="nav-item nav-link">Tentang</a>
                        <a href="<?= base_url('home/stl')?>#service" class="nav-item nav-link">Pelayanan</a>
                        <a href="<?= base_url('home/stl')?>#price"class="nav-item nav-link">Harga</a>
                        <a href="<?= base_url('home/artikel');?>" class="nav-item nav-link">Artikel</a>
                        <a href="<?= base_url('home/shop');?>" class="nav-item nav-link">Pesan</a>  
                        <a href="#contact" class="nav-item nav-link">Kontak</a>
                        
                        
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="<?= base_url('assets/gambar/profile/'.$users['image'])?>" style="width:20px; height:20px;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            <?= $users['name'];?>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout');?>">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
