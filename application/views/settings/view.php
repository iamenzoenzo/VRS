<title><?= $title ;?></title>
<div class="row">
  <div class="col">
    <h2><?= $title; ?></h2>
  </div>
    <div class="float-right pl-3">
      <a href="<?php echo base_url(); ?>settings/index" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back to list</a>
    </div>
</div>

  <div class="row">
  	<div class="col">
  		<label>Name</label>
  		<input readonly type="text" class="form-control" value="<?php echo $settings['name']; ?>" name="name" placeholder="Enter setting name">
  	</div>
    <div class="col">
      <label>Type</label>
      <select disabled="disabled" name="type" class="form-control">
        <option>-</option>
        <option <?php echo $settings['type']=='contact'?'selected="selected"':''; ?> value="contact">Contact</option>
        <option <?php echo $settings['type']=='faq'?'selected="selected"':''; ?> value="faq">FAQ</option>
        <option <?php echo $settings['type']=='system'?'selected="selected"':''; ?> value="system">System</option>
        <option <?php echo $settings['type']=='other'?'selected="selected"':''; ?> value="other">Other</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Value</label>
      <textarea readonly class="form-control" name="value" placeholder="Enter setting value" rows="10" cols="45">
        <?php echo $settings['value']; ?>
      </textarea>
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
	<a href="<?php echo base_url()?>settings/edit/<?php echo $settings['Id']; ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Edit</a>
  <a href="<?php echo base_url(); ?>settings/delete/<?php echo $settings['Id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this setting?')"><i class="fa fa-trash-o"></i> Delete</a>
</div>
