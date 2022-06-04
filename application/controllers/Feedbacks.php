<?php

class Feedbacks extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Feedback';

		$this->load->view('templates/header', $data);

		if($this->session->userdata('role_id')==3):
			$this->load->view('feedbacks/index', $data);
		else:
			$this->load->view('feedbacks/manager', $data);
		endif;

		$this->load->view('templates/footer', $data);
	}
}
