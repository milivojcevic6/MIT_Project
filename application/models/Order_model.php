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

	public function get_notification_orders(){
		$orders = $this->get_orders();
		$today = date_create();
		$today_date = date_format($today,"Y-m-d");
		$deadline = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 2, date('Y')));
		$query = array();
		foreach ($orders as $order){
			if ($deadline== $order['date']){
				array_push($query, $order);
			}
		}
		return $query;

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

	public function get_filtered_orders(){
		$date = $this->input->post('date');
		$query=$this->db->get_where('orders', array('date'=> $date));
		//print_r($query->result_array());
		return $query->result_array();
	}

	public function get_orders_by_menu($menu_id){
		$query = $this->db->get_where('orders', array('menu_id' => $menu_id));
		return $query->result_array();
	}
}
