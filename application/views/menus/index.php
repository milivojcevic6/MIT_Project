<div class="container-fluid padding padding2">
	<div class="row text-center padding">
		<div class="col-4">
			<label for="start">Date:</label>

			<input type="date" id="start" name="trip-start"
				   value="2018-07-22"
				   min="2022-01-01" max="2022-12-31">
			<br>
			<label for="appt">Choose a time for your meeting:</label>

			<input type="time" id="appt" name="appt"
				   min="09:00" max="18:00" required>
			<br>
			<!--<button class="btn btn-primary my-4">Show menus</button>-->
			<a class="btn btn-secondary d-flex justify-content-center my-3 " href="<?php echo base_url(); ?>menus/create">Add menu</a>


		</div>
		<div class="col-6">
			<table class="table table-hover">
				<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Menu name</th>
					<th scope="col">price</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($menus as $menu): ?>
					<tr>
						<td><?php echo $menu['id'] ?></td>
						<td><?php echo $menu['name']; ?></td>
						<td><?php echo $menu['price']; ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>


	</div>
</div>
