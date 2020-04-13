<title><?= $title; ?></title>

  <div class="row">
    <div class="col">
      <h2>Clients</h2>
    </div>
    <div class="col-lg-4">
      <div class="row">
        <div class="col">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search">
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

<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col-4">Name</th>
      <th scope="col-4">Contact Information</th>
      <th scope="col-4">Address</th>
      <th scope="col">Is Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $counter=0;
      foreach($clients as $client){
        $counter++;
        echo '<tr>';
        echo '<th scope="row">'.$counter.'</th>';
        echo '<td>'.$client['name'].'</td>';
        echo '<td>Email address: <i>'.$client['email_address'].'</i></br># '.$client['contact_number'].'</td>';
        echo '<td>'.$client['address'].'</td>';
        echo '<td>'.($client['Is_Active']==1 ? 'True' : 'False').'</td>';
        echo '
        <td>
        <a class="btn btn-warning" href="'.base_url().'clients/edit/'.$client['Id'].'">Edit</a>
        <a class="btn btn-danger" href="'.base_url().'clients/delete/'.$client['Id'].'">Delete</a>
        </td>';
        echo '</tr> ';
      }
    ?>

  </tbody>
</table>
