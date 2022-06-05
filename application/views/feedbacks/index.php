<div class="container-fluid padding padding2">
	<?php echo form_open_multipart('feedbacks/send_feedback'); ?>
	<div class="form-group">
		<label for="regardingForm">Feedback regarding:</label>
		<select class="form-control" id="regardingForm" name="regardingForm">
			<?php foreach ($types as $type): ?>
				<option value="<?php echo $type['id'] ?>"><?= $type['name']; ?></option>
			<? endforeach;?>
		</select>
	</div>
	<!--<div class="form-group">
		<label for="exampleFormControlSelect2">How satisfy are you? (1 is lowest and 5 biggers grade)</label>
		<select multiple class="form-control" id="gradeForms">
			<?php foreach ($grades as $grade): ?>
				<option><?= $grade['grade']; ?></option>
			<? endforeach;?>
		</select>
		</select>
	</div>-->
	<div class="form-group">
		<label>Grade: </label>
		<div class="form-control">
			<?php foreach ($grades as $grade): ?>
				<input type="radio" id="grade" name="grade" class="mr-1" value="<?php echo $grade['id'] ?>"><label class="mr-3"><?php echo $grade['grade']?></label>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="form-group">
		<label for="feedbackText">Your feedback:</label>
		<textarea class="form-control" id="feedbackText" name="feedbackText" rows="5"></textarea>
	</div>
	<button type="submit" class="btn btn-secondary">Submit</button>
	</form>
</div>
