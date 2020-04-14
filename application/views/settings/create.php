<h2><?= $title ;?></h2>
<?php echo form_open('settings/create'); ?>
  <div class="row">
  	<div class="col">
  		<label>Name</label>
  		<input type="text" class="form-control" name="name" placeholder="Enter setting name">
  	</div>
    <div class="col">
      <label>Type</label>
      <select name="type" class="form-control">
        <option>-</option>
        <option value="contact">Contact</option>
        <option value="faq">FAQ</option>
        <option value="system">System</option>
        <option value="other">Other</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <label>Value</label>
      <textarea class="form-control" name="value" placeholder="Enter setting value" rows="10" cols="30"></textarea>
    </div>
  </div>
<div class="pt-3">
	<button type="submit" class="btn btn-primary">Submit</button>
  <a href="<?php echo base_url()?>settings/index" class="btn btn-danger">Cancel</a>
</div>
</form>
