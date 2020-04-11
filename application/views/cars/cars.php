<title><?= $title; ?></title>
<div class="album pb-5">
    <div class="container">
      <div class="row">
        <?php foreach($cars as $car) : ?>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img class="slice" height="100%" width="100%" src="<?php echo base_url()."assets/".$car['file_path'].$car['file_extension']; ?>">
              <div class="card-body">
              <h2><?php echo $car['manufacturer']." ".$car['model']; ?></h2>
                <p class="card-text"> Test Paragraph</p>
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
