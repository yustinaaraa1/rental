<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $title; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/chocolat/dist/css/chocolat.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/assets_customer'); ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/assets_customer'); ?>/assets/css/components.css">
</head>

<body>

   <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Car Rental <em>Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('customer/dashboard') ?>">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('customer/dashboard') ?>">Rental Mobil</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('customer/Transaksi') ?>">Transaksi</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="blog.html">Blog</a>
                      <a class="dropdown-item" href="team.html">Team</a>
                      <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                      <a class="dropdown-item" href="terms.html">Terms</a>
                    </div>
                </li>
                
                  <?php if ($this->session->userdata('nama')) { ?>
                    <li class="nav-item">
                    <a class="nav-link" href="">Welcome <?php echo $this->session->userdata('nama') ?> <span class="nav-link"></span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth/logout') ?>">Logout <span class="nav-link"></span></a></li>
                  <?php }else{ ?>
                    <a class="nav-link" href="<?php echo base_url('auth/index') ?>">Login</a>
                  <?php } ?>
              
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <body>

 