<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_user');
		$this->load->model('Model_penyakit');
	}

	public function index()	{
		if($this->session->userdata('level') == 'Member') {
			redirect('member/home','refresh');
		} else {
			$data['title'] = "Zoonosis";
			$this->load->view('pages/v_header', $data);
			$this->load->view('pages/v_home');
		}
	}

	public function sign_in() {
		$data['title'] = 'Zoonosis | Sign In';
		$this->load->view('pages/v_header', $data);
		$this->load->view('pages/v_sign_in');
	}

	public function proses_login() {
		if($this->input->post('masuk')) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$remember = $this->input->post('remember_me');

			$cek_login = $this->Model_user->login($username, $password);
			
			if($cek_login) {
				if($remember) {
					setcookie("username", $username, time()+(10*365*24*60), "/");
					setcookie("password", $password, time()+(10*365*24*60), "/");
					setcookie("remember", "remember", time()+(10*365*24*60), "/");
				} else {
					setcookie("username", "", time()+(10*365*24*60), "/");
					setcookie("password", "", time()+(10*365*24*60), "/");
					setcookie("remember", "", time()+(10*365*24*60), "/");
				}

				$session = [
					'logged_in' => true,
					'id' 			  => $cek_login->id_user,
					'username'	=> $cek_login->username,
					'name' 			=> $cek_login->name,
					'address' 	=> $cek_login->address,
					'handphone' => $cek_login->handphone,
					'level' 		=> $cek_login->level,
					'photo'			=> $cek_login->photo,
					'status'    => true
				];

				$this->session->set_userdata($session);
		
				if($this->session->userdata('level') == 'Admin') {
					redirect('admin/dashboard','refresh');
				} else if($this->session->userdata('level') == 'Member') {
					redirect('member','refresh');
				} else {
					setcookie("username", "", time()+(10*365*24*60), "/");
					setcookie("password", "", time()+(10*365*24*60), "/");
					setcookie("remember", "", time()+(10*365*24*60), "/");

					$this->session->set_flashdata('err', '<div class="alert alert-danger" role="alert"><center>Username atau password tidak valid! <i class="fa fa-exclamation-triangle"></i></center></div>');
					redirect('sign-in','refresh');
				}
			} else {
				setcookie("username", "", time()+(10*365*24*60), "/");
				setcookie("password", "", time()+(10*365*24*60), "/");
				setcookie("remember", "", time()+(10*365*24*60), "/");
				
				$this->session->set_flashdata('err', '<div class="alert alert-danger" role="alert"><center> <i class="fa fa-exclamation-triangle"></i> Username atau password anda tidak valid!</center></div>');
				redirect('sign-in','refresh');
			}
		}
	}

	public function sign_up() {
		$data['title'] = "Zoonosis | Sign Up";
		$this->load->view('pages/v_header', $data);
		$this->load->view('pages/v_sign_up');
	}

	public function proses_daftar() {
		$data = ['success' => false, 'messages' => []];

		// ^ =  awalan, $ = akhiran, karakter setalah / tidak dihiraukan
		$this->form_validation->set_rules('username', 'Username',
					'trim|required|min_length[5]|max_length[30]|regex_match[/^[a-zA-Z0-9_]+$/]|is_unique[users.username]',
					array('required' => 'Harap isi username anda',
						'min_length' => 'Username minimal 5 karakter',
						'max_length' => 'Username maksimal 30 Karakter',
						'regex_match' => 'Harap masukkan karakter yang valid',
						'is_unique' => 'Username sudah digunakan'
					));

		$this->form_validation->set_rules('password', 'Password',
			'trim|required|min_length[5]|max_length[12]|alpha_numeric',
			array('required' => 'Harap isi %s anda',
				  'min_length' => '%s minimal 5 karakter',
				  'max_length' => '%s maksimal 12 karakter',
				  'alpha_numeric' => '%s hanya huruf dan angka'
		));

		$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'trim|required|matches[password]',
			array('required' => 'Harap konfirmasi password anda',
				  'matches' => 'Harap samakan dengan password anda'
			));

		$this->form_validation->set_rules('name', 'Nama Lengkap',
			'trim|required|min_length[3]|max_length[30]|regex_match[/^[a-zA-Z-`\s]+$/]',
			array('required' => 'Harap isi nama lengkap anda',
				  'min_length' => 'Nama minimal 3 karakter',
				  'max_length' => 'Nama maksimal 30 karakter',
				  'regex_match' => 'Harap periksa kembali nama anda'
			));

		$this->form_validation->set_rules('handphone', 'Nomor Handphone',
			'trim|required|min_length[10]|max_length[15]|regex_match[/^08/]|numeric',
			array('required' => 'Harap isi %s anda',
				  'min_length' => '%s minimal 10 karakter',
				  'max_length' => '%s maksimal 15 karakter',
				  'regex_match' => 'Awali %s dengan 08xxx',
				  'numeric' => 'Harap periksa kembali %s anda',
			));

		$this->form_validation->set_error_delimiters('<span class="help-block" style="font-size:14px"><i class="fa fa-times"></i> ','</span>');

		if($this->form_validation->run($this) == TRUE) {
			$user = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'name' => $this->input->post('name'),
				'handphone' => $this->input->post('handphone'),
				'level' => 'Member'
			];

			$insert = $this->Model_user->insert_data($user);

			if($insert) {
				$data['success'] = true;
			}
			// $data['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($data);
	}

	public function bantuan() {
		$data['title'] = 'Zoonosis | Bantuan';
		$this->load->view('pages/v_header', $data);
		$this->load->view('pages/v_bantuan');
	}

	public function tentang_kami() {
		$data['title'] = 'Zoonosis | Tentang Kami';
		$this->load->view('pages/v_header', $data);
		$this->load->view('pages/v_tentang_kami');
	}

	public function informasi_penyakit() {
		$data['title'] = 'Zoonosis | Informasi Penyakit';
		$data['penyakit'] = $this->Model_penyakit->get_all();

		$this->load->view('pages/v_header', $data);
		$this->load->view('pages/v_informasi_penyakit', $data);
	}

	public function info_detail()	{
		$id = $this->input->post('id_penyakit');
		$get['penyakit'] = $this->Model_penyakit->get_where($id);
		$get['gejala'] = $this->Model_penyakit->get_gejala($id);

		echo json_encode($get);
	}

	public function logout() {
		// unset($_SESSION);
		$this->session->sess_destroy();
		redirect('sign-in');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */