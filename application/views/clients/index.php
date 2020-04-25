<title><?= $title; ?></title>
<?php echo form_open('clients/index'); ?>
  <div class="row">
    <div class="col mt-2">
      <h2><?= $title; ?></h2>
    </div>
    <div class="col-lg-6 mt-2">
      <div class="row pr-3">
        <div class="col">
          <input class="form-control col-lg-auto" name="name_filter" value="<?= $filter;?>" type="search" placeholder="Search" aria-label="Search">
        </div>
        <div>
          <button class="btn btn-outline-success col-lg-auto" type="submit"> <i class="fa fa-search"></i>Search</button>
        </div>
      </div>
    </div>
    <div class="col mt-2 pull-right pr-3 col-lg-auto">
      <a href="<?php echo base_url(); ?>clients/create" class="btn btn-primary col-sm-12"><i class="fa fa-plus"></i> Add New Client</a>
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
      <th class="text-center" scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $counter=0; foreach($clients as $client):?>
        <tr>
          <td><?php $counter++; echo $counter; ?></td>
          <td><?php echo $client['name']; ?></td>
          <td><?php echo $client['email_address'].'</br>#'.$client['contact_number'].'</br>'.$client['address']; ?></td>
          <td><?php echo ($client['Is_Active']==1 ? 'True' : 'False'); ?></td>
          <td class="text-center">
          <a class="btn btn-info" href="<?php echo base_url().'clients/view/'.$client['Id']; ?>"><i class="fa fa-eye"></i> View</a>
          </td>
        </tr>
      <?php endforeach; ?>
      <?php if($counter==0):?>
        <tr><td colspan="5">No data to show for '<?php echo $filter; ?>'</td></tr>
      <?php endif; ?>
  </tbody>
</table>
