<title><?= $title; ?></title>
<div>
  <div class="row">
    <div class="col">
      <h2>Users List</h2>
    </div>
    <div class="col">
      <a href="<?php echo base_url(); ?>users/create" class="btn float-right btn-primary">Add New User</a>
    </div>
  </div>
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
    ?>

  </tbody>
</table>
</div>
</div>
