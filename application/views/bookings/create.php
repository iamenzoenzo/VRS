<title><?= $title ;?></title>

<?php echo form_open_multipart('bookings/create'); ?>
<!-- hidden fields -->

<div class="row">
  <div class="col-lg-6 col-sm-12 mt-3">
    <div class="card">
      <div class="card-header">
        <h5><?= $title ;?></h5>
      </div>
      <div class="card-body">
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
      </div>
      <div class="row">
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
      <div class="row mt-2">
        <div class="col">
          <label>Start Date</label>
          <input class="form-control col-12" name="start_date" type="date">
        </div>
      </div>
        <div class="row mt-2">
          <div class="col">
            <label>Number of days</label>
            <input type="number" min="1" class="form-control" name="number_of_days" value="1">
          </div>
        </div>
        <div class="row mt-2">
          <div class="col">
            <div class="checkbox">
                <input name="add_driver" type="checkbox"> Client need driver? Add PhP <?php echo number_format($driver_pay['value'],2);?> per day</label>
            </div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="col">
            <label>Driver name (Optional)</label>
            <input type="text" class="form-control" name="driver_name">
          </div>
        </div>
        <div class="row mt-2">
          <div class="col">
            <label>Discount amount (Optional)</label>
            <input type="number" min="0" value="0" class="form-control" name="discount">
          </div>
        </div>
        <div class="row pt-3">
          <div class="col">
            <label>Multiple Attachments (Receipts etc.)</label></br>
            <input type="file" name="multiplefiles[]" multiple="">
          </div>
        </div>
      <div class="pt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?php echo base_url()?>bookings/index" class="btn btn-danger">Cancel</a>
      </div>
      </div> <!-- end of card body -->
    </div>
  </div>

  <div class="col-lg-6 col-sm-12 mt-3">
    <div class="card">
      <div class="card-header">
        <h5>Transaction logs</h5>
      </div>
      <div class="card-body">
        <p>No transaction logs to show</p>
      </div>
    </div>
  </div>
</div>





</form>
