<title><?= $title; ?></title>

<?php echo form_open('bookings/index'); ?>
  <div class="row">
    <div class="col">
      <h2><?= $title; ?></h2>
    </div>
    <div class="col-lg-4">
      <div class="row">
        <div class="col">
          <input class="form-control" name="filter" value="<?= $filter;?>" type="search" placeholder="Search" aria-label="Search">
        </div class="col-lg-1">
        <div>
          <button class="btn btn-outline-success lg-12" type="submit"><i class="fa fa-search"></i> Search</button>
        </div>
      </div>
    </div>
      <div class="float-right pl-3">
        <a href="<?php echo base_url(); ?>bookings/create" class="btn btn-primary"><i class="fa fa-plus"></i> Add Booking</a>
      </div>
  </div>
</form>



<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col-4">Reference#</th>
      <th scope="col-4">Client</th>
      <th scope="col-4">Vehicle</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col"># of days</th>
      <th scope="col">Total Rent</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $counter=0; foreach ($bookings as $booking):?>
        <!--tr class='clickable-row' title="Click to view this booking" data-href="<?php echo base_url().'bookings/view/'.$booking['BookingId'];?>" -->
        <tr>
        <td><?php $counter++; echo $counter ;?></td>
        <td><?php echo $booking['reference_number'] ;?></td>
        <td><?php echo '<b>'.$booking['name'].'</b></br><small>'.$booking['email_address'].'</br>#'.$booking['contact_number'].'</br>'.$booking['address'].'</small>' ;?></td>
        <td><?php echo '<b>'.$booking['code_name'].'</b></br><small>Plate#: '.$booking['plate_number'].'</br>Rent per day: ₱'.number_format($booking['RentPerDay'],2).'</small>' ;?></td>
        <td><?php echo $booking['start_date'] ;?></td>
        <td><?php echo $booking['end_date'] ;?></td>
        <td><?php echo $booking['number_of_days'] ;?></td>
        <td><?php echo '₱'.number_format(($booking['number_of_days'] * $booking['driver_fee_current'])+($booking['number_of_days'] * $booking['rental_fee_current'])-($booking['rental_discount']),2) ;?></td>
        <td class="bg-<?php echo $booking['bootstrap_bg_color'];?>"><?php echo $booking['label'] ;?></td>
        <td>
          <a class="btn btn-info" href="<?php echo base_url().'bookings/view/'.$booking['BookingId'];?>"><i class="fa fa-eye"></i> View</a>
        </td>
        </tr>
    <?php endforeach;?>

    <?php if($counter==0):?>
      <tr><td colspan="9">No data to show</td></tr>
    <?php endif;?>
  </tbody>
</table>

<script type="text/javascript">
  jQuery(document).ready(function($) {
      $(".clickable-row").click(function() {
          window.location = $(this).data("href");
      });
  });

</script>
