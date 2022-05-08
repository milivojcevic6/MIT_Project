<div>
<div class="container-fluid padding padding2">
	<div class="row text-center padding">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
			<img src="<?php echo base_url(); ?>restaurant_images/<?php echo $restaurant['restaurant_image']; ?>" class="img-thumbnail">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
			<h2 class="card-title" style="font-family: 'Monospace';"><?php echo $restaurant['RName']; ?></h2>
			<p class="textAlign" style="color: dimgray;"> <i class="fa fa-map-marker-alt mr-2" aria-hidden="true"></i><?php echo $restaurant['RCity']; ?> <i class="fa fa-user ml-3" aria-hidden="true"></i> Owner: <?php echo ${'rest'.$restaurant['id']}; ?> </p>
			<?php if($this->session->userdata('role_id')==1 && $restaurant['user_id']==$this->session->userdata('user_id')) : ?>
			<div class="d-inline-block">
				<div>
					<?php echo form_open('restaurants/add_member/'.$restaurant['id'])?>
					<input type="submit" value="Add member" class="btn btn-info">
					</form>
				</div>
				<div>
					<?php echo form_open('restaurants/ratings/'.$restaurant['id'])?>
					<input type="submit" value="See ratings" class="btn btn-info">
					</form>
				</div>
			</div>
			<?php endif; ?>
			<div>
				<?php echo form_open('comments/create/'.$restaurant['id'])?>
				<input type="submit" value="Comment" class="btn btn-info">
				</form>
			</div>

		</div>
	</div>

</div>
</div>
<div>
<?php foreach ($staffMembers as $member): ?>
	<?php if ( $member['RID'] == $restaurant['id'] ) {?>
		<div class="card mb-3">
			<div class="card-header d-inline">
					<?php echo form_open('restaurants/delete_member/'.$member['SID'],
							array('class' => 'd-flex mb-0')); ?>
						<span class="justify-content-start">
							<i><?php echo $member['SName']; ?> <?php echo $member['SSurname']; ?>
							| Shift: <?php echo $member['Shift']; ?></i>
							<?php if($member['award_id']>0): ?>
								| <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award" viewBox="0 0 16 16">
								  <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/>
								  <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
								  </svg>
								<?php foreach ($awards as $award): ?><?php if($award['id']==$member['award_id']): ?>
									<?php echo $award['award'] ?><?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
						</span >
						<?php if($this->session->userdata('role_id')==1 && $restaurant['user_id']==$this->session->userdata('user_id')) :?>
							<input type="submit" value="Delete member" class="btn btn-sm btn-outline-danger ml-auto">
						<?php endif; ?>
					</form>
			</div>


			<div class="card-body d-flex">
				<div class="mx-auto">

					<ul class="list-group list-group-horizontal-sm flex-wrap ">
						<?php foreach ($categories as $category): ?>
						<?php if($category['id']<4):?>
							<li class="list-group-item d-inline mx-2 mb-2">
								<span class="d-flex mx-auto"><?php echo $category['category'] ?></span>
								<ul style="padding-inline-start:0;">
									<?php foreach ($ratings as $rating): ?>

												<li class="d-inline">
													<?php echo form_open_multipart('restaurants/create_rating/'.$member['SID'], array('class'=>'m-0 p-0 d-inline'))?>
													<input type="hidden" name="category" value="<?php echo $category['id'] ?>" class="btn btn-sm btn-secondary">
													<!--<input type="submit" name="rating" value="<?php echo $rating['rating'] ?>" class="btn btn-sm btn-secondary" style="background-image: url("<?php if(isset($rating['rating'])):?><?php echo base_url(); ?>images/green.png<?php else : ?><?php echo base_url(); ?>images/1371880-200.png<?php endif; ?>");">-->
													<a class="hover"><button type="submit" name="rating" value="<?php echo $rating['rating'] ?>">
														<img src="<?php if(isset($_POST["rating"])) :?><?php echo base_url(); ?>images/green.png<?php else : ?><?php echo base_url(); ?>images/1371880-200.png<?php endif; ?>"
															 width="20" />
													</button></a>
													</form>
												</li>

									<?php endforeach; ?>
								</ul>

							</li>
							<? elseif ($category['id']==4 && $member['role_id']==3): ?>
								<li class="list-group-item d-inline mx-2 mb-2">
									<span class="d-flex mx-auto"><?php echo $category['category'] ?></span>
									<ul style="padding-inline-start:0;">
										<?php foreach ($ratings as $rating): ?>

											<li class="d-inline">
												<?php echo form_open_multipart('restaurants/create_rating/'.$member['SID'], array('class'=>'m-0 p-0 d-inline'))?>
												<input type="hidden" name="category" value="<?php echo $category['id'] ?>" class="btn btn-sm btn-secondary">
												<!--<input type="submit" name="rating" value="<?php echo $rating['rating'] ?>" class="btn btn-sm btn-secondary" style="background-image: url("<?php if(isset($rating['rating'])):?><?php echo base_url(); ?>images/green.png<?php else : ?><?php echo base_url(); ?>images/1371880-200.png<?php endif; ?>");">-->
												<button type="submit" name="rating" value="<?php echo $rating['rating'] ?>">
													<img src="<?php if(isset($_POST["rating"])) :?><?php echo base_url(); ?>images/green.png<?php else : ?><?php echo base_url(); ?>images/1371880-200.png<?php endif; ?>" width="20" />
												</button>
												</form>
											</li>

										<?php endforeach; ?>
									</ul>

								</li>
						<?php endif; ?>

						<?php endforeach; ?>
						<?php if($this->session->userdata('role_id')>=1 && $this->session->userdata('role_id')<4): ?>
							<li class="list-group-item d-inline mx-2" style="background-color: #F8F8F8;">
								<span class="d-flex mx-auto">Average</span>
								<ul style="padding-inline-start:0;">
									<li class="d-inline">
										<?php echo ${'rating_of_'.$member['SID']} ?>
									</li>
								</ul>
							</li>
						<?php endif; ?>
					</ul>

				</div>


			</div>
		<?php if($this->session->userdata('role_id')==1 && $restaurant['user_id']==$this->session->userdata('user_id')) :?>
			<div class="card-footer text-muted">
				<div class="d-flex">
					<?php echo form_open_multipart('restaurants/give_award/'.$member['SID'], array('class'=>'mx-auto'))?>
					<?php foreach ($awards as $award): ?>
					<input type="radio" name="award" value="<?php echo $award['id'] ?>" class="mr-2"><label class="mr-3"><?php echo $award['award']?></label>
					<?php endforeach; ?>
					<input type="hidden" name="RID" value="<?php echo $member['RID'] ?>">
					<input type="hidden" name="user_id" value="<?php echo $member['user_id'] ?>">
					<input type="hidden" name="SName" value="<?php echo $member['SName'] ?>">
					<input type="hidden" name="SSurname" value="<?php echo $member['SSurname'] ?>">
					<input type="hidden" name="Shift" value="<?php echo $member['Shift'] ?>">
					<input type="hidden" name="slug" value="<?php echo $member['slug'] ?>">
					<input type="hidden" name="role_id" value="<?php echo $member['role_id'] ?>">
					<input type="submit" value="Award" class="btn btn-sm btn-secondary">
					</form>
				</div>
			</div>
		<?php endif; ?>
		</div>
	<? } ?>
<?php endforeach; ?>
</div>







