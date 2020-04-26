<h2><?= $title ;?></h2>
<?php echo form_open('status/create'); ?>
  <div class="row">
  	<div class="col">
  		<label>Label</label>
  		<input type="text" class="form-control" name="label" placeholder="Enter status label">
  	</div>
    <div class="col">
      <label>Bootstrap Background Color</label>
      <select class="form-control" name="color">
        <option value="primary">Blue (Primary)</option>
        <option value="secondary">Gray (Secondary)</option>
        <option value="success">Green (Success)</option>
        <option value="danger">Red (Danger)</option>
        <option value="warning">Yellow (Warning)</option>
        <option value="info">Light Blue (Info)</option>
      </select>
    </div>
  </div>
<div class="pt-3">
	<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Submit</button>
  <a href="<?php echo base_url()?>status/index" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
</div>
</form>
