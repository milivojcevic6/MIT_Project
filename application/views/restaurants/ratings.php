<table class="table table-hover">
	<thead>
	<tr>
		<th scope="col">#rating</th>
		<th scope="col">Staff member</th>
		<th scope="col">Category</th>
		<th scope="col">Rating</th>
		<th scope="col">By user</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($ratings as $rating): ?>
		<tr>
			<td><?php echo $rating['ID'] ?></td>
			<td><?php echo $rating['SName']; ?></td>
			<td><?php echo $rating['category']; ?></td>
			<td><?php echo $rating['rating']; ?></td>
			<td><?php echo $rating['username']; ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>


