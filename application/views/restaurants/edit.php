<h2><?= $title;?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open('restaurants/update'); ?>
<input type="hidden" name="id" value="<?php echo $restaurant['id']; ?>">
<div class="form-group">
	<label for="exampleInputEmail1">Name</label>
	<input type="text" class="form-control" id="RName" name="RName" aria-describedby="RName" placeholder="Enter name" value="<?php echo $restaurant['RName']; ?>">
</div>
<div class="form-group">
	<label for="exampleInputPassword1">City</label>
	<input type="text" class="form-control" id="RCity" name="RCity" placeholder="Enter city" value="<?php echo $restaurant['RCity']; ?>">
</div>
<button type="submit" class="btn btn-secondary">Submit</button>
</form>
