<html>
<head>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <!-- script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script -->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-4.4.1/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>assets/bootstrap-4.4.1/js/jquery.min.js" ></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap-4.4.1/js/bootstrap.min.js" ></script>
</head>
<body>
  <div class="bg-light d-flex flex-column flex-md-row align-items-center pb-1 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal">Wheels Automarket and Car Rental</h5>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>about">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>contact">Contact Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>faq">FAQs</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Booking
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo base_url(); ?>/cars/create">View Booking</a>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>/cars/create">Add Booking</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Admin
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?php echo base_url(); ?>/cars/index">View Vehicles</a>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>/cars/create">Create Vehicles</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>/cars/create">Test</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        <a class="btn btn-outline-primary" href="#">Login</a>
  </div>

<div class="container">
<!-- flash messages -->
<?php if($this->session->flashdata('category_created')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
<?php endif; ?>
