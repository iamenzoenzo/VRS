<title><?= $title ;?></title>
  <div class="row">
  	<div class="col">
  		<label>label</label>
  		<input readonly type="text" class="form-control" value="<?php echo $status['label']; ?>" name="label" placeholder="Enter setting name">
  	</div>
    <div class="col">
      <label>Bootstrap Background Color</label>
      <select disabled class="form-control" name="color">
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
	<a href="<?php echo base_url(); ?>status/edit/<?php echo $status['Id']; ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Edit</a>
  <a href="<?php echo base_url(); ?>status/delete/<?php echo $status['Id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this status?')"><i class="fa fa-trash-o"></i> Delete</a>
</div>
