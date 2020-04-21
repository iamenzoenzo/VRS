<title><?= $title.' - '.$bookings['reference_number'] ;?></title>
<div class="row">
  <div class="col">
    <h2><?= $title ;?></h2>
  </div>
    <div class="float-right pl-3">
      <a href="<?php echo base_url()?>bookings/index" class="btn btn-primary">Back to bookings</a>
    </div>
</div>

<div class="row">
  <div class="col-lg-6 col-sm-12 mt-3">
    <div class="card">
  <div class="card-header">
    <h5>Booking Information <span class="p-1 text-white bg-<?php echo $bookings['bootstrap_bg_color'];?>"><?php echo $bookings['label'];?></span></h5>
  </div>
  <div class="card-body">
    <div class="row">
    	<div class="col">
        <label>Vehicle</label>
        <input readonly type="text" min="1" class="form-control" value="<?php echo $bookings['code_name'];?>">
    	</div>
      </div>
      <div class="row">
      <div class="col">
        <label>Client</label>
        <input readonly type="text" min="1" class="form-control" value="<?php echo $bookings['name'];?>">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label>Start Date</label>
        <input readonly type="text" min="1" class="form-control" value="<?php echo $bookings['start_date'];?>">
      </div>
      <div class="col">
        <label>End Date</label>
        <input readonly type="text" min="1" class="form-control" value="<?php echo $bookings['end_date'];?>">
      </div>
    </div>
      <div class="row">
        <div class="col">
          <label>Number of days</label>
          <input readonly type="text" min="1" class="form-control" value="<?php echo $bookings['number_of_days'];?>">
        </div>
      </div>
      <div class="row mt-2">
        <div class="col">
          <?php if($this->session->userdata('logged_in')): ?>
            <a href="<?php echo base_url(); ?>bookings/edit/<?php echo $bookings['BookingId']; ?>" class="btn btn-success">Edit</a>
            <a href="<?php echo base_url(); ?>bookings/delete/<?php echo $bookings['BookingId']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</a>
          <?php endif; ?>
        </div>
      </div>
    </div> <!-- end card body -->

  </div>
</div>
<div class="col-lg-6 col-sm-12 mt-3">
  <div class="card">
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



<!-- start of modal popup -->
<div class="modal fade bd-example-modal-xl" role="dialog" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
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

<div class="mt-3">
<h5>Attachments</h5>

<?php if(count($images)>0): ?>
<!-- start of carousel -->
<div id="carouselExampleIndicators" class="carousel slide border box-shadow text-center mt-3" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
    $counter=0;
    foreach ($images as $image) {

      echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$counter.'"'.($counter===1 ? 'class="active"' : ' ' ).'></li>';
      $counter++;
    }
    ?>
  </ol>
  <div class="carousel-inner">
    <?php
    $counter=1;
    foreach ($images as $image):?>
      <div class="carousel-item <?php echo ($counter===1 ? 'active' : ' ');?>">
        <a title="Click image to view full screen" data-toggle="modal" href="#exampleModal" data-whatever="<?php echo base_url().'assets/images/client_bookings_images/'.$image['file_name'];?>">
          <img style="width:100%;height:100%;object-fit: contain;" class="d-block" src="<?php echo base_url().'assets/images/client_bookings_images/'.$image['file_name'];?>">
        </a>
        <div class="carousel-caption d-none d-md-block">
        <h5><span class="shadow-sm bg-secondary rounded p-1 text-white">Click image to view full screen</span></h5>
        <p> <?php echo $image['file_name'];?></p>
      </div>
      </div>
      <?php $counter++; ?>
  <?php endforeach; ?>
  </div>
  <a class="carousel-control-prev shadow rounded" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only ">Previous</span>
  </a>
  <a class="carousel-control-next shadow rounded" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only bg-dark">Next</span>
  </a>
</div> <!-- end of carousel -->
</div>
<?php else:?>
  <p>No attachments to show</p>
<?php endif; //don't display containers if no images of client?>



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
