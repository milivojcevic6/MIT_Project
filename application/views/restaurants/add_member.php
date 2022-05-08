<h2><?= $title;?></h2>

<!--<?php echo validation_errors(); ?>-->
<?php echo form_open('restaurants/add_member/'.$restaurant['id']); ?>
<input type="hidden" name="id" value="<?php echo $restaurant['id']; ?>">
<div class="form-group">
	<label for="name">Name</label>

	<input type="text" class="form-control" id="name" name="SName" aria-describedby="SName" placeholder="Enter name of member">
</div>
<div class="form-group">
	<label for="surname">Surname</label>
	<input type="text" class="form-control" id="surname" name="SSurname" placeholder="Enter surname of member">
</div>
<div class="form-group">
	<label for="role_id">Role</label>
	<div class="form-control">
			<input type="radio" name="role_id" class="mr-1" value="2"><label class="mr-3">Waiter</label>
		    <input type="radio" name="role_id" class="mr-1" value="3"><label class="mr-3">Chef</label>
	</div>
</div>
<div class="form-group">
	<label for="shift">Shift</label>
	<input type="text" class="form-control" id="shift" name="Shift" placeholder="Enter working shift of member">
</div>
<button type="submit" class="btn btn-secondary">Submit</button>
</form>
