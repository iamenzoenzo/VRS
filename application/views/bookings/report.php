<title><?= $title; ?></title>

<?php echo form_open('bookings/report'); ?>
  <div class="row">
    <div class="col mt-2">
      <h2><?= $title; ?></h2>
    </div>
    <div class="col-lg-6">
      <div class="row">
        <div class="col mt-2">
          <input class="form-control col-lg-auto" name="start_date" type="date">
        </div>
        <div class="col mt-2">
          <input class="form-control col-lg-auto" name="end_date" type="date">
        </div>
        <div class="col mt-2">
          <button class="btn btn-outline-success col-lg-auto col-sm-12" type="submit"> <i class="fa fa-filter"></i> Filter</button>
        </div>
      </div>
    </div>
  </div>
</form>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col-4">Vehicle</th>
      <th scope="col" class="text-center">Days</th>
      <th scope="col" class="text-right">Total Income</th>
    </tr>
  </thead>
  <tbody>
    <?php $totalIncome=0;$counter=0; foreach ($bookings as $booking):?>
        <!--tr class='clickable-row' title="Click to view this booking" data-href="<?php echo base_url().'bookings/view/'.$booking['BookingId'];?>" -->
        <tr>
        <td><?php $totalIncome+=$booking['Income']; $counter++; echo $counter ;?></td>
        <td><?php echo $booking['code_name'].' <small>('.$booking['plate_number'].')</small>';?></td>
        <td class="text-center"><?php echo $booking['TotalDays'] ;?></td>
        <td class="text-right"><?php echo '₱'.number_format($booking['Income'],2) ;?></td>
        </tr>
    <?php endforeach;?>
        <tr>
          <td colspan="3" class="text-right"><b>Total Income</b></td>
          <td class="text-right"><b>₱<?php echo number_format($totalIncome,2) ;?></b></td>
        </tr>
    <?php if($counter==0):?>
      <tr><td colspan="4">No data to show</td></tr>
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
