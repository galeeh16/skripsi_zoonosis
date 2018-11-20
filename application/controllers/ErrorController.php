<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_user');
	}

	public function index()
	{
		$data['title'] = 'Page Not Found';
		if($this->session->userdata('level') == 'Admin') {
			$data['user'] = $this->Model_user->get_where($this->session->userdata('id'));
			$this->load->view('admin/v_header_admin', $data);
			$this->load->view('admin/v_error');
		}	else {
			$this->load->view('pages/v_header', $data);
			$this->load->view('pages/v_error');
		}	
	}

}

/* End of file ErrorController.php */
/* Location: ./application/controllers/ErrorController.php */