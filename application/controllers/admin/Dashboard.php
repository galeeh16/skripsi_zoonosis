<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()	{
		parent::__construct();
		$this->cek_session();
		$this->load->model('Model_user');
		$this->load->model('Model_gejala');
		$this->load->model('Model_news');
		$this->load->model('Model_rules');
		$this->load->model('Model_penyakit');
	}

	public function index() {
		$data = [
			'title' => 'Zoonosis | Dashboard',
			'user' => $this->Model_user->get_where($this->session->userdata('id')),
			'total_user' => $this->Model_user->get_total_user(),
			'total_gejala' => $this->Model_gejala->get_total_gejala(),
			'total_news' => $this->Model_news->get_total_news(),
			'total_penyakit' => $this->Model_penyakit->get_total_penyakit(),
			'total_rules' => $this->Model_rules->get_total_rules()
		];

		$this->load->view('admin/v_header_admin', $data);
		$this->load->view('admin/v_dashboard', $data);
	}

	public function cek_session()	
	{
		if(!$this->session->userdata('level') == 'Admin') {
			$this->session->set_flashdata('err', '<div class="alert alert-danger" role="alert"><center><i class="fa fa-exclamation-triangle"></i> Anda bukan Admin, silahkan login terlebih dahulu!</center></div>');

			setcookie("username", "", time()+(10*365*24*60), "/");
			setcookie("password", "", time()+(10*365*24*60), "/");
			setcookie("remember", "", time()+(10*365*24*60), "/");
			
			return redirect(base_url('sign-in'),'refresh');
		}
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */