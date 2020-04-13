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
      <th scope="col-4">Label</th>
      <th scope="col">Is Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $counter=0;
      foreach($status as $stat){
        $counter++;
        echo '<tr>';
        echo '<th scope="row">'.$counter.'</th>';
        echo '<td>'.$stat['label'].'</td>';
        echo '<td>'.($stat['Is_Active']==1 ? 'True' : 'False').'</td>';
        echo '
        <td>
        <a class="btn btn-warning" href="'.base_url().'status/edit/'.$stat['Id'].'">Edit</a>
        <a class="btn btn-danger" href="'.base_url().'status/delete/'.$stat['Id'].'">Delete</a>
        </td>';
        echo '</tr> ';
      }
    ?>

  </tbody>
</table>
</div>
</div>
