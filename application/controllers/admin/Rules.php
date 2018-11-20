<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rules extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_rules');
		$this->load->model('Model_gejala');
		$this->load->model('Model_penyakit');
	}

	public function index()
	{
		$title['title'] = "Zoonsis | Admin Rules";
		$data = [
			'gejala'   => $this->Model_gejala->get_all(),
			'penyakit' => $this->Model_penyakit->get_all(),
		];

		$this->load->view('admin/v_header_admin', $title);
		$this->load->view('admin/v_rules', $data);
	}

}

/* End of file Rules.php */
/* Location: ./application/controllers/admin/Rules.php */