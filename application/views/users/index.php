<title><?= $title; ?></title>
<div>
  <?php echo form_open('users/index'); ?>
    <div class="row">
      <div class="col">
        <h2>Clients</h2>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col">
            <input class="form-control" name="users_filter" value="<?= $filter;?>" type="search" placeholder="Search user name" aria-label="Search">
          </div class="col-lg-1">
          <div>
            <button class="btn btn-outline-success lg-12" type="submit">Search</button>
          </div>
        </div>
      </div>
        <div class="float-right pl-3">
          <a href="<?php echo base_url(); ?>users/create" class="btn btn-primary">Add New User</a>
        </div>
    </div>
  </form>
<div class="pt-2">
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col-1">User Type</th>
      <th scope="col-3">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php $counter=0; foreach($users as $user):?>
        <tr>
          <th scope="row"><?php $counter++; echo $counter;?></th>
          <td><?php echo $user['firstname'].' '.$user['lastname'];?></td>
          <td><?php echo $user['email'];?></td>
          <td><?php echo $user['user_type'];?></td>
          <td>
          <a class="btn btn-info" href="<?php echo base_url().'users/view/'.$user['id'];$counter++?>">View</a>
          </td>
        </tr>
      <?php endforeach;?>
      <?php if($counter==0):?>
        <tr><td colspan="5">No data to show for '<?php echo $filter?>'</td></tr>
      <?php endif; ?>
  </tbody>
</table>
</div>
</div>
