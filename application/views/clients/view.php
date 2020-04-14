<title><?= $title ;?></title>

<div class="row">
  <div class="col">
    <h2><?= $title ;?></h2>
  </div>
    <div class="float-right pl-3">
      <a href="<?php echo base_url()?>clients/index" class="btn btn-primary">Back to client list</a>
    </div>
</div>

<div class="card">
  <div class="card-header">
    <h5><?php echo $clients['name']; ?> Information</h5>
  </div>
  <div class="card-body">
      <div class="row">
        <div class="col">
          <span><?php echo 'Contact Number: '.$clients['contact_number']; ?></span>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <span class="font-italic">Email:<?php echo $clients['email_address']; ?></span>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <span class="text-muted">Address:<?php echo $clients['address']; ?></span>
        </div>
      </div>
  </div>
</div>

<?php if(count($images)>0): ?>

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
    $counter=0;
    foreach ($images as $image) {
      $counter++;
      echo '
      <div class="carousel-item '.($counter===1 ? 'active' : ' ' ).'">
        <a data-toggle="modal" href="#exampleModal" data-whatever="'.base_url().'assets/images/client_images/'.$image['file_name'].'">
          <img style="width:100%;height:100%;object-fit: cover;" class="d-block" src="'.base_url().'assets/images/client_images/'.$image['file_name'].'">
        </a>
        <div class="carousel-caption d-none d-md-block">
        <h5>Click image to view full screen</h5>
        <p>'.$image['file_name'].'</p>
      </div>
      </div>
      ';
    }
    ?>
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

<script type="text/javascript">

$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever')
    var modal = $(this);
    //modal.find('.ImageContainer').text('Reserve a Unit ' + recipient)
    var htmlText='<img style="width:100%;height=100%;object-fit:cover;" src="'+recipient+'">';
    document.getElementById("ImageContainer").innerHTML=htmlText;
});

</script>
<?php endif; ?>
