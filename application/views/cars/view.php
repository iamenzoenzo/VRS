<title><?= $title; ?></title>
<div class="row">
  <div class="col">
    <h2><?= $title; ?></h2>
  </div>
    <div class="float-right pl-3">
      <a href="<?php echo base_url(); ?>cars/index" class="btn btn-primary">Back to list</a>
    </div>
</div>

  <div class="row mt-3">
    <div class="col d-flex justify-content-center">
      <img src="<?php echo base_url(); ?>assets/images/cars_images/<?php echo $cars['file_name']; ?>" class="img-fluid img-thumbnail d-block" style="width:100%;height:100%;object-fit: cover;">
    </div>
  </div>
  <div class="mt-3">
  <div class="row">
  	<div class="col">
  		<label>Description</label>
  		<input readonly type="text" class="form-control" name="car-name" placeholder="Enter name" value="<?php echo $cars['car_description']; ?>">
  	</div>
    <div class="col">
      <label>Code Name</label>
      <input readonly type="text" class="form-control" name="car-code-name" placeholder="Enter code name" value="<?php echo $cars['code_name']; ?>">
    </div>
    <div class="col">
      <label>Car Model Name</label>
      <input readonly type="text" class="form-control" name="car-model-name" placeholder="Ex. Vios" value="<?php echo $cars['model']; ?>">
    </div>
    <div class="col">
      <label>Manufacturer</label>
      <input readonly type="text" class="form-control" name="car-manufacturer" placeholder="Ex. Toyota" value="<?php echo $cars['manufacturer']; ?>">
    </div>
  </div>
  <div class="row  pt-2">
    <div class="col-3">
      <label>Year</label>
      <input readonly type="number" value="1990" min="1900" class="form-control" name="car-model-year" value="<?php echo $cars['year']; ?>">
    </div>
    <div class="col-3">
      <label>Plate Number</label>
      <input readonly type="text" class="form-control" name="car-plate-number" placeholder="Type plate number" value="<?php echo $cars['plate_number']; ?>">
    </div>
    <div class="col-3">
      <label>Rent Per Day</label>
      <input readonly type="number" min="0" class="form-control" name="car-rent-per-day" placeholder="Amount per day" value="<?php echo $cars['RentPerDay']; ?>">
    </div>
    <div class="col-3">
      <label>Capacity</label>
      <input readonly type="number" min="0" class="form-control" name="car-capacity" value="<?php echo $cars['Capacity']; ?>">
    </div>
  </div>
<div class="pt-3">
  <?php if($this->session->userdata('logged_in')): ?>
    <a href="<?php echo base_url(); ?>cars/edit/<?php echo $cars['Id']; ?>" class="btn btn-success">Edit</a>
    <a href="<?php echo base_url(); ?>cars/delete/<?php echo $cars['Id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this vehicle?')">Delete</a>
  <?php endif; ?>
</div>
</div>
