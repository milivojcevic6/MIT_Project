
<div class="col-12">
	<table class="table table-hover">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th>Date</th>
			<th scope="col">Menu name</th>
			<th scope="col">Notification</th>
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
						<td><?php echo $menu['day']; ?></td>
						<td><?php echo $menu['name']; ?></td>
					<?php endif; ?>
				<?php endforeach; ?>
				<td>Today is your last day to customize or delete the menu.</td>
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

