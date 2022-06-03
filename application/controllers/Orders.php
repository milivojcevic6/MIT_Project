<?php
class Orders extends CI_Controller
{
	public function index()
	{
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
		$this->order_model->create_order();
		redirect('orders');
	}

	public function delete($id){
		$this->order_model->delete_order($id);
		redirect('orders');
	}

	public function notifications()
	{
		$data['title'] = 'Notifications';

		$data['orders'] = $this->order_model->get_notification_orders();

		$data['menus'] = $this->menu_model->get_menus();


		if (empty($data['orders'])) {
			print_r("You don't have any orders");
		}

		$this->load->view('templates/header', $data);
		$this->load->view('orders/notifications', $data);
		$this->load->view('templates/footer', $data);
	}

}
