<html>
        <head>

			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>2Eat</title>
			<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>edit/css/bootstrap.min.css">
			<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>edit/css/bootstrap.min.css.map">
			<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>edit/css/bootstrap-grid.css.map">
			<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>edit/css/bootstrap-grid.min.css">
			<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>edit/css/bootstrap-grid.min.css.map">
			<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>edit/css/bootstrap-reboot.css.map">
			<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>edit/css/bootstrap-reboot.min.css">
			<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>edit/css/bootstrap-reboot.min.css.map">
			<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>edit/css/css.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
			<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
			<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>



        </head>
        <body>

		<nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3 py-1">
			<div class="container">
				<a class="navbar-brand" href="<?php echo base_url(); ?>" ><img src="<?php echo base_url(); ?>images/2Eat.png" width="150px" ></a>
				<?= $title;?>
				<!--<img src="<?php echo base_url(); ?>/images/name1.png">-->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse d-sm-inline-flex justify-content-end" id="navbarResponsive">
					<ul class="navbar-nav flex-grow p-0">
						<!--<li class="nav-item">
							<a class="nav-link text-dark" href="<?php echo base_url(); ?>">Home</a>
						</li>
							<li class="nav-item">
								<a class="nav-link text-dark" href="<?php echo base_url(); ?>restaurants">Restaurants</a>
							</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="<?php echo base_url(); ?>about">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="<?php echo base_url(); ?>contact">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-dark" href="<?php echo base_url(); ?>help">Help</a>
						</li>-->
						<?php if(!$this->session->userdata('logged_in')): ?>
							<li class="nav-item">
								<a class="nav-link text-dark" href="<?php echo base_url(); ?>users/login">Log in</a>
							</li>
						<?php endif;?>
						<?php if($this->session->userdata('logged_in')): ?>
							<li class="nav-item d-inline">
								<?php echo($this->session->userdata('student_number')); ?>
								<a class="nav-link text-dark d-inline" href="<?php echo base_url(); ?>users/logout">Log out</a>
							</li>
						<?php endif;?>
					</ul>
				</div>

			</div>
		</nav>
		<div class="container">
				<!--<div>
					<h1><?php if (isset($title)) echo $title; ?></h1>
				</div>-->
			<!--Flash mess-->
			<?php if($this->session->flashdata('user_registered')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('restaurant_created')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('restaurant_created').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('member_created')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('member_created').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('member_deleted')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('member_deleted').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('restaurant_deleted')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('restaurant_deleted').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('user_logged')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('login_failed')): ?>
				<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('rating_created')): ?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('rating_created').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('logged_out')): ?>
				<?php echo '<p class="alert alert-secondary">'.$this->session->flashdata('logged_out').'</p>'; ?>
			<?php endif; ?>
			<?php if($this->session->flashdata('search_invalid')): ?>
				<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('search_invalid').'</p>'; ?>
			<?php endif; ?>
