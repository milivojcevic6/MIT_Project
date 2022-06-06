

<div class="row">
	<div class="d-flex">
		<?php echo form_open_multipart('orders/statistics'); ?>
		<div class="form-group float-left ml-5">
			<label for="date">Date:</label>
			<input type="date" id="date" name="date"
				   value="2022-01-31"
				   min="2022-01-01" max="2022-12-31">
		</div>
		<button type="submit" class="btn btn-primary ml-3 float-right">Filter by date</button>
		</form>
	</div>
	<a href="<?php echo base_url(); ?>orders/statistics">
		<button class="btn btn-secondary ml-3">Clear filter</button>
	</a>

</div>
<row class="d-flex">
<div class="col-sm-12 col-lg-4" style="overflow: scroll; scroll-behavior: smooth; height: 300px;">
	<card>
		<div class="card-header">Menus</div>
	</card>
	<table class="table table-hover" >
		<thead>

		</thead>
		<tbody >

			<?php foreach ($counted_menus as $i => $value): ?>

				<tr>
					<td><?= $i;?></td><td><?= $value;?></td>
				</tr>

			<?php endforeach; ?>


		</tbody>
	</table>

</div>

<div class="col-sm-12 col-lg-8">
	<div >
		<card>
			<div class="card-header">Drinks</div>
		</card>
		<table class="table table-hover">
			<thead>
			<tr>
				<?php foreach ($counted_drinks as $i => $value): ?>

					<th scope="col"><?= $i;?></th>

				<?php endforeach; ?>
			</tr>
			</thead>
			<tbody>
			<tr>
				<?php foreach ($counted_drinks as $i => $value): ?>

					<td scope="col"><?= $value;?></td>

				<?php endforeach; ?>
			</tr>
			</tbody>
		</table>
	</div>

	<div>
		<card>
			<div class="card-header">Additional</div>
		</card>
		<table class="table table-hover">
			<thead>
			<tr>
				<th>Soups</th>
				<th>Salads</th>
				<th>Fruits</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><?= $cntSoups?></td>
				<td><?= $cntSalads?></td>
				<td><?= $cntFruits?></td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
</row>
