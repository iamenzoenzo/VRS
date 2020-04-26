<title><?= $title ;?></title>

<div class="row">
  <div class="col mt-2">
    <h2><?= $title; ?></h2>
  </div>

  <div class="col mt-2 pull-right pr-3 col-lg-auto">
    <a href="<?php echo base_url(); ?>status/index" class="btn btn-info col-sm-12"><i class="fa fa-arrow-left"></i> Back to list</a>
  </div>
</div>

<?php echo form_open('status/update'); ?>
<input type="hidden" name="id" value="<?php echo $status['Id']; ?>">
  <div class="row">
  	<div class="col">
  		<label>label</label>
  		<input type="text" class="form-control" value="<?php echo $status['label']; ?>" name="label" placeholder="Enter setting name">
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
  <div class="row pt-3">
    <div class="col-2">
      <div class="checkbox">
        <label><input name="is_active_checkbox" <?php if($status['Is_Active']==1){echo 'checked';} ?> type="checkbox" >Is Active?</label>
      </div>
    </div>
  </div>
<div>
	<button type="submit" class="btn btn-warning"><i class="fa fa-floppy-o"></i> Save Update</button>
  <a href="<?php echo base_url()?>status/index" class="btn btn-danger"><i class="fa fa-ban"></i> Cancel</a>
</div>
</form>
