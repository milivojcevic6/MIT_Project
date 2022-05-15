<?php echo form_open('users/login'); ?>
		<div class="row">
			<div class="col-md-6">
				<h1 class="text-center font-italic"><?php echo $title; ?></h1>
				<div class="form-group">
					<input type="text" name="student_number" class="form-control" placeholder="Enter student number" required autofocus>
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
				</div>
				<div class="">
					<button type="submit" class="btn btn-primary col-12 py-1">Login</button>
				</div>
				<div class="font-weight-light font-italic d-flex">
					<p class="mt-5 mx-auto">Log in to 2Eat and order your meal!</p>
				</div>
			</div>
			<div class="col-md-6">
				<img src="<?php echo base_url(); ?>images/login_img.png" class="img-thumbnail ">
				<!--<img src="<?php echo base_url(); ?>images/vote_stars_5.gif" class="img-fluid">-->
			</div>
		</div
<?php echo form_close(); ?>
