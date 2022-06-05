<?php
class Feedback_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_types()
	{
		$query = $this->db->get('reasons');
		return $query->result_array();
	}

	public function get_grades()
	{
		$query = $this->db->get('grades');
		return $query->result_array();
	}

	public function get_feedbacks(){
		$query = $this->db->get('feedback');
		return $query->result_array();
	}

	public function create_feedback(){
		$data = array(
			'regarding' => $this->input->post('regardingForm'),
			'grade' => $this->input->post('grade'),
			'text' => $this->input->post('feedbackText')
		);

		return $this->db->insert('feedback', $data);
	}
}
