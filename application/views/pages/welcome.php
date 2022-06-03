<div class="container-fluid padding padding2">
	<div class="row text-center padding">
		<div class="col-6">
			<a href="<?php echo base_url(); ?>menus"><button class="btn btn-secondary col-12 mb-2">Daily menus</button></a>
			<a href="<?php echo base_url(); ?>orders"><button class="btn btn-secondary col-12 mb-2">Order preview</button></a>
			<a href="<?php echo base_url(); ?>orders/notifications"><button class="btn btn-secondary col-12 mb-2">Notifications</button></a>
			<button class="btn btn-secondary col-12 mb-2">My balance</button>
			<button class="btn btn-secondary col-12 mb-2">Leave feedback</button>
			<?php if($this->session->userdata('role_id')==1) : ?><a href="<?php echo base_url(); ?>users/add_user"><button class="btn btn-secondary col-12 mb-2">Add student</button></a><?php endif; ?>
		</div>
		<div class="col-6">
			<img src="<?php echo base_url(); ?>images/emoji.png" width="50%">
			<h3>Welcome </h3><?php echo($this->session->userdata('student_number')); ?>
		</div>
	</div>
</div>
