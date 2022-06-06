<div class="container-fluid padding padding2">
	<div class="row text-center padding">
		<div class="col-sm-12 col-lg-4">

			<?php echo form_open_multipart('menus'); ?>
			<div class="form-group">
				<label for="date">Date:</label>
				<input type="date" id="date" name="date"
					   value="2022-01-31"
					   min="2022-01-01" max="2022-12-31">
			</div>
			<button type="submit" class="btn btn-primary w-100">Filter by date</button>
			</form>

			<a href="<?php echo base_url(); ?>menus" class="btn btn-secondary d-flex justify-content-center mt-3 ">Clear fliter</a>
			<br>
			<!--<label for="appt">Choose a time for your meeting:</label>

			<input type="time" id="appt" name="appt"
				   min="09:00" max="18:00" required>
			<br>
			<button class="btn btn-primary my-4">Show menus</button>-->
			<?php if($this->session->userdata('role_id')==1) : ?>
			<a class="btn btn-secondary d-flex justify-content-center my-3 " href="<?php echo base_url(); ?>menus/create">Add menu</a>
			<?php endif; ?>

		</div>
		<div class="col-sm-12 col-lg-8" style="height: 500px; overflow: scroll;">
			<table class="table table-hover">
				<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Menu name</th>
					<th scope="col">price</th>
					<?php if($this->session->userdata('role_id')==1) : ?>
					<th scope="col">Delete</th>
					<?php endif; ?>
					<th scope="col">Customize</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($menus as $menu): ?>
					<tr>
						<td><?php echo $menu['id'] ?></td>
						<td><?php echo $menu['name']; ?></td>
						<td><?php echo $menu['price']; ?></td>
						<?php if($this->session->userdata('role_id')==1) : ?>
						<td>
							<?php echo form_open('menus/delete/'.$menu['id'], array(
									'class' => 'mb-0 mr-2'
							)); ?>
							<input type="submit" value="Delete" class="btn btn-danger">
							</form>
						</td>
						<?php endif; ?>
						<td>
							<?php echo form_open_multipart('menus/customize/'.$menu['id'], array(
									'class' => 'mb-0 mr-2'
							)); ?>
							<input type="submit" value="Customize" class="btn btn-success">
							</form>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>


	</div>
</div>
