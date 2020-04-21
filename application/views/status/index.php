<title><?= $title; ?></title>
<div>
  <div class="row">
    <div class="col">
      <h2>Status List</h2>
    </div>
    <div class="col">
      <a href="<?php echo base_url(); ?>status/create" class="btn float-right btn-primary">Add New Status</a>
    </div>
  </div>
<div class="pt-2">
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Label</th>
      <th scope="col">Color</th>
      <th scope="col">Is Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $counter=0; foreach($status as $stat):?>
        <tr>
          <th scope="row"><?php $counter++; echo $counter;?></th>
          <td><?php echo $stat['label'];?></td>
          <td><?php echo $stat['bootstrap_bg_color'];?></td>
          <td><?php echo ($stat['Is_Active']==1 ? 'True' : 'False');?></td>
          <td>
            <a class="btn btn-info" href="<?php echo base_url().'status/view/'.$stat['Id'];$counter++;?>">View</a>
          </td>
        </tr>
    <?php endforeach; ?>
  </tbody>
  <?php if($counter==0):?>
    <tr><td colspan="5">No data to show</td></tr>
  <?php endif; ?>
</table>
</div>
</div>
