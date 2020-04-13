<title><?= $title ;?></title>

<div class="row">
  <div class="col">
    <h2><?= $title ;?></h2>
  </div>
    <div class="float-right pl-3">
      <a href="<?php echo base_url()?>clients/index" class="btn btn-primary">Back to client list</a>
    </div>
</div>

<div class="card">
  <div class="card-header">
    <h5><?php echo $clients['name']; ?> Information</h5>
  </div>
  <div class="card-body">
      <div class="row">
        <div class="col">
          <span><?php echo 'Contact Number: '.$clients['contact_number']; ?></span>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <span class="font-italic">Email:<?php echo $clients['email_address']; ?></span>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <span class="text-muted">Address:<?php echo $clients['address']; ?></span>
        </div>
      </div>
  </div>
</div>



<!-- start of carousel -->
<div id="carouselExampleIndicators" class="carousel slide border box-shadow text-center mt-3" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <?php
    $counter=0;
    foreach ($images as $image) {
      $counter++;
      echo '
      <div class="carousel-item '.($counter===1 ? 'active' : ' ' ).'">
        <img style="width:100%;height:100%;object-fit: contain;" class="d-block" src="'.base_url().'assets/images/client_images/'.$image['file_name'].'">
      </div>
      ';
    }
    ?>
  </div>
  <a class="carousel-control-prev shadow rounded" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only ">Previous</span>
  </a>
  <a class="carousel-control-next shadow rounded" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only bg-dark">Next</span>
  </a>
</div> <!-- end of carousel -->
