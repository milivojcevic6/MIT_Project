<div class="container-fluid padding padding2">
	<form>
		<div class="form-group">
			<label for="exampleFormControlSelect1">Feedback regarding:</label>
			<select class="form-control" id="regardingForm">
				<option>Food</option>
				<option>Price</option>
				<option>Dinner Lady</option>
				<option>Manager</option>
				<option>General</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleFormControlSelect2">How satisfy are you? (1 is lowest and 5 biggers grade)</label>
			<select multiple class="form-control" id="gradeForms">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Your feedback:</label>
			<textarea class="form-control" id="feedbackText" rows="3"></textarea>
		</div>
		<button type="submit" class="btn btn-secondary">Submit</button>
	</form>
</div>
