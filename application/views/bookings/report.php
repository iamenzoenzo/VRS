<title><?= $title; ?></title>

  <div class="row">
    <div class="col mt-2">
      <h2><?= $title; ?></h2>
    </div>
    <div class="col-lg-auto">
      <div class="row">
        <div class="col mt-2">
          <a data-toggle="modal" href="#filterModal" class="btn btn-outline-success col-lg-auto col-sm-12 d-print-none"> <i class="fa fa-filter"></i> Filter</a>
          <button class="btn btn-outline-success col-lg-auto col-sm-12 d-print-none" onclick="window.print()"> <i class="fa fa-print"></i> Print</button>
        </div>

      </div>
    </div>
  </div>
<small>*Booking data from <?php echo '<u><i>'.$this->session->userdata('report_start_date').'</i></u> to <u><i>'.$this->session->userdata('report_end_date').'</i></u>';?></small>
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
    <?php if($counter==0):?>
      <tr><td colspan="4">No data to show</td></tr>
    <?php else:?>
      <tr>
        <td colspan="3" class="text-right"><b>Total Income</b></td>
        <td class="text-right"><b>₱<?php echo number_format($totalIncome,2) ;?></b></td>
      </tr>
    <?php endif;?>
  </tbody>
</table>

<!-- start of modal popup -->
<div class="modal fade bd-example-modal-md" role="dialog" id="filterModal" tabindex="-1"  aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="filterModalLabel">Filter report</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('bookings/filter'); ?>
              <div class="row">
                <div class="col">
                  <select class="form-control col-lg-auto" name="report_car_id">
                    <option value="0">-</option>
                    <?php foreach ($cars as $car):?>
                      <option <?php echo ($this->session->userdata('report_car_id')==$car['Id']?'selected="selected"':''); ?> value="<?php echo $car['Id']; ?>"><?php echo $car['car_description']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-sm-12 mt-2">
                  <input class="form-control" name="report_start_date" type="date" value="<?php echo $this->session->userdata('report_start_date')?>">
                </div>
                <div class="col-lg-6 col-sm-12 mt-2">
                  <input class="form-control" name="report_end_date" type="date" value="<?php echo $this->session->userdata('report_end_date')?>">
                </div>
              </div>
              <div class="row">
                <div class="col text-center">
                  <button class="btn btn-outline-success col-lg-auto col-sm-12 mt-2 hidden-print" type="submit"> <i class="fa fa-filter"></i> Filter</button>
                  <a href="<?php echo base_url(); ?>bookings/filter_clear" class="btn btn-outline-warning col-lg-auto col-sm-12 mt-2"><i class="fa fa-times"></i> Clear Filter</a>
                </div>
              </div>
            </form>
          </div> <!-- end of modal body -->
      </div> <!-- end of modal content -->
    </div>
</div> <!-- end of modal popup -->


<script type="text/javascript">
$('#filterModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever')
    var modal = $(this);
    //modal.find('.ImageContainer').text('Reserve a Unit ' + recipient)
    //var htmlText='<img style="width:100%;height=100%;object-fit:contain;" src="'+recipient+'">';
    //document.getElementById("ImageContainer").innerHTML=htmlText;
});

</script>
