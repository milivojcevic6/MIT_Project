<h2><?= $title;?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('menus/create'); ?>
<div class="form-group">
	<label for="name">Menu name</label>
	<input type="text" class="form-control" id="name" name="name" aria-describedby="RName" placeholder="Enter name">
</div>
<div class="form-group">
	<label for="date">Date:</label>
	<input type="date" id="date" name="date"
		   value="2022-08-05"
		   min="2022-01-01" max="2022-12-31">
</div>
<div class="form-group">
	<label for="price">Price</label>
	<input type="text" class="form-control" id="price" name="price" placeholder="Password">
</div>
<div class="form-group">
	<label >Upload Image</label>
	<input type="file" name="userfile" size="20">
</div>
	<button type="submit" class="btn btn-secondary">Submit</button>
</form>
