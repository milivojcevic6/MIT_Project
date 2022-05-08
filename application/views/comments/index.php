<h2><?= $title;?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('comments/create/'.$restaurant['id']); ?>
<div class="form-group">
	<textarea class="form-control"  name="text" placeholder="Enter comment"></textarea>
</div>
<button type="submit" class="btn btn-secondary">Submit</button>
</form>


<?php if($comments) : ?>
	<p class="text-muted">Other comments</p>
	<?php foreach ($comments as $comment) : ?>
    <?php if($comment['RID']==$restaurant['id']) : ?>
				<div class="alert alert-secondary d-flex">
					<h5><?php echo $comment['text'] ?> </h5>
					<span class="ml-auto"><?php echo $comment['date'] ?></span>
					<!--[by user <strong><?php echo ${'comment_'.$comment['id']}; ?></strong>]-->
				</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php else : ?>
	<p>No comments to display</p>
<?php endif; ?>


