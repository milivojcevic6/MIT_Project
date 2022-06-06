<!--<div>
	<div>
		<h5>Regarding.type</h5>
	</div>
	<div>
		<h5>Grade</h5>
	</div>
	<div>
		<p>Text............................................</p>
	</div>
</div>

<?php foreach ($types as $type): ?>
	<div class="card mb-2">
		<h5 class="card-header"><?= $type['name']; ?></h5>
		<ul class="list-group list-group-flush">
			<?php foreach ($feedbacks as $feedback): ?>
				<?php if ($feedback['regarding']==$type['id']): ?>
					<li class="list-group-item">
						<span class="alert-light"><?= $feedback['grade']; ?> </span><?= $feedback['text']; ?>
					</li>
				<?php endif;?>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endforeach; ?>-->

<ul class="nav nav-tabs" id="myTab" role="tablist">
	<?php foreach ($types as $type): ?>
		<li class="nav-item">
			<a class="nav-link <?php if($type['id']==1): ?>active<?php endif;?>" id="<?php echo $type['id'] ?>-tab" data-toggle="tab" href="#<?php echo $type['id'] ?>" role="tab" aria-controls="<?php echo $type['id'] ?>" aria-selected="true"><?= $type['name']; ?></a>
		</li>
	<?php endforeach; ?>
</ul>
<div class="tab-content mb-5" id="myTabContent">
	<?php foreach ($types as $type): ?>
	<div class="tab-pane fade show <?php if($type['id']==1): ?>active<?php endif;?>" id="<?php echo $type['id'] ?>" role="tabpanel" aria-labelledby="<?php echo $type['id'] ?>-tab">
		<table class="table table-hover mt-2">
			<thead>
			<tr>
				<th scope="col" class="text-muted small">Grade</th>
				<th scope="col" class="text-muted small">Feedback</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($feedbacks as $feedback): ?>
				<?php if ($feedback['regarding']==$type['id']):?>
				<tr>
					<td>
						<?php foreach ($grades as $grade): ?>
						<?php if($feedback['grade']==$grade['id']): ?> <?= $grade['grade'];?><?php endif;?>
						<?php endforeach;?>
					</td>
					<td><?= $feedback['text'];?></td>
				</tr>
				<?php endif; ?>
			<?php endforeach;?>
			</tbody>
		</table>

	</div>
<?php endforeach; ?>
</div>
