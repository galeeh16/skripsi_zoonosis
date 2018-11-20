<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('level') == 'Member') {
			redirect('member/home','refresh');
		} else {
			$data['title'] = "Zoonosis";
			$this->load->view('pages/v_header', $data);
			$this->load->view('pages/v_home');
		}
	}

	public function bantuan()
	{
		$data['title'] = 'Bantuan';
		$this->load->view('pages/v_header', $data);
		$this->load->view('pages/v_bantuan');
	}
}
