<title><?= $title; ?></title>
<div class="row">
  <div class="col">
    <h2><?= $title; ?></h2>
  </div>
  <?php if($this->session->userdata('logged_in') && $this->session->userdata('is_admin')):?>
    <div class="float-right pl-3">
      <a href="<?php echo base_url(); ?>cars/create" class="btn btn-primary">Add New Vehicle</a>
    </div>
  <?php endif;?>
</div>
<div class="album pb-5">
    <div class="container">
      <div class="row">
        <?php foreach($cars as $car) : ?>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a data-toggle="modal" href="#exampleModal" title="Click image to view full image" data-whatever="<?php echo base_url()."assets/images/cars_images/".$car['file_name']; ?>">
                <img class="img-fluid img-thumbnail d-block" style="width:400px;height:300px;object-fit: cover;" src="<?php echo base_url()."assets/images/cars_images/".$car['file_name']; ?>">
              </a>
              <!--img class="img-fluid img-thumbnail" height="100%" width="100%" src="<?php echo base_url()."assets/images/cars_images/".$car['car_image_path']; ?>" -->
              <div class="card-body">
              <h4><?php echo $car['manufacturer']." ".$car['model']." (".$car['year'].")"; ?></h4>
                <p class="card-text">With a maximum capacity of <b><?php echo $car['Capacity']; ?> persons</b> including driver. Drive now for a minimum rent of <b>₱<?php echo number_format($car['RentPerDay'],2); ?></b> for 24 hours.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <?php if($this->session->userdata('logged_in')): ?>
                      <a class="btn btn-sm btn-outline-secondary" href="<?php echo base_url()?>cars/view/<?php echo $car['Id']?>" class="btn btn-info" role="button">View</a>
                    <?php endif; ?>
                      <a class="btn btn-sm btn-outline-secondary" href="<?php echo base_url()?>pages/estimate/<?php echo $car['Id']?>" class="btn btn-info" role="button">Estimate Rent</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
    </div>
  </div>
</div>

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


<script type="text/javascript">
  $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever')
      var modal = $(this);
      //modal.find('.ImageContainer').text('Reserve a Unit ' + recipient)
      var htmlText='<img style="width:100%;height=100%;object-fit:contain;" src="'+recipient+'">';
      document.getElementById("ImageContainer").innerHTML=htmlText;
  });

  $('#btnViewFullScreen').on('click', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever2')

      //modal.find('.ImageContainer').text('Reserve a Unit ' + recipient)
      var htmlText='<img style="width:100%;height=100%;object-fit:cover;" src="'+recipient+'">';
      document.getElementById("ImageContainer").innerHTML=htmlText;

  });

</script>
