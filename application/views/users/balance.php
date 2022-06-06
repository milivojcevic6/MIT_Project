

<div class="row">
	<?php if($this->session->userdata('role_id')==3) : ?>
	<div class="col-sm-12 col-lg-5">
		<div class="card h-100">

			<h5 class="card-header">My Balance</h5>
			<div class="card-body">
				<div>
					<div class="d-flex">
						<h5 class="card-title w-50" >User: </h5>
						<p class="card-text w-50 ml-2" ><?= $user_studentnum;?></p>
					</div>
					<div class="d-flex">
						<h5 class="card-title w-50">Balance: </h5>
						<p class="card-text w-50 ml-2"><?= $user_balance;?></p>
					</div>
				</div>

			</div>
		</div>
	</div>
	<? else: ?>
		<div class="col-sm-12 col-lg-5" >
			<div class="card h-100">

				<h5 class="card-header">Find student's balance</h5>
				<div class="card-body">
					<div class="d-inline">
						<?php echo form_open_multipart('users/balance/'.$user_studentnum); ?>

						<div class="form-group d-flex">
							<input type="text" id="student_number" name="student_number"
								   placeholder="Enter student number" class="w-50">
							<button type="submit" class="btn btn-primary w-50 ml-2">Find Student</button>
						</div>

						</form>
					</div>
					<div>
						<div class="d-flex">
							<h5 class="card-title w-50" >User: </h5>
							<p class="card-text w-50 ml-2" ><?= $user_studentnum;?></p>
						</div>
						<div class="d-flex">
							<h5 class="card-title w-50">Balance: </h5>
							<p class="card-text w-50 ml-2"><?= $user_balance;?></p>
						</div>
					</div>

				</div>
			</div>
		</div>
	<? endif; ?>
	<div class="col-sm-12 col-lg-7">
		<div class="card h-100">
			<h5 class="card-header">Top up account</h5>
			<div class="card-body">
				<div class="d-flex justify-content-center align-items-center mb-3">
					<?php if($this->session->userdata('role_id')==3) : ?>
						<input type="radio">Credit card
						<input type="radio" class="ml-2">Paypal
					<? endif; ?>
				</div>

				<div class="d-flex justify-content-center align-items-center">
					<?php echo form_open_multipart('users/top_up/'.$user_studentnum); ?>
					<div class="form-group d-flex">
						<input type="text" id="balance" name="balance"
							   placeholder="Enter value" class="w-50">

						<button type="submit" class="btn btn-primary w-50 ml-2">Top up</button>
					</div>

					</form>
				</div>

			</div>
		</div>
	</div>
</div>

