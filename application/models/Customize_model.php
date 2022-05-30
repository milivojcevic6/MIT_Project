<?php
class Customize_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_drinks($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('drinks');
			return $query->result_array();
		}
		$query = $this->db->get_where('drinks', array('id' => $id));
		return $query->row_array();
	}

	public function get_sizes($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('size');
			return $query->result_array();
		}
		$query = $this->db->get_where('size', array('id' => $id));
		return $query->row_array();
	}
}
