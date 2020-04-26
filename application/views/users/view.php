<title><?= $title ;?></title>
<div class="row">
  <div class="col">
    <h2><?= $title; ?></h2>
  </div>
    <div class="float-right pl-3">
      <a href="<?php echo base_url(); ?>users/index" class="btn btn-primary">Back to list</a>
    </div>
</div>

  <div class="row">
  	<div class="col">
  		<label>First Name</label>
  		<input type="text" class="form-control" name="fname" readonly value="<?php echo $users['firstname']; ?>">
  	</div>
    <div class="col">
      <label>Last Name</label>
      <input type="text" class="form-control" name="lname" readonly value="<?php echo $users['lastname']; ?>">
    </div>
  </div>
  <div class="row  pt-2">
    <div class="col">
      <label>Email</label>
      <input type="email" class="form-control" name="email" readonly value="<?php echo $users['email']; ?>">
    </div>
    <div class="col">
      <label>Username</label>
      <input type="text" class="form-control" name="username" readonly value="<?php echo $users['username']; ?>">
    </div>
  </div>
  <div class="row  pt-2">
    <div class="col">
      <label>Password</label>
      <input type="password" class="form-control" name="password" readonly value="*****">
    </div>
    <div class="col">
      <label>User Type</label>
      <input type="text" class="form-control" name="user_type" readonly value="<?php echo $users['user_type']; ?>">
    </div>
  </div>

<div class="pt-3">
  <a href="<?php echo base_url()?>users/edit/<?php echo $users['id']; ?>" class="btn btn-warning">Edit</a>
  <a href="<?php echo base_url(); ?>users/delete/<?php echo $users['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
</div>
