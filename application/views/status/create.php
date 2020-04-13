<h2><?= $title ;?></h2>
<?php echo form_open('status/create'); ?>
  <div class="row">
  	<div class="col">
  		<label>Label</label>
  		<input type="text" class="form-control" name="label" placeholder="Enter status label">
  	</div>
  </div>
<div class="pt-3">
	<button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?php echo base_url()?>status/index" class="btn btn-danger">Cancel</a>
</div>
</form>
