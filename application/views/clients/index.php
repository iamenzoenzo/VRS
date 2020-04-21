<title><?= $title; ?></title>
<?php echo form_open('clients/index'); ?>
  <div class="row">
    <div class="col">
      <h2>Clients</h2>
    </div>
    <div class="col-lg-4">
      <div class="row">
        <div class="col">
          <input class="form-control" name="name_filter" value="<?= $filter;?>" type="search" placeholder="Search" aria-label="Search">
        </div class="col-lg-1">
        <div>
          <button class="btn btn-outline-success lg-12" type="submit">Search</button>
        </div>
      </div>
    </div>
      <div class="float-right pl-3">
        <a href="<?php echo base_url(); ?>clients/create" class="btn btn-primary">Add New Client</a>
      </div>
  </div>
</form>
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col-4">Name</th>
      <th scope="col-4">Contact Information</th>
      <th scope="col">Is Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $counter=0; foreach($clients as $client):?>
        <tr>
          <td><?php $counter++; echo $counter; ?></td>
          <td><?php echo $client['name']; ?></td>
          <td><?php echo $client['email_address'].'</br>#'.$client['contact_number'].'</br>'.$client['address']; ?></td>
          <td><?php echo ($client['Is_Active']==1 ? 'True' : 'False'); ?></td>
          <td>
          <a class="btn btn-info" href="<?php echo base_url().'clients/view/'.$client['Id']; ?>">View</a>
          <a class="btn btn-warning" href="<?php echo base_url().'clients/edit/'.$client['Id']; ?>">Edit</a>
          <a class="btn btn-danger" href="<?php echo base_url().'clients/delete/'.$client['Id']; $counter++; ?>">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
      <?php if($counter==0):?>
        <tr><td colspan="5">No data to show for '<?php echo $filter; ?>'</td></tr>
      <?php endif; ?>
  </tbody>
</table>
