<title><?= $title; ?></title>
<div class="row">
  <div class="col">
    <h2><?= $title; ?></h2>
  </div>

    <div class="float-right pl-3">
      <a href="<?php echo base_url(); ?>cars/create" class="btn btn-primary">Add New Vehicle</a>
    </div>
</div>
<div class="album pb-5">
    <div class="container">
      <div class="row">
        <?php foreach($cars as $car) : ?>
          <div class="col-md-3">
            <div class="card mb-3 shadow-sm">
              <img class="img-fluid img-thumbnail d-block" style="width:400px;height:300px;object-fit: cover;" src="<?php echo base_url()."assets/images/cars_images/".$car['car_image_path']; ?>">
              <!--img class="img-fluid img-thumbnail" height="100%" width="100%" src="<?php echo base_url()."assets/images/cars_images/".$car['car_image_path']; ?>" -->
              <div class="card-body">
              <h4><?php echo $car['manufacturer']." ".$car['model']." (".$car['year'].")"; ?></h4>
                <p class="card-text">Test Paragraph</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    <a class="btn btn-sm btn-outline-secondary" href="#" class="btn btn-info" role="button">Estimate Rent</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
    </div>
  </div>
</div>
