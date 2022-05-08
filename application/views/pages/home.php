<!--SLIDES-->
<div id="slides" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>
	</ul>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="<?php echo base_url(); ?>images/finalSlide.jpg">
			<div class="carousel-caption">
				<h1 class="display-2">Restaurant review</h1>
				<h3>Rate a restaurant visit</h3>
				<a type="button" class="btn btn-outline-light btn-lg" href="<?php base_url() ?>restaurants">
					GET STARTED
				</a>
			</div>
		</div>
		<div class="carousel-item">
			<img src="<?php echo base_url(); ?>images/finalSlide2.jpg">
		</div>
		<div class="carousel-item">
			<img src="<?php echo base_url(); ?>images/finalSlide3.jpg">
		</div>
	</div>
</div>

<!--COMENT-->
<div class="container-fluid">
	<div class="row jumbotron">
		<div class="col-12">
			<p class="lead paddingBottom"> How was your last visit? Find the restaurant and let us know. Help the owners enhance their businesses, make your next visit better! </p>
		</div>
		<?php if(!$this->session->userdata('logged_in')): ?>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<a href="<?php echo base_url(); ?>users/login"><button type="button" class="btn btn-outline-secondary btn-lg ">Log in</button></a>
			<a href="<?php echo base_url(); ?>users/register"><button type="button" class="btn btn-outline-secondary btn-lg ">Register</button></a>
		</div>
		<?php endif; ?>
	</div>
</div>

<!--Welcome part-->
<div class="container-fluid padding" >
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-5">Make sure your next visit is perfect.</h1>
		</div>
		<hr class="my-4">
		<div class="col-12">
			<p class="lead"> Welcome to Karly's Stars, a web app where you can completely grade a restaurant, including a grade for the staff members and their behaviour.
			In a few steps, you can give a detailed feedback about your visit and help the managers in their work.</p>
		</div>
	</div>
</div>
<!--search exact restaurant-->
<hr class="my-4">
<div>
	<?php echo validation_errors(); ?>
	<?php echo form_open('restaurants/view/'.$restaurant_slug, array('class' => 'mb-0 mr-2')); ?>

	<div class="col-12">

		<div class="input-group md-form form-sm form-2 pl-0">
			<input class="form-control my-0 py-1 amber-border" name="search" type="text" placeholder="Search for a restaurant" aria-label="Search">
			<div class="input-group-append">
				<button class="input-group-text amber lighten-3"  type="submit" id="basic-text1"><i class="fas fa-search text-grey"
																									aria-hidden="true"></i></button>

			</div>
		</div>

	</div>
	</form>
</div>


