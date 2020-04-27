<title><?= $title ;?></title>
<?php echo validation_errors(); ?>
<div>
  <div class="row">
    <div class="col-lg-8 col-sm-12">
      <h2><?= $title ;?></h2>
    </div>
    <div class="col">
      <a href="<?php echo base_url()?>bookings/index" class="btn btn-info btn-md pull-right col-lg-auto col-sm-12"><i class="fa fa-arrow-left"></i> Back to list</a>
    </div>
  </div>
</div>
<?php echo form_open('bookings/update/'.$booking['BookingId']); ?>
  <div class="card p-4 bg-light mt-2">
    <div class="row">
      <div class="col">
        <div class="pull-right">
          <h2><?php echo $booking['reference_number']; ?></h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="pull-right">
          <small>Booking Reference Number</small>
        </div>
      </div>
    </div>
    <div class="row border-bottom pb-2">
      <div class="col-lg-10 col-sm-12">
          <small>Client name</small>
          <h5><?php echo $booking['name']; ?></h5>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-sm-12">
        <div class="pull-right">
          <a data-toggle="modal" href="#changeDateModal" class="btn btn-sm btn-primary col-lg-auto col-sm-12 mt-3" id="btnSearch"><i class="fa fa-calendar"></i> Change rental date</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-sm-12 mt-3">
        <small>Driver Add-on</small>
        <div class="checkbox">
          <input name="add_driver" type="checkbox" <?php echo ($booking['add_driver']==true?'checked':''); ?>>Add ₱<?php echo number_format($driver_pay['value'],2);?> per day for a driver</label>
        </div>
      </div>
      <div class="col-lg-4 col-sm-12 mt-3">
        <small>Driver Name</small>
        <input type="text" class="form-control" name="driver_name" value="<?php echo $booking['driver_name']; ?>">
      </div>
      <div class="col-lg-4 col-sm-12 mt-3">
        <small>Status</small>
        <select name="status_id" class="form-control">
          <option value="">-</option>
          <?php foreach ($status as $stat): ?>
           <option value="<?php echo $stat['Id'];?>" <?php echo ($booking['statusId']==$stat['Id']?'selected="selected"':'');?> ><?php echo $stat['label'];?></option>
         <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-sm-12 mt-3">
        <small>Driver fee (Per day)</small>
        <input type="number" class="form-control" name="driver_fee_current" value="<?php echo $booking['driver_fee_current']; ?>">
      </div>
      <div class="col-lg-4 col-sm-12 mt-3">
        <small>Rental fee (Per day)</small>
        <input type="number" class="form-control" name="rental_fee_current" value="<?php echo $booking['rental_fee_current']; ?>">
      </div>
      <div class="col-lg-4 col-sm-12 mt-3">
        <small>Discount (Optional)</small>
        <input type="number" class="form-control" name="rental_discount" value="<?php echo $booking['rental_discount']; ?>">
      </div>
    </div>
      <div class="text-right  mt-3 border-top">
        <button type="submit" class="btn btn-warning col-lg-auto col-sm-12 mt-3" id="btnSearch"><i class="fa fa-floppy-o"></i> Save Edit</button>
        <a class="btn btn-danger col-lg-auto col-sm-12 mt-3" href="<?php echo base_url().'bookings/view/'.$booking['BookingId']; ?>"><i class="fa fa-ban"></i>  Cancel</a>
      </div>
      <!-- hidden fields -->
      <input type="hidden" name="bookingid" value="<?php echo $booking['BookingId']; ?>">
  </div>
</form>

<?php if(count($cars)<1):?>
  <div class="bg-light border rounded text-center text-lg text-center p-3">
    <h5>All vehicles are fully-booked on the chosen date</h5>
  </div>
  </hr>
<?php else:?>
  <div class="bg-light border border-bottom-0 rounded  text-center text-lg text-center p-3">
    <h5><?php echo count($cars).' vehicle(s) available for rent on <u>'.$this->session->userdata('booking_start_date').'</u> to <u>'.date('Y-m-d', strtotime($this->session->userdata('booking_start_date'). ' + '.$this->session->userdata('booking_days').' days')).'</u>';?></h5>
  </div>
  <div class="card bg-light p-4">
    <div class="album">
        <div class="container">
          <div class="row">
            <?php foreach($cars as $car) : ?>
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm <?php echo ($car['Id']==$booking['carId']?'border-success':'border-danger') ?>">
                  <a data-toggle="modal" href="#exampleModal" title="Click image to view full image" data-filepath="<?php echo base_url()."assets/images/cars_images/".$car['file_name']; ?>">
                    <img class="img-fluid img-thumbnail d-block" style="width:400px;height:300px;object-fit: cover;" src="<?php echo base_url()."assets/images/cars_images/".$car['file_name']; ?>">
                  </a>
                  <!--img class="img-fluid img-thumbnail" height="100%" width="100%" src="<?php echo base_url()."assets/images/cars_images/".$car['car_image_path']; ?>" -->
                  <div class="card-body">
                  <h4><?php echo $car['manufacturer']." ".$car['model']." (".$car['year'].")"; ?></h4>
                    <p class="card-text">With a maximum capacity of <b><?php echo $car['Capacity']; ?> persons</b> including driver. Drive now for a minimum rent of <b>₱<?php echo number_format($car['RentPerDay'],2); ?></b> for 24 hours.</p>
                    <div>
                      <a data-toggle="modal" href="#rentModal" class="btn btn-md <?php echo ($car['Id']==$booking['carId']?'btn-success':'btn-danger') ?> form-control" data-selectedcar="<?php echo $car['Id'].'|'.$car['RentPerDay'].'|'.$this->session->userdata('booking_days').'|'.$this->session->userdata('booking_add_driver').'|'.$driver_pay['value'];?>" href="<?php echo base_url()?>pages/estimate/<?php echo $car['Id']?>" role="button"><i class="fa fa-hand-rock-o"></i> <?php echo ($car['Id']==$booking['carId']?'Rent this! (Same vehicle)':'Rent this! (Replace vehicle)') ?></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif;?>


<!-- start of modal popup -->
<div class="modal fade" role="dialog" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Full Image</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div id="ImageContainer">
            </div>
          </div> <!-- end of modal body -->
      </div> <!-- end of modal content -->
    </div>
</div> <!-- end of modal popup -->

<!-- start of change date modal modal popup -->
<div class="modal fade" role="dialog" id="changeDateModal" tabindex="-1"  aria-labelledby="changeDateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <?php echo form_open('bookings/filter_edit'); ?>
            <div class="modal-header">
                <h5 class="modal-title" id="changeDateModalLabel">Change booking dates</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-8 col-sm-12 mt-3">
                  <label>Start Date</label>
                  <input class="form-control" name="booking_edit_start_date" type="date" value="<?php echo $this->session->userdata('booking_start_date'); ?>">
                </div>
                <div class="col mt-3">
                  <label>Days</label>
                  <input type="number" min="1" class="form-control col-lg-auto col-sm-12" name="booking_edit_number_of_days" value="<?php echo $this->session->userdata('booking_days'); ?>">
                </div>
              </div>
              <div class="text-center mt-3">
                <button type="submit" class="btn btn-warning col-lg-auto col-sm-12" id="btnSearch"><i class="fa fa-search"></i> Search available vehicles</button>
              </div>
              <input type="hidden" name="edit_booking_id" value="<?php echo $booking['BookingId']; ?>">
            </div> <!-- end of modal body -->
        </form>
      </div> <!-- end of modal content -->
    </div>
</div> <!-- end of change date modal popup -->


<!-- start of modal popup -->
<div class="modal fade" role="dialog" id="rentModal" tabindex="-1"  aria-labelledby="rentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="rentModalLabel">Booking Reservation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <?php echo form_open_multipart('bookings/update'); ?>
              <div class="row mt-2 text-center">
                <div class="col">
                  <h1 id="for_total_rent">₱0.00</h1>
                  <small>Total rent to pay in Pesos</small>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-lg-6 col-sm-12">
                  <label>Downpayment</label>
                  <input type="number" min="0" value="0" class="form-control" id="downpayment">
                </div>
                <div class="col-lg-6 col-sm-12">
                  <label>Discount (Optional)</label>
                  <input type="number" min="0" value="<?php echo $booking['rental_discount']; ?>" class="form-control" id="discount" name="discount" value="<?php echo $booking['rental_discount']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label>Driver name (Optional)</label>
                  <input type="text" class="form-control" name="driver_name" value="<?php echo set_value('driver_name'); ?>">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">
                  <label>Remarks (Optional)</label>
                  <input type="text" class="form-control" name="remarks" value="<?php echo set_value('remarks'); ?>">
                </div>
              </div>
              <div class="row pt-3">
                <div class="col">
                  <label>Multiple attachments (Receipts etc.)</label></br>
                  <input type="file" name="multiplefiles[]" multiple="">
                </div>
              </div>
              <div class="row pt-3">
                <div class="col col-lg-auto col-sm-12">
                    <button type="submit" class="btn btn-warning pull-center" id="btnSubmit"><i class="fa fa-floppy-o"></i> Save Edit</button>
                </div>
              </div>
              <!-- hidden fields -->
              <input type="hidden" name="clientId" value="<?php echo $this->session->userdata('booking_client_id'); ?>">
              <input type="hidden" name="start_date" value="<?php echo $this->session->userdata('booking_start_date'); ?>">
              <input type="hidden" name="number_of_days" value="<?php echo $this->session->userdata('booking_days'); ?>">
              <input type="hidden" name="add_driver" value="<?php echo $this->session->userdata('booking_add_driver'); ?>">
              <div class="d-none" id="forcarId" name="carId">
              <input type="hidden" name="carId" value="<?php echo $this->session->userdata('booking_client_id'); ?>">
              </div>
            </form>
          </div> <!-- end of modal body -->
      </div> <!-- end of modal content -->
    </div>
</div> <!-- end of modal popup -->


<script type="text/javascript">

  function thousands_separators(num)
  {
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
  }

  $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var file_path = button.data('filepath')
      var modal = $(this);
      var htmlText='<img style="width:100%;height=100%;object-fit:contain;" src="'+file_path+'">';
      document.getElementById("ImageContainer").innerHTML=htmlText;
  });

  $('#rentModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var selectedcarId = button.data('selectedcar').toString();
      var splitted = selectedcarId.split('|');
      var modal = $(this);
      var htmlTextForCarId='<input type="hidden" name="carId" value="'+splitted[0]+'">';
      document.getElementById("forcarId").innerHTML=htmlTextForCarId;
      if(splitted[3]){
        var driverCost = parseFloat(splitted[4])*parseFloat(splitted[2]);
      }else{
        var driverCost=0;
      }
      var htmlTextForTotalRent='₱'+thousands_separators(((parseFloat(splitted[1])*parseFloat(splitted[2]))+driverCost).toFixed(2));
      document.getElementById("for_total_rent").innerHTML=htmlTextForTotalRent;

  });

</script>
