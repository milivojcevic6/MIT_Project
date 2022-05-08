<?php
class Menu_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_menus($slug=FALSE){
		if($slug === FALSE){
			$query = $this->db->get('menus');
			return $query->result_array();
		}
		$query=$this->db->get_where('menus', array('slug'=> $slug));
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


}
