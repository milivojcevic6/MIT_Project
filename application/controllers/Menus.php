<?php
class Menus extends CI_Controller
{
	public function index()
	{
		if(!$this->session->userdata('logged_in')) redirect('users/login');

		$data['title'] = 'Menus';

		if($this->menu_model->get_filtered_menus()) $data['menus'] = $this->menu_model->get_filtered_menus();
		else $data['menus'] = $this->menu_model->get_menus();

		if (empty($data['menus'])) {
			show_404();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('menus/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function view($slug = NULL)
	{
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		if (empty($data['menus'])) {
			show_404();
		}
		$data['menus'] = $this->menu_model->get_menus();
		//$data['menus'] = $this->menu_model->get_filtered_menus();

		$this->load->view('templates/header', $data);
		$this->load->view('menus/view', $data);
		$this->load->view('templates/footer', $data);
	}

	public function create(){
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		//if(!$this->session->userdata('logged_in')) redirect('users/login');

		$data['title'] = 'Add new menu';

		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('price', 'price', 'required');
		$this->form_validation->set_rules('date', 'date', 'required');

		if($this->form_validation->run() === FALSE){

			//$rez = $this->session->userdata('role_id');

			$this->load->view('templates/header', $data);
			$this->load->view('menus/create', $data);
			$this->load->view('templates/footer', $data);
		} else{
			//Upload image
			$config['upload_path'] = './2eat_images';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()){
				$errors = array('error' => $this->upload->display_errors());
				$menu_image = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$menu_image = $_FILES['userfile']['name'];
			}

			//$this->session->set_flashdata('restaurant_created', 'Your restaurant is now on Karly\'s Stars. You can now add your staff members.');
			$this->menu_model->create_menu($menu_image);

			redirect('menus');
		}
	}

	public function delete($id){
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		$this->menu_model->delete_menu($id);
		redirect('menus');
	}

	public function filter(){
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		if (empty($data['menus'])) {
			show_404();
		}

		$data['title'] = 'Menus';
		$data['menus'] = $this->menu_model->get_filtered_menus();

		$this->load->view('templates/header', $data);
		$this->load->view('menus/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function customize($menu_id){
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		$data['menu'] = $this->menu_model->get_menus($menu_id);
		$data['drinks'] = $this->customize_model->get_drinks();
		$data['sizes'] = $this->customize_model->get_sizes();

		if(empty($data['menu'])){
			show_404();
		}
		$data['title'] = 'Customize menu';
		$data['menu_name'] = $data['menu']['name'];
		$data['menu_date'] = $data['menu']['day'];
		$data['menu_id'] = $menu_id;
		$data['image'] = $data['menu']['image'];

		$this->load->view('templates/header', $data);
		$this->load->view('menus/customize', $data);
		$this->load->view('templates/footer', $data);

	}




}
