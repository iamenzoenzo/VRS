<title><?= $title ;?></title>
<h2><?= $title ;?></h2>
<?php echo form_open_multipart('bookings/create'); ?>
  <div class="row">
  	<div class="col">
      <label>Select vehicle</label>
      <select name="carId" class="form-control">
        <option value="0">-</option>
        <?php foreach ($cars as $car): ?>
         <option value="<?php echo $car['Id'];?>"><?php echo $car['code_name'].' ('.$car['plate_number'].')';?></option>
       <?php endforeach; ?>
      </select>
  	</div>
    <div class="col">
      <label>Select client</label>
      <select name="clientId" class="form-control">
        <option value="0">-</option>
        <?php foreach ($clients as $client): ?>
         <option value="<?php echo $client['Id'];?>"><?php echo $client['name'];?></option>
       <?php endforeach; ?>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Start Date</label>
      <input class="form-control col-12" name="start_date" type="date">
    </div>
    <div class="col">
      <label>Number of days</label>
      <input type="number" min="1" class="form-control" name="number_of_days">
    </div>
  </div>
  <div class="row pt-2">
    <div class="col">
      <label>Multiple Attachments (Receipts etc.)</label></br>
  	  <input type="file" name="multiplefiles[]" multiple="">
    </div>
  </div>
<div class="pt-3">
	<button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?php echo base_url()?>bookings/index" class="btn btn-danger">Cancel</a>
</div>
</form>
