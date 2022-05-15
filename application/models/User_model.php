<?php

class User_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_roles()
	{
		$query = $this->db->get('roles');
		return $query->result_array();
	}

	public function add_user($enc_password)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'surname' => $this->input->post('surname'),
			'student_number' => $this->input->post('student_number'),
			'role_id' => $this->input->post('role'),
			'balance' => 0,
			'password' => $enc_password
		);
		return $this->db->insert('users', $data);
	}

	public function login($student_number, $password)
	{
		$this->db->where('student_number', $student_number);
		$this->db->where('password', $password);

		$result = $this->db->get('users');

		if ($result->num_rows() == 1) {
			print_r($result->row(0));
			$result = array(
				'id' => $result->row(0)->id,
				'role' => $result->row(0)->role_id
			);
			return $result;
		} else {
			return false;
		}
	}

	public function check_username_exists($student_number)
	{
		$query = $this->db->get_where('users', array('student_number' => $student_number));
		return empty($query->row_array()) ? true : false;
	}

	/*public function check_email_exists($email)
	{
		$query = $this->db->get_where('users', array('email' => $email));
		return empty($query->row_array()) ? true : false;
	}*/

	public function get_user_comment($id)
	{
		$result = $this->db->get_where('users', array('id' => $id));
		print_r($result);
		return $result['name'];

	}

	public function get_user($id)
	{
		$this->db->where('id', $id);

		$result = $this->db->get('users');

		if ($result->num_rows() == 1) {
			return $result->row(0)->name . ' ' . $result->row(0)->surname;
		} else return "";
	}
}
