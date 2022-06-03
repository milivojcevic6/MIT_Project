<?php

class Feedbacks extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Feedback';

		$this->load->view('templates/header', $data);
		$this->load->view('feedbacks/index', $data);
		$this->load->view('templates/footer', $data);
	}
}
