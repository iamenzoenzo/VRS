<h2><?= $title ;?></h2>
<?php if(!empty(validation_errors())):?>
<div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo validation_errors(); ?></div>
<?php endif;?>
<?php echo form_open_multipart('users/create'); ?>
  <div class="row">
  	<div class="col">
  		<label>First Name</label>
  		<input type="text" class="form-control" name="fname" value="<?php echo set_value('fname'); ?>">
  	</div>
    <div class="col">
      <label>Last Name</label>
      <input type="text" class="form-control" name="lname" value="<?php echo set_value('lname'); ?>">
    </div>
  </div>
  <div class="row  pt-2">
    <div class="col">
      <label>Email</label>
      <input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>">
    </div>
    <div class="col">
      <label>Username</label>
      <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>">
    </div>
  </div>
  <div class="row  pt-2">
    <div class="col">
      <label>Password</label>
      <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>">
    </div>
    <div class="col">
      <label>User Type</label>
      <select class="custom-select" name="user_type" value="<?php echo set_value('user_type'); ?>">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>
    </div>
  </div>

<div class="pt-3">
	<button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?php echo base_url()?>users/index" class="btn btn-danger">Cancel</a>
</div>
</form>
