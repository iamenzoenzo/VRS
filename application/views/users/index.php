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
    <?php
    $counter=0;
      foreach($users as $user){
        $counter++;
        echo '<tr>';
        echo '<th scope="row">'.$counter.'</th>';
        echo '<td>'.$user['firstname'].' '.$user['lastname'].'</td>';
        echo '<td>'.$user['email'].'</td>';
        echo '<td>'.$user['user_type'].'</td>';
        echo '
        <td>
        <a class="btn btn-warning" href="'.base_url().'users/edit/'.$user['id'].'">Edit</a>
        <a class="btn btn-danger" href="'.base_url().'users/delete/'.$user['id'].'">Delete</a>
        </td>';
        echo '</tr> ';
      }
      if($counter==0){
        echo '<tr><td colspan="5">No data to show for '.$filter.'</td></tr>';
      }
    ?>

  </tbody>
</table>
</div>
</div>
