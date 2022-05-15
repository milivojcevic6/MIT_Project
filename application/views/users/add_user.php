<div style="background-color: #fafafa; border-radius: 5px;">
	<h1 class="mx-auto font-weight-lighter font-italic"><?= $title; ?></h1>
</div>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('users/add_user'); ?>
<div class="row">
	<div class="col-md-6">

		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" placeholder="Name">
		</div>
		<div class="form-group">
			<label>Surname</label>
			<input type="text" class="form-control" name="surname" placeholder="Surname">
		</div>
		<div class="form-group">
			<label>Role</label>
			<div class="form-control">
				<?php foreach ($roles as $role): ?>
					<input type="radio" name="role" class="mr-1" value="<?php echo $role['id'] ?>"><label class="mr-3"><?php echo $role['role']?></label>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Student number</label>
			<input type="text" class="form-control" name="student_number" placeholder="Student Number">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Password">
		</div>
		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
		</div>

	</div>
</div>
<div class="d-flex">
	<button type="submit" class="btn btn-primary ml-auto">Submit</button>
</div>
<?php echo form_close();?>
