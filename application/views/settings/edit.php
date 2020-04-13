<h2><?= $title ;?></h2>
<?php echo form_open('settings/update'); ?>
<input type="hidden" name="id" value="<?php echo $settings['Id']; ?>">
  <div class="row">
  	<div class="col">
  		<label>Name</label>
  		<input readonly type="text" class="form-control" value="<?php echo $settings['name']; ?>" name="name" placeholder="Enter setting name">
  	</div>
    <div class="col">
      <label>Value</label>
      <input type="text" class="form-control" value="<?php echo $settings['value']; ?>" name="value" placeholder="Enter setting value">
    </div>
  </div>
  <div class="row pt-3">
    <div class="col-2">
      <div class="checkbox">
        <label><input name="is_active_checkbox" type="checkbox" <?php if($settings['Is_Active']==1){echo 'checked';} ?>>Active?</label>
      </div>
    </div>
  </div>
<div>
	<button type="submit" class="btn btn-warning">Save Update</button>
  <a href="<?php echo base_url()?>/settings/index" class="btn btn-danger">Cancel</a>
</div>
</form>
