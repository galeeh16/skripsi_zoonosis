<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->cek_session();
		$this->load->model('Model_user');
		$this->load->model('Model_news');
		$this->load->model('Model_gejala');
	}

	public function index()	{
		$data['title'] = 'Zoonosis | Home';
		$data['gejala'] = $this->Model_gejala->get_all_array();
		$this->load->view('pages/v_header', $data);
		$this->load->view('member/v_home', $data);
	}

	public function cek_session()	{
		if(!$this->session->userdata('level') == 'Member') {
			$this->session->set_flashdata('err', '<div class="alert alert-danger" role="alert" style="border:0.5px solid #D95E5E"><center>Silahkan login terlebih dahulu! <i class="fa fa-exclamation-triangle"></i></center></div>');
			
			return redirect('sign-in','refresh');
		}
	}

	public function profile() {
		$data['title'] = 'Zoonosis | '.$this->session->userdata('name');
		$data['user'] = $this->Model_user->get_where($this->session->userdata('id'));

		$this->load->view('pages/v_header', $data);
		$this->load->view('member/v_profile', $data);

	}

	public function news() {
		$data['title'] = 'Zoonosis | News';
		$data['news'] = $this->Model_news->get_all();

		$this->load->view('pages/v_header', $data);
		$this->load->view('member/v_news', $data);
	}

	//wkwkwk
	function editProfil() {
		$result = ['success' => false, 'messages' => []];
		$id = $this->input->post('id_user');
		if($this->input->post('username') == $this->input->post('username_2')) {
			$this->form_validation->set_rules('username', '', 'trim|required|min_length[5]|max_length[15]',
			[
				'required' => "Harap isi username",
				'min_length' => 'Username terlalu singkat',
				'max_length' => 'Username terlalu panjang'
			]);
		} else {
			$this->form_validation->set_rules('username', '', 'trim|required|min_length[5]|max_length[15]|is_unique[users.username]',
			[
				'required' => "Harap isi username",
				'min_length' => 'Username terlalu singkat',
				'max_length' => 'Username terlalu panjang',
				'is_unique' => 'Username sudah digunakan'
			]);
		}

		$this->form_validation->set_rules('password', '', 'trim|required|min_length[5]|max_length[12]',
		[
			'required' => 'Harap isi password user',
			'min_length' => 'Password terlalu pendek',
			'max_length' => 'Password terlalu panjang'
		]);

		$this->form_validation->set_rules('name', '', 'trim|required|min_length[3]|max_length[40]',
			[
				'required' => 'Harap isi nama user',
				'min_length' => 'Nama terlalu pendek',
				'max_length' => 'Nama terlalu panjang'
			]);

		$this->form_validation->set_rules('address', '', 'trim|required|min_length[3]|max_length[100]',
			[
				'required' => 'Harap isi alamat user',
				'min_length' => 'Alamat terlalu pendek',
				'max_length' => 'Alamat terlalu panjang'
			]);

		$this->form_validation->set_rules('handphone', '', 'trim|required|min_length[10]|max_length[15]|numeric',
			[
				'required' => 'Harap isi nomor handphone',
				'min_length' => 'Nomor handphone terlalu pendek',
				'max_length' => 'Nomor handphone terlalu panjang',
				'numeric' => 'Harap periksa kembali nomor handphone'
			]);

		$this->form_validation->set_rules('photo', '', 'callback_photo_check');

		$this->form_validation->set_error_delimiters('<span class="help-block"><i class="fa fa-times"></i> ', '</span>');

		if ($this->form_validation->run($this) == TRUE) { 
			$data = [];
			if(!empty($_FILES['photo']['name'])) {
				$data = [
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'name' => $this->input->post('name'),
					'address' => $this->input->post('address'),
					'handphone' => $this->input->post('handphone'),
					'photo' => $this->upload_photo()
				];
			} else {
				$data = [
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'name' => $this->input->post('name'),
					'address' => $this->input->post('address'),
					'handphone' => $this->input->post('handphone'),
				];
			}

			$update = $this->Model_user->update_data($id, $data);

			if($update) {
				$this->update_session($id);
				$result['success'] = true;
			}
		} else {
			foreach ($_POST as $key => $value) {
				$result['messages'][$key] = form_error($key);
				$result['messages']['photo'] = form_error('photo');
			}
		}
		
		echo json_encode($result);
	}
	function update_session($id) {
		$get = $this->Model_user->get_where($id);
		if($get) {
			$session = [
				'id' => $get->id_user,
				'username' => $get->username,
				'password' => $get->password,
				'name' => $get->name,
				'address' => $get->address,
				'handphone' => $get->handphone,
				'level' => $get->level,
				'photo' => $get->photo
			];

			return $this->session->set_userdata($session);
		}
	}

	function photo_check($str) {
		if(!empty($_FILES['photo']['name'])) {
			$allowed = ['image/jpg', 'image/jpeg', 'image/png'];
			$mime = get_mime_by_extension($_FILES['photo']['name']);

			if(in_array($mime, $allowed)) {
				if($_FILES['photo']['size'] <= 1048576) {
					return true;
				} else {
					$this->form_validation->set_message(__FUNCTION__, 'Ukuran foto terlalu besar (max 1MB)');
					return false;
				}
			} else {
				$this->form_validation->set_message(__FUNCTION__, 'Ekstensi foto tidak valid (hanya jpg/jpeg/png)');
				return false;
			}
		}
	}

	function upload_photo() {
		if(!empty($_FILES['photo']['name'])) {
			$ext = explode('.', $_FILES['photo']['name']);
			$file_name = 'user_'.substr(md5(rand()), 0, 10).'.'.$ext[1];

			$config['upload_path']   = './assets/img/user/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size']      = '1024';
			$config['file_name']     = $file_name; 

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if($this->upload->do_upload('photo')) {
				$this->upload->data();
				return $file_name;
			} else {
				return false;
			}
		}
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */