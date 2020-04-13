<h2><?= $title ;?></h2>
<?php echo form_open('settings/create'); ?>
  <div class="row">
  	<div class="col">
  		<label>Name</label>
  		<input type="text" class="form-control" name="name" placeholder="Enter setting name">
  	</div>
    <div class="col">
      <label>Value</label>
      <input type="text" class="form-control" name="value" placeholder="Enter setting value">
    </div>
  </div>
<div class="pt-3">
	<button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?php echo base_url()?>settings/index" class="btn btn-danger">Cancel</a>
</div>
</form>
