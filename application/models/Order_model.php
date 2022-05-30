<?php

class Order_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_orders($id=FALSE){
		if($id === FALSE){
			$user_id = $this->session->userdata('user_id');
			$query=$this->db->get_where('orders', array('user_id'=> $user_id));
			return $query->result_array();
		}
		$query=$this->db->get_where('orders', array('id'=> $id));
		return $query->row_array();
	}

	public function create_order(){
		//if($this->session->userdata('role_id')==1)
		$user_id = $this->session->userdata('user_id');
		$salad = true;
		$soup = true;
		$fruit = true;
		if($this->input->post('salad')=="false") $salad = false;
		if($this->input->post('soup')=="false") $soup = false;
		if($this->input->post('fruit')=="false") $fruit = false;

		$data = array(
			'user_id' => $user_id,
			'menu_id' => $this->input->post('menu_id'),
			'drink_id' => $this->input->post('drink'),
			'size_id' => $this->input->post('size'),
			'salad' => $salad,
			'soup' => $soup,
			'fruit' => $fruit,
			'note' => $this->input->post('note'),
			'date' => $this->input->post('date')
			//'user_id' => $user_id
		);

		return $this->db->insert('orders', $data);
	}

	public function delete_order($id){
		$this->db->where('id', $id);
		$this->db->delete('orders');
		return true;
	}

}
