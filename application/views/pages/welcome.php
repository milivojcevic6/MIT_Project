<div class="container-fluid padding padding2">
	<div class="row text-center padding">
		<div class="col-sm-12 col-lg-6 d-flex justify-content-center align-items-center">
			<div>
				<a href="<?php echo base_url(); ?>menus"><button class="btn btn-secondary col-12 mb-2">Daily menus</button></a>
				<?php if($this->session->userdata('role_id')==3) : ?>
					<a href="<?php echo base_url(); ?>orders"><button class="btn btn-secondary col-12 mb-2">Order preview</button></a>
					<a href="<?php echo base_url(); ?>orders/notifications"><button class="btn btn-secondary col-12 mb-2">Notifications</button></a>
				<? else:?>
					<a href="<?php echo base_url(); ?>orders/statistics"><button class="btn btn-secondary col-12 mb-2">Statistics</button></a>
				<?php endif; ?>
				<a href="<?php echo base_url(); ?>users/balance">
					<?php if($this->session->userdata('role_id')==3) : ?>
						<button class="btn btn-secondary col-12 mb-2">My balance</button>
					<? else: ?>
						<button class="btn btn-secondary col-12 mb-2">Top up</button>
					<? endif; ?>
				</a>
				<a href="<?php echo base_url(); ?>feedback">
					<button class="btn btn-secondary col-12">
						<?php if($this->session->userdata('role_id')==3) : ?>
							Leave feedback
						<?else:?>
							See feedback
						<?endif;?>
					</button>
				</a>
				<?php if($this->session->userdata('role_id')==1) : ?><a href="<?php echo base_url(); ?>users/add_user"><button class="btn btn-secondary col-12 mt-2">Add student</button></a><?php endif; ?>
			</div>



		</div>
		<div class="col-sm-12 col-lg-6 d-flex justify-content-center align-items-center border border-secondary" style="border-radius: 5px;" id="imgBig">
			<div>
				<img src="<?php echo base_url(); ?>images/hello.png" width="60%" >
				<h3>Welcome </h3><?php echo($this->session->userdata('student_number')); ?>
			</div>
		</div>
	</div>
</div>
