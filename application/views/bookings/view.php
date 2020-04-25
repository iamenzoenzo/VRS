<title><?= $title.' - '.$bookings['reference_number'] ;?></title>
<div class="row">
  <div class="col">
    <h2><?= $title ;?></h2>
    <a class="btn btn-info float-right" href="<?php echo base_url()?>bookings/index"><i class="fa fa-arrow-left"></i> Back to bookings</a>
  </div>

</div>

<div class="row">
  <div class="col-lg-6 col-sm-12 mt-3">
    <div class="card">
        <div class="card-header">
          <h5>Booking Information</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col text-center">
              <h1>₱<?php echo number_format((($bookings['number_of_days']*$bookings['rental_fee_current'])+($bookings['number_of_days']*$bookings['driver_fee_current'])-($bookings['rental_discount'])-($total_payments)),2);?></h1>
              <small>Unpaid Balance</small>
            </div>
          </div>
          <div class="card mt-3 p-4">
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <b>Reference #: </b>
              </div>
              <div class="col-lg-8 col-sm-12">
                <?php echo $bookings['reference_number'];?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <b>Booking Date: </b>
              </div>
              <div class="col-lg-8 col-sm-12">
                <?php echo date_format(date_create($bookings['created_date']),'F d, Y h:i A (l)');?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <b>Status: </b>
              </div>
              <div class="col-lg-8 col-sm-12">
                <?php echo $bookings['label'];?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <b>Total Cost: </b>
              </div>
              <div class="col-lg-8 col-sm-12">
                <span title="<?php echo 'Rental Cost: ₱'.number_format(($bookings['number_of_days']*$bookings['rental_fee_current']),2).'+ Driver Cost: ₱'.number_format(($bookings['number_of_days']*$bookings['driver_fee_current']),2);?>"><?php echo '₱'.number_format((($bookings['number_of_days']*$bookings['rental_fee_current'])+($bookings['number_of_days']*$bookings['driver_fee_current'])),2);?></span>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <b>Total Payment: </b>
              </div>
              <div class="col-lg-8 col-sm-12">
                <span><?php echo '₱'.number_format($total_payments,2);?></span>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <b>Discount: </b>
              </div>
              <div class="col-lg-8 col-sm-12">
                <?php echo '₱'.number_format($bookings['rental_discount'],2);?>
              </div>
            </div>
            </hr>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <b>Vehicle: </b>
              </div>
              <div class="col-lg-8 col-sm-12">
              <?php echo $bookings['car_description'].' ('.$bookings['plate_number'].')';?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <b>Start Date: </b>
              </div>
              <div class="col-lg-8 col-sm-12">
              <?php echo date_format(date_create($bookings['start_date']),'F d, Y (l)');?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <b>End Date: </b>
              </div>
              <div class="col-lg-8 col-sm-12">
              <?php echo date_format(date_create($bookings['end_date']),'F d, Y (l)');?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <b># of days: </b>
              </div>
              <div class="col-lg-8 col-sm-12">
              <?php echo $bookings['number_of_days'];?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <b>Add-on (Driver): </b>
              </div>
              <div class="col-lg-8 col-sm-12">
              <?php echo ($bookings['add_driver']!=0?'Yes':'No');?>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-12">
                <b>Driver Name: </b>
              </div>
              <div class="col-lg-8 col-sm-12">
              <?php echo (!empty($bookings['driver_name'])?$bookings['driver_name']:'N/A');?>
              </div>
            </div>
          </div>
            <div class="row mt-2">
              <div class="col">
                <?php if($this->session->userdata('logged_in')): ?>
                  <a href="<?php echo base_url(); ?>bookings/edit/<?php echo $bookings['BookingId']; ?>" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> Edit</a>
                  <a href="<?php echo base_url(); ?>bookings/delete/<?php echo $bookings['BookingId']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')"><i class="fa fa-trash-o"></i> Delete</a>
                <?php endif; ?>
              </div>
            </div>
          </div> <!-- end card body -->




  </div>
  <div class="card mt-3">
      <div class="card-header">
        <h5>Client Information</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5><?php echo $bookings['name'];?></h5>
            <span><?php echo $bookings['email_address'];?></span></br>
            <span><?php echo $bookings['contact_number'];?></span></br>
            <span><?php echo $bookings['address'];?></span>
          </div>
        </div>
      </div>
  </div>
</div>
<div class="col-lg-6 col-sm-12 mt-3">
  <div class="card">
    <div class="card-header">
      <h5>Payment logs</h5>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col text-center">
          <h1>₱<?php echo number_format($total_payments,2);?></h1>
          <small>Total Payments</small>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col">
          <a class="btn btn-primary float-right"data-toggle="modal" href="#paymentModal"><i class="fa fa-credit-card"></i> Add Payment</a>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col">
          <?php if(count($payments)>0):?>
              <?php foreach ($payments as $payment):?>
                <div class="alert alert-warning" role="alert">
                  <?php echo '᛫ Client paid ₱'.number_format($payment['amount'],2).'. <i>'.$payment['payment_remarks'].'</i> '.(!empty($payment['attachment_path'])?'(<a data-toggle="modal" href="#exampleModal" data-whatever="'.base_url().'assets/images/client_bookings_payments/'.$payment['attachment_path'].'">View attachment</a>)':'').'</br><small>'.'Added by '.$payment['fullname'].' on '.date_format(date_create($payment['created_date']),'F d, Y h:i A (l)').'</small>';?>
                </div>

              <?php endforeach;?>
          <?php else:?>
            <p>No payment logs to show</p>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
  <div class="card mt-3">
    <div class="card-header">
      <h5>Transaction logs</h5>
    </div>
    <div class="card-body">
      <?php if(count($logs)>0):?>
          <?php foreach ($logs as $log):?>
            <div class="alert alert-warning" role="alert">
              <b><?php echo $log['fullname'].'</b>: <i>'.$log['remarks'].'</i> </br><small>'.date_format(date_create($log['created_date']),'F d, Y h:i A (l)').'</small>';?>
            </div>

          <?php endforeach;?>
      <?php else:?>
        <p>No transaction logs to show</p>
      <?php endif;?>
    </div>
  </div>
</div>
  </div>

  <div class="row mt-3">
    <div class="col">
      <h5>Attachments</h5>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Filename</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php if(count($images)>0): ?>
            <?php $counter=0; foreach ($images as $image):?>
              <tr>
                <th scope="row"><?php $counter++;echo $counter; ?></th>
                <td><a data-toggle="modal" href="#exampleModal" data-whatever="<?php echo base_url().'assets/images/client_bookings_images/'.$image['file_name'];?>"><?php echo $image['file_name']; ?></a></td>
                <td class="text-center">
                  <a title="Delete attachment" href="<?php echo base_url()?>bookings/delete/<?php echo $image['Id'].'/'.$bookings['BookingId'];?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this attachment?')">Delete</a>
                </td>
              </tr>
            <?php endforeach;?>
          <?php else:?>
            <td colspan="3">No attachments to show...</td>
          <?php endif;?>
        </tbody>
      </table>
    </div>
  </div>



<!-- start of modal popup -->
<div class="modal fade bd-example-modal-md" role="dialog" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
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

<!-- start of modal popup -->
<div class="modal fade bd-example-modal-md" role="dialog" id="paymentModal" tabindex="-1"  aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="paymentModalLabel">Add Payment</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <?php echo form_open_multipart('bookings/addPayement'); ?>
            <input type="hidden" name="BookingId" value="<?php echo $bookings['BookingId']; ?>">
              <div class="row">
                <div class="col">
                  <label>Amount</label>
                  <input type="number" class="form-control" name="payment_amount" min="1" value="0">
                </div>
              </div>
              <div class="row mt-3">
                <div class="col">
                  <label>Remarks</label>
                  <input type="text" class="form-control" name="payment_remarks">
                </div>
              </div>
              <div class="row pt-3">
                <div class="col">
                  <label>Payment attachment</label></br>
                  <input type="file" name="paymentAttachment">
                </div>
              </div>
              <div class="row pt-3">
                <div class="col">
                  <input type="submit" value="Save" class=" btn btn-primary">
                </div>
              </div>
            </form>
          </div> <!-- end of modal body -->
      </div> <!-- end of modal content -->
    </div>
</div> <!-- end of modal popup -->

<script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever')
      var modal = $(this);
      //modal.find('.ImageContainer').text('Reserve a Unit ' + recipient)
      var htmlText='<img style="width:100%;height=100%;object-fit:contain;" src="'+recipient+'">';
      document.getElementById("ImageContainer").innerHTML=htmlText;
  });
</script>
