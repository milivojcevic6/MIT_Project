<?php
class Orders extends CI_Controller
{
	public function index()
	{
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		$data['title'] = 'My Orders';

		$data['orders'] = $this->order_model->get_orders();

		$data['menus'] = $this->menu_model->get_menus();


		if (empty($data['orders'])) {
			print_r("You don't have any orders");
		}

		$this->load->view('templates/header', $data);
		$this->load->view('orders/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function create(){
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		$this->order_model->create_order();
		redirect('orders');
	}

	public function delete($id){
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		$this->order_model->delete_order($id);
		redirect('orders');
	}

	public function notifications()
	{
		if(!$this->session->userdata('logged_in')) redirect('users/login');
		$data['title'] = 'Notifications';

		$data['orders'] = $this->order_model->get_notification_orders();

		$data['menus'] = $this->menu_model->get_menus();



		$this->load->view('templates/header', $data);
		$this->load->view('orders/notifications', $data);
		$this->load->view('templates/footer', $data);
	}

	public function statistics()
	{
		if(!$this->session->userdata('logged_in')) redirect('users/login');

		$data['title'] = 'Statistics';

		if($this->order_model->get_filtered_orders()) $data['orders'] = $this->order_model->get_filtered_orders();
		else $data['orders'] = $this->order_model->get_orders();

		//print_r($data['orders']);

		$menus = $this->menu_model->get_menus();
		$drinks = $this->customize_model->get_drinks();

		$menu_types=array();
		$drink_types=array();
		$cntSoups=0;
		$cntSalads=0;
		$cntFruits=0;

		foreach ($data['orders'] as $order){
			foreach ($menus as $menu) {
				if($menu['id']==$order['menu_id']){
					array_push($menu_types, $menu['name']);
				}
			}
			foreach ($drinks as $drink){
				if($drink['id']==$order['drink_id']){
					array_push($drink_types, $drink['name']);
				}
			}
			if($order['soup']==1) $cntSoups++;
			if($order['salad']==1) $cntSalads++;
			if($order['fruit']==1) $cntFruits++;
		}

		$data['counted_menus'] = array_count_values($menu_types);
		$data['counted_drinks'] = array_count_values($drink_types);
		$data['cntSalads'] = $cntSalads;
		$data['cntSoups'] = $cntSoups;
		$data['cntFruits'] = $cntFruits;
		$this->load->view('templates/header', $data);
		$this->load->view('orders/statistics', $data);
		$this->load->view('templates/footer', $data);
	}


}
