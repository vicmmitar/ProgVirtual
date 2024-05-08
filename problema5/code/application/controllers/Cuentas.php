<?php
class Cuentas extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->model('cuenta_model');
			$this->load->helper('url_helper');
	}

	public function index()
	{
			$data['cuentas'] = $this->cuenta_model->get_cuentas();

			$data['title'] = 'Cuentas Bancarias';

			$this->load->view('templates/header', $data);
			$this->load->view('cuentas/index', $data);
			$this->load->view('templates/footer');
	}

	public function view($slug = NULL)
	{
			$data['cuentas_item'] = $this->cuenta_model->get_cuentas($slug);
	}

	public function delete()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a news item';

		$this->cuenta_model->delete_cuenta($this->input->post('id_cuenta_bancaria'));
		$this->index();
	}
}
