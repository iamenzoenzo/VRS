<h2><?= $title ;?></h2>
<?php echo form_open_multipart('clients/create'); ?>
  <div class="row">
  	<div class="col">
  		<label>Name</label>
  		<input type="text" class="form-control" name="name">
  	</div>
    <div class="col">
      <label>Address</label>
      <input type="text" class="form-control" name="address">
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Contact Number</label>
      <input type="text" class="form-control" name="contact_number">
    </div>
    <div class="col">
      <label>Email</label>
      <input type="email" class="form-control" name="email">
    </div>
  </div>
  <div class="row pt-2">
    <div class="col">
      <label>Multiple Attachments (Government IDs, etc.)</label></br>
  	  <input type="file" name="multiplefiles[]" multiple="">
    </div>
  </div>
<div class="pt-3">
	<button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?php echo base_url()?>clients/index" class="btn btn-danger">Cancel</a>
</div>
</form>
