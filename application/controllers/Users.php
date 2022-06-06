<?php

class Users extends CI_Controller{
	public function add_user(){
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		$data['title'] = 'Add user';
		$data['roles'] = $this->user_model->get_roles();
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('surname', 'Surname', 'required');
		$this->form_validation->set_rules('student_number', 'Student number', 'required|callback_check_username_exists');
		//$this->form_validation->set_rules('role', 'Role', 'required');
		//$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

		if($this->form_validation->run()===FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('users/add_user', $data);
			$this->load->view('templates/footer', $data);

		}else{
			//Encrypt password
			$enc_password = md5($this->input->post('password'));
			$this->user_model->add_user($enc_password);
			redirect('/');
			//$this->session->set_flashdata('user_registered', 'You are now registered and can log in');
			//redirect('welcome');
		}
	}

	public function login(){
		$data['title'] = 'Log in';
		$this->form_validation->set_rules('student_number', 'Student number', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run()===FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer', $data);

		}else{
			$student_number = $this->input->post('student_number');
			$password = md5($this->input->post('password'));
			$array = $this->user_model->login($student_number, $password);
			if($array){
				$user_data = array(
					'user_id' => $array['id'],
					'student_number' => $student_number,
					'logged_in' => true,
					'role_id' => $array['role']
				);
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('user_logged', 'You are now loged in. Welcome back!');
				redirect('');
			}
			else{
				$this->session->set_flashdata('login_failed', 'There was a mistake in your input. Try logging in again.');
				redirect('users/login');
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('student_number'); //TODO add role
		$this->session->set_flashdata('login_failed', 'You are logged out.');

		redirect('users/login');
	}

	public function check_username_exists($username){
		$this->form_validation->set_message('check_username_exists', 'That username is taken. Try again.');
		return $this->user_model->check_username_exists($username) ? true : false;
	}

	public function balance($student_number=null){
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		if($this->session->userdata('role_id')==3){
			$data['user_balance'] = $this->user_model->get_user_balance($this->session->userdata('user_id'));
			$data['user_studentnum'] = $this->user_model->get_user_studentnum($this->session->userdata('user_id'));
		}
		else if($student_number==null){
			$data['user_balance'] = $this->user_model->get_user_balance_of();
			$data['user_studentnum'] = $this->user_model->get_user_studentnum_of();
		}
		else{
			$data['user_balance'] = $this->user_model->get_user_balance_of($student_number);
			$data['user_studentnum'] = $this->user_model->get_user_studentnum_of($student_number);
		}

		$data['title'] = 'Balance';
		$this->load->view('templates/header', $data);
		$this->load->view('users/balance', $data);
		$this->load->view('templates/footer', $data);
	}

	/*public function balance_of($student_number=null){
		if($student_number==null){
			$data['user_balance'] = $this->user_model->get_user_balance_of();
			$data['user_studentnum'] = $this->user_model->get_user_studentnum_of();
		}
		else{
			$data['user_balance'] = $this->user_model->get_user_balance_of($student_number);
			$data['user_studentnum'] = $this->user_model->get_user_studentnum_of($student_number);
		}

		$data['title'] = 'Balance';
		$this->load->view('templates/header', $data);
		$this->load->view('users/balance', $data);
		$this->load->view('templates/footer', $data);
	}*/

	public function top_up($student_num){
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		$this->user_model->update_balance($student_num);
		redirect('users/balance/'.$student_num);
	}

	/*public function check_email_exists($email){
		$this->form_validation->set_message('logged_out', 'That username is taken. Try again.');
		return $this->user_model->check_email_exists($email) ? true : false;
	}*/
}
