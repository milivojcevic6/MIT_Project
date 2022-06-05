<?php

class Feedbacks extends CI_Controller
{
	public function index()
	{
		if(!$this->session->userdata('logged_in')) redirect('users/login');

		$data['title'] = 'Feedback';

		$data['types'] = $this->feedback_model->get_types();
		$data['grades'] = $this->feedback_model->get_grades();
		$data['feedbacks'] = $this->feedback_model->get_feedbacks();

		$this->load->view('templates/header', $data);
		if($this->session->userdata('role_id')==3):
			$this->load->view('feedbacks/index', $data);
		else:
			$this->load->view('feedbacks/manager', $data);
		endif;
		$this->load->view('templates/footer', $data);
	}

	public function send_feedback(){
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		$this->feedback_model->create_feedback();
		redirect('feedback');
	}
}
