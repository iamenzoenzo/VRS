<title><?= $title; ?></title>

<?php echo form_open('users/index'); ?>
  <div class="row">
    <div class="col mt-2">
      <h2><i class="fa fa-users"></i> <?= $title; ?></h2>
    </div>
    <div class="col-lg-6 mt-2">
      <div class="row pr-3">
        <div class="col">
          <input class="form-control col-lg-auto" name="users_filter" value="<?= $filter;?>" type="search" placeholder="Search" aria-label="Search">
        </div>
        <div>
          <button class="btn btn-outline-success col-lg-auto" type="submit"> <i class="fa fa-search"></i>Search</button>
        </div>
      </div>
    </div>
    <div class="col mt-2 pull-right pr-3 col-lg-auto">
      <a href="<?php echo base_url(); ?>users/create" class="btn btn-primary col-sm-12"><i class="fa fa-plus"></i> Add User</a>
    </div>
  </div>
</form>

<div class="pt-2">
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Username</th>
      <th>User Type</th>
      <th class="text-center">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $counter=0; foreach($users as $user):?>
        <tr>
          <th><?php $counter++; echo $counter;?></th>
          <td><?php echo $user['firstname'].' '.$user['lastname'];?></td>
          <td><?php echo $user['username'];?></td>
          <td><?php echo $user['user_type'];?></td>
          <td class="text-center">
          <a class="btn btn-info" href="<?php echo base_url().'users/view/'.$user['id'];$counter++?>"><i class="fa fa-eye"></i> View</a>
          </td>
        </tr>
      <?php endforeach;?>
      <?php if($counter==0):?>
        <tr><td colspan="5">No data to show for '<?php echo $filter?>'</td></tr>
      <?php endif; ?>
  </tbody>
</table>
</div>
