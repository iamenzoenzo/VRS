<title><?= $title ;?></title>

<div class="row">
  <div class="col">
    <h2><?= $title ;?></h2>
  </div>
    <div class="float-right pl-3">
      <a href="<?php echo base_url()?>clients/index" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back to client list</a>
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
      <div class="row mt-3">
        <div class="col">
          <a title="Edit client information" href="<?php echo base_url()?>clients/edit/<?php echo $clients['Id']; ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Edit</a>
          <a title="Delete client information" href="<?php echo base_url()?>clients/delete/<?php echo $clients['Id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client?')"><i class="fa fa-trash-o"></i> Delete</a>
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
                    <td><a data-toggle="modal" href="#exampleModal" data-whatever="<?php echo base_url().'assets/images/client_images/'.$image['file_name'];?>"><?php echo $image['file_name']; ?></a></td>
                    <td class="text-center">
                      <a title="Delete attachment" href="<?php echo base_url()?>clientsphotos/delete/<?php echo $image['Id'].'/'.$clients['Id'];?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this attachment?')"><i class="fa fa-trash-o"></i>  Delete</a>
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
  </div>
</div>

<?php if(count($images)>0): ?>

  <!-- start of modal popup -->
  <div class="modal fade bd-example-modal-xl" role="dialog" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Image</h5>
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
<?php endif; //don't display containers if no images of client?>
