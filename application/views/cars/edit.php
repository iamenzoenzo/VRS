<h2><?= $title ;?></h2>
<?php echo form_open_multipart('cars/update'); ?>
<input type="hidden" name="id" value="<?php echo $cars['Id']; ?>">
  <div class="row">
  	<div class="col">
  		<label>Name</label>
  		<input type="text" class="form-control" name="car-name" placeholder="Enter name" value="<?php echo $cars['name']; ?>">
  	</div>
    <div class="col">
      <label>Code Name</label>
      <input type="text" class="form-control" name="car-code-name" placeholder="Enter code name" value="<?php echo $cars['code_name']; ?>">
    </div>
    <div class="col">
      <label>Car Model Name</label>
      <input type="text" class="form-control" name="car-model-name" placeholder="Ex. Vios" value="<?php echo $cars['model']; ?>">
    </div>
    <div class="col">
      <label>Manufacturer</label>
      <input type="text" class="form-control" name="car-manufacturer" placeholder="Ex. Toyota" value="<?php echo $cars['manufacturer']; ?>">
    </div>
  </div>
  <div class="row  pt-2">
    <div class="col-3">
      <label>Year</label>
      <input type="number" value="1990" min="1900" class="form-control" name="car-model-year" value="<?php echo $cars['year']; ?>">
    </div>
    <div class="col-3">
      <label>Plate Number</label>
      <input type="text" class="form-control" name="car-plate-number" placeholder="Type plate number" value="<?php echo $cars['plate_number']; ?>">
    </div>
    <div class="col-3">
      <label>Rent Per Day</label>
      <input type="number" min="0" class="form-control" name="car-rent-per-day" placeholder="Amount per day" value="<?php echo $cars['RentPerDay']; ?>">
    </div>
    <div class="col-3">
      <label>Capacity</label>
      <input type="number" min="0" class="form-control" name="car-capacity" value="<?php echo $cars['Capacity']; ?>">
    </div>
  </div>
  <div class="row pt-2">
    <div class="col">
      <label>Upload Car Photo</label></br>
  	  <input type="file" name="userfile" >
    </div>
  </div>
<div class="pt-3">
	<button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?php echo base_url()?>cars/index" class="btn btn-danger">Cancel</a>
</div>
</form>
