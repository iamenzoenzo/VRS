<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>&nbsp;</h3>
      <p>&nbsp;</p>
    </div>
    <div class="col-sm-4">
      <?php echo form_open('users/login'); ?>

						<h1 class="text-center"><?php echo $title; ?></h1>
						<div class="form-group">
							<input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Login</button>

			<?php echo form_close(); ?>
    </div>
    <div class="col-sm-4">
      <h3>&nbsp;</h3>
      <p>&nbsp;</p>

    </div>
  </div>
</div>
