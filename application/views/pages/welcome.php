<div class="container-fluid padding padding2">
	<div class="row text-center padding">
		<div class="col-6">
			<a href="<?php echo base_url(); ?>menus"><button class="btn btn-secondary col-12 mb-2">Daily menus</button></a>
			<a href="<?php echo base_url(); ?>orders"><button class="btn btn-secondary col-12 mb-2">Order preview</button></a>
			<?php if($this->session->userdata('role_id')==3) : ?>
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
				<button class="btn btn-secondary col-12 mb-2">
					<?php if($this->session->userdata('role_id')==3) : ?>
					Leave feedback
					<?else:?>
					See feedback
					<?endif;?>
				</button>
			</a>
			<?php if($this->session->userdata('role_id')==1) : ?><a href="<?php echo base_url(); ?>users/add_user"><button class="btn btn-secondary col-12 mb-2">Add student</button></a><?php endif; ?>
		</div>
		<div class="col-6">
			<img src="<?php echo base_url(); ?>images/emoji.png" width="50%">
			<h3>Welcome </h3><?php echo($this->session->userdata('student_number')); ?>
		</div>
	</div>
</div>
