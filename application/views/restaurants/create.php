<h2><?= $title;?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('restaurants/create'); ?>
	<div class="form-group">
		<label for="exampleInputEmail1">Name</label>
		<input type="text" class="form-control" id="RName" name="RName" aria-describedby="RName" placeholder="Enter name">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">City</label>
		<input type="text" class="form-control" id="RCity" name="RCity" placeholder="Password">
	</div>
	<div class="form-group">
		<label >Upload Image</label>
		<input type="file" name="userfile" size="20">
	</div>
	<button type="submit" class="btn btn-secondary">Submit</button>
</form>
