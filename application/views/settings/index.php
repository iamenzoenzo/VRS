<title><?= $title; ?></title>
<div>
  <div class="row">
    <div class="col">
      <h2>Settings Page</h2>
    </div>
    <div class="col">
      <a href="<?php echo base_url(); ?>settings/create" class="btn float-right btn-primary">Add New Setting</a>
    </div>
  </div>
<div class="pt-2">
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Value</th>
      <th scope="col-1">Is Active</th>
      <th scope="col-3">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $counter=0;
      foreach($settings as $setting){
        $counter++;
        echo '<tr>';
        echo '<th scope="row">'.$counter.'</th>';
        echo '<td>'.$setting['name'].'</td>';
        echo '<td>'.$setting['value'].'</td>';
        echo '<td>'.($setting['Is_Active']==1 ? 'True' : 'False').'</td>';
        echo '
        <td>
        <a class="btn btn-warning" href="'.base_url().'settings/edit/'.$setting['Id'].'">Edit</a>
        <a class="btn btn-danger" href="'.base_url().'settings/delete/'.$setting['Id'].'">Delete</a>
        </td>';
        echo '</tr> ';
      }
    ?>

  </tbody>
</table>
</div>
</div>
