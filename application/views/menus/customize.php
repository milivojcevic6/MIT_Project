
<div class="d-flex">
	<div class="d-flex float-left justify-content-center align-items-center">
		<div>
			<h3>Menu name: <?= $menu_name;?>  </h3>
			<h3>Menu date: <?= $menu_date;?> </h3>
		</div>

	</div>
<img src="<?php echo base_url(); ?>2eat_images/noimage.jpg" width="200px" class="d-flex float-right mx-3">
</div>

<?php echo form_open_multipart('orders/create'); ?>

<div class="form-group">
	<input type="hidden" class="form-control" id="menu_id" name="menu_id" value="<?php echo $menu_id ?>" aria-describedby="menu_id" >
</div>
<div class="form-group">
	<input type="hidden" class="form-control" id="date" name="date" value="<?php echo $menu_date ?>" aria-describedby="menu_date" >
</div>
<div class="form-group">
	<label>Drink</label>
	<div class="form-control">
		<?php foreach ($drinks as $drink): ?>
			<input type="radio" name="drink" class="mr-1" value="<?php echo $drink['id'] ?>"><label class="mr-3"><?php echo $drink['name']?></label>
		<?php endforeach; ?>
	</div>
</div>
<div class="form-group">
	<label>Size</label>
	<div class="form-control">
		<?php foreach ($sizes as $size): ?>
			<input type="radio" name="size" class="mr-1" value="<?php echo $size['id'] ?>"><label class="mr-3"><?php echo $size['size']?></label>
		<?php endforeach; ?>
	</div>
</div>
<div class="form-group">
	<label>Soup</label>
	<div class="form-control">
		<input type="radio" name="soup" class="mr-1" value="true" checked> Yes
		<input type="radio" name="soup" class="mr-1" value="false"> No
	</div>
</div>
<div class="form-group">
	<label>Salad</label>
	<div class="form-control">
		<input type="radio" name="salad" class="mr-1" value="true" checked> Yes
		<input type="radio" name="salad" class="mr-1" value="false"> No
	</div>
</div>
<div class="form-group">
	<label>Fruit</label>
	<div class="form-control">
		<input type="radio" name="fruit" class="mr-1" value="true" checked> Yes
		<input type="radio" name="fruit" class="mr-1" value="false"> No
	</div>
</div>

<div class="form-group">
	<label>Note</label>
	<input type="text" class="form-control" id="note" name="note" aria-describedby="note" placeholder="Exclude ingredients">
</div>
<button type="submit" class="btn btn-secondary">Create order</button>
</form>
