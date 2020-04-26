<h2><?= $title ;?></h2>
<?php echo form_open_multipart('users/update'); ?>
<input type="hidden" name="id" value="<?php echo $users['id']; ?>">
  <div class="row">
  	<div class="col">
  		<label>First Name</label>
  		<input type="text" class="form-control" name="fname" value="<?php echo $users['firstname']; ?>" placeholder="Enter name">
  	</div>
    <div class="col">
      <label>Last Name</label>
      <input type="text" class="form-control" name="lname" value="<?php echo $users['lastname']; ?>" placeholder="Enter code name">
    </div>
  </div>
  <div class="row  pt-2">
    <div class="col">
      <label>Email</label>
      <input type="email" class="form-control" name="email" value="<?php echo $users['email']; ?>" placeholder="Ex. Vios">
    </div>
    <div class="col">
      <label>Username</label>
      <input type="text" class="form-control" name="username" value="<?php echo $users['username']; ?>" placeholder="Ex. Toyota">
    </div>
  </div>
  <div class="row  pt-2">
    <div class="col">
      <label>Password</label>
      <input type="password" class="form-control" name="password" readonly placeholder="*****">
    </div>
    <div class="col">
      <label>User Type</label>
      <select class="custom-select" name="user_type">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>
    </div>
  </div>

<div class="pt-3">
	<button type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Save Edit</button>
  <a href="<?php echo base_url()?>users/index" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
</div>
</form>
