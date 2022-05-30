
<div class="col-12">
	<table class="table table-hover">
		<thead>
		<tr>
			<th scope="col">#Order</th>
			<th scope="col">Name</th>
			<th scope="col">Price</th>
			<th scope="col">Date</th>
			<th scope="col">Delete</th>
			<th scope="col">Customize</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($orders as $order): ?>
			<tr>
				<td><?php echo $order['id'] ?></td>
				<?php foreach ($menus as $menu): ?>
						<?php if ($order['menu_id']==$menu['id']): ?>
						<td><?php echo $menu['name']; ?></td>
						<td><?php echo $menu['price']; ?></td>
						<?php endif; ?>
				<?php endforeach; ?>
				<td><?php echo $order['date']; ?></td>
				<td>
					<?php echo form_open('orders/delete/'.$order['id'], array(
						'class' => 'mb-0 mr-2'
					)); ?>
					<input type="submit" value="Delete" class="btn btn-danger">
					</form>
				</td>
				<td>
					<?php echo form_open_multipart('orders/update/'.$order['id'], array(
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
