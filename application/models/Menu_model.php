<?php
class Menu_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_menus($menu_id=FALSE){
		if($menu_id === FALSE){
			$query = $this->db->get('menus');
			return $query->result_array();
		}
		$query=$this->db->get_where('menus', array('id'=> $menu_id));
		return $query->row_array();
	}

	public function get_menus_day($day){
		$query=$this->db->get_where('menus', array('day'=> $day));
		return $query->row_array();
	}

	public function create_menu($menu_image){
		$slug = url_title($this->input->post('name'));

		//$user_id = 0;
		//print_r($this->session->userdata('role_id')===1);
		//print_r("aaaaaaaaa");
		//print_r($this->session->userdata('user_id'));
		//if($this->session->userdata('role_id')==1) $user_id = $this->session->userdata('user_id');
		//print_r($user_id);

		$data = array(
			'name' => $this->input->post('name'),
			'slug' => $slug,
			'price' => $this->input->post('price'),
			'day' => $this->input->post('date'),
			'image' => $menu_image
			//'user_id' => $user_id
		);

		return $this->db->insert('menus', $data);
	}

	public function delete_menu($id){
		$this->db->where('id', $id);
		$this->db->delete('menus');
		return true;
	}

	public function get_filtered_menus(){
		$date = $this->input->post('date');
		$query=$this->db->get_where('menus', array('day'=> $date));
		//print_r($query->result_array());
		return $query->result_array();
	}





}
