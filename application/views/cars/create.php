<h2><?= $title ;?></h2>
<?php echo form_open('cars/create'); ?>
  <div class="row">
  	<div class="col">
  		<label>Name</label>
  		<input type="text" class="form-control" name="car-name" placeholder="Enter name">
  	</div>
    <div class="col">
      <label>Code Name</label>
      <input type="text" class="form-control" name="car-code-name" placeholder="Enter code name">
    </div>
    <div class="col">
      <label>Car Model Name</label>
      <input type="text" class="form-control" name="car-model-name" placeholder="Ex. Vios">
    </div>
    <div class="col">
      <label>Manufacturer</label>
      <input type="text" class="form-control" name="car-manufacturer" placeholder="Ex. Toyota">
    </div>
  </div>
  <div class="row  pt-2">
    <div class="col-3">
      <label>Year</label>
      <input type="number" value="1990" min="1900" class="form-control" name="car-model-year">
    </div>
    <div class="col-3">
      <label>Plate Number</label>
      <input type="text" class="form-control" name="car-plate-number" placeholder="Type plate number">
    </div>
    <div class="col-3">
      <label>Rent Per Day</label>
      <input type="number" min="0" class="form-control" name="car-rent-per-day" placeholder="Amount per day">
    </div>
    <div class="col-3">
      <label>Capacity</label>
      <input type="number" min="0" class="form-control" name="car-capacity" value="4">
    </div>
  </div>
  <div class="row pt-2">
    <div class="col">
      <label>Upload Car Photo</label></br>
  	  <input type="file" name="car-photo" size="20">
    </div>
  </div>
<div class="pt-3">
	<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
