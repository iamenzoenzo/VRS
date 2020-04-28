<title><?= $title; ?></title>

  <?php echo form_open('settings/index'); ?>
    <div class="row">
      <div class="col">
        <h2><i class="fa fa-cog"></i> System Settings</h2>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col">
            <input class="form-control" name="setting_filter" value="<?= $filter;?>" type="search" placeholder="Search setting name" aria-label="Search">
          </div class="col-lg-1">
          <div>
            <button class="btn btn-outline-success lg-12" type="submit">Search</button>
          </div>
        </div>
      </div>
        <div class="float-right pl-3">
          <a href="<?php echo base_url(); ?>settings/create" class="btn btn-primary">Add New Setting</a>
        </div>
    </div>
  </form>
<div>
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Value</th>
      <th scope="col">Type</th>
      <th scope="col">Is Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $counter=0; foreach($settings as $setting):?>
        <tr>
          <td><?php $counter++; echo $counter;?></td>
          <td><?php echo $setting['name'];?></td>
          <td><?php echo $setting['value'];?></td>
          <td><?php echo $setting['type'];?></td>
          <td><?php echo ($setting['Is_Active']==1 ? 'True' : 'False');?></td>
          <td>
            <a class="btn btn-info" href="<?php echo base_url().'settings/view/'.$setting['Id'];$counter++;?>">View</a>
          </td>
        </tr>
    <?php endforeach; ?>
    <?php if($counter==0):?>
      <tr><td colspan="6">No data to show for '<?php echo $filter;?></td></tr>
    <?php endif;?>

  </tbody>
</table>
</div>
