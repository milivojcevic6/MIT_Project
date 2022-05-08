<!--<h2><?= $title?></h2>-->


<!--search exact restaurant-->
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

<?php foreach ($restaurants as $restaurant) : ?>
	<div class="card mb-3" >
		<div class="row no-gutters">
			<div class="col-md-3">
				<img src="<?php echo base_url(); ?>restaurant_images/<?php echo $restaurant['restaurant_image']; ?>" width="200px" class="mx-3">
			</div>
			<div class="col-md-9">
				<div class="card-body centered">
					<p class="card-title lead" style="font-family: 'Monospace'; font-size: 25px;"><em><?php echo $restaurant['RName']; ?></em></p>
					<span style="color: dimgray;"><i class="fa fa-map-marker-alt mr-2" aria-hidden="true"></i><?php echo $restaurant['RCity']; ?>
					<i class="fa fa-user ml-3" aria-hidden="true"></i> Owner: <?php echo ${'rest'.$restaurant['id']}; ?></span>
				</div>

				<div class="m-0 d-flex justify-content-end">
					    <p class="mb-0"><a class="btn btn-info mb-0 mr-2" href="<?php echo site_url('restaurants/'.$restaurant['slug']); ?>">Rate</a></p>
						<?php if($this->session->userdata('role_id')==1 && $restaurant['user_id']==$this->session->userdata('user_id')) : ?>
						<a class="btn btn-info mr-2" href="<?php echo base_url(); ?>restaurants/edit/<?php echo $restaurant['slug']; ?>">Edit</a>
						<?php echo form_open('restaurants/delete/'.$restaurant['id'], array(
								'class' => 'mb-0 mr-2'
						)); ?>
						<input type="submit" value="Delete" class="btn btn-danger">
						<?php endif; ?>
						</form>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?php if($this->session->userdata('role_id')==1) : ?>
<a class="btn btn-secondary d-flex justify-content-center mb-3 " href="<?php echo base_url(); ?>restaurants/create/<?php echo $restaurant['slug']; ?>">Add new restaurant</a>
<?php endif; ?>
