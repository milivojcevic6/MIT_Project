<?php
class Menus extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Menus';

		$data['menus'] = $this->menu_model->get_menus();


		$this->load->view('templates/header', $data);
		$this->load->view('menus/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function view($slug = NULL)
	{

		if (empty($data['menus'])) {
			show_404();
		}

		$data['menus'] = $this->menu_model->get_menus();

		$this->load->view('templates/header', $data);
		$this->load->view('menus/view', $data);
		$this->load->view('templates/footer', $data);
	}

	public function create(){
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
			$config['upload_path'] = './restaurant_images';
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

}