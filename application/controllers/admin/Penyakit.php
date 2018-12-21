<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cek_session();
		$this->load->model('Model_penyakit');
		$this->load->model('Model_solusi');
		$this->load->model('Model_rules');
		$this->load->model('Model_user');
	}

	public function index()
	{
		$title['title'] = 'Zoonosis | Admin Penyakit';
		$data['solusi'] = $this->Model_solusi->get_all();
		$title['user'] = $this->Model_user->get_where($this->session->userdata('id'));
		$this->load->view('admin/v_header_admin', $title);
		$this->load->view('admin/v_penyakit', $data);
	}

	public function cek_session()	
	{
		if($this->session->userdata('level') !== 'Admin') {
			$this->session->set_flashdata('err', '<div class="alert alert-danger" role="alert"><center><i class="fa fa-exclamation-triangle"></i> Anda bukan Admin, silahkan login terlebih dahulu!</center></div>');

			setcookie("username", "", time()+(10*365*24*60), "/");
			setcookie("password", "", time()+(10*365*24*60), "/");
			setcookie("remember", "", time()+(10*365*24*60), "/");
			
			return redirect(base_url('sign-in'),'refresh');
		}
	}

	public function fetch_penyakit()
	{
	   $fetch_data = $this->Model_penyakit->make_datatables();  
	   $data = array();  
	   $no = 1;
	   foreach($fetch_data as $row)  
	   {  
        $sub_array = array();  
        $sub_array[] = $no;  
        $sub_array[] = $row->kode_penyakit;  
        $sub_array[] = $row->nama_penyakit;  
        $sub_array[] = $row->deskripsi_penyakit;  
        $sub_array[] = $row->nama_solusi;   
        $sub_array[] = '<img src="'.base_url().'assets/img/penyakit/'.$row->foto.'" class="img-thumbnail" width="70" height="70" />';
        $sub_array[] = '<button type="button" title="Ubah User" onclick="detail('."'$row->id_penyakit'".')" class="btn btn-info btn-xs"><i class="lnr lnr-eye"></i></button>'; 
        $sub_array[] = '<button type="button" title="Ubah User" onclick="submit('."'$row->id_penyakit'".')" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></button>';  
        $sub_array[] = '<button type="button"onclick="hapus('."'$row->id_penyakit'".')" title="Hapus User" class="btn btn-danger btn-xs"><i class="lnr lnr-trash"></i></button>';  

        $data[] = $sub_array;

        $no++;
	   }  

	   $output = [ 
      "draw"             => intval($_POST["draw"]),  
      "recordsTotal"     => $this->Model_penyakit->get_all_data(),  
      "recordsFiltered"  => $this->Model_penyakit->get_filtered_data(),  
      "data"             => $data  
	   ];  

	   echo json_encode($output);
	}

	public function tambah() 
	{
		$result = ['success' => false, 'messages' => []];
		$msg = [
			'required' => 'Harap isi %s',
			'min_length' => '%s terlalu singkat',
			'max_length' => '%s terlalu panjang',
			'is_unique' => '%s sudah digunakan',
			'numeric' => '%s harus berupa nomor'
		];
	
		$this->form_validation->set_rules('kode_penyakit', 'Kode Penyakit', 'trim|required|min_length[2]|max_length[15]|is_unique[penyakit.kode_penyakit]', $msg);

		$this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'trim|required|min_length[5]|max_length[50]', $msg);

		$this->form_validation->set_rules('deskripsi_penyakit', 'Deskripsi Penyakit', 'trim|required|min_length[3]|max_length[500]', $msg);

		$this->form_validation->set_rules('id_solusi', 'Solusi', 'trim|required', $msg);

		$this->form_validation->set_rules('foto', 'Foto', 'callback_photo_check');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run($this) == TRUE) { 
			$data = [];
			if(!empty($_FILES['foto']['name'])) {
				$data = [
					'kode_penyakit' => $this->input->post('kode_penyakit'),
					'nama_penyakit' => $this->input->post('nama_penyakit'),
					'deskripsi_penyakit' => $this->input->post('deskripsi_penyakit'),
					'id_solusi' => $this->input->post('id_solusi'),
					'foto' => $this->upload_photo()
				];
			} else {
				$data = [
					'kode_penyakit' => $this->input->post('kode_penyakit'),
					'nama_penyakit' => $this->input->post('nama_penyakit'),
					'deskripsi_penyakit' => $this->input->post('deskripsi_penyakit'),
					'id_solusi' => $this->input->post('id_solusi')
				];
			}

			if($this->Model_penyakit->insert_data($data)) $result['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$result['messages'][$key] = form_error($key);
				$result['messages']['foto'] = form_error('foto');
			}
		}
		echo json_encode($result);
	}

	public function get_id() 
	{
		$id = $this->input->post('id_penyakit');
		$get = $this->Model_penyakit->get_where($id);

		if($get) {
			echo json_encode($get);
		}
	}

	public function photo_check($str) 
	{
		if(!empty($_FILES['foto']['name'])) {
			$allowed = ['image/jpg', 'image/jpeg', 'image/png'];
			$mime = get_mime_by_extension($_FILES['foto']['name']);

			if(in_array($mime, $allowed)) {
				if($_FILES['foto']['size'] <= 1048576) {
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

	public function upload_photo() 
	{
		if(!empty($_FILES['foto']['name'])) 
		{
			$ext = explode('.', $_FILES['foto']['name']);
			$file_name = 'user_'.substr(md5(rand()), 0, 10).'.'.$ext[1];

			$config['upload_path']   = './assets/img/penyakit/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size']      = '1024';
			$config['file_name']     = $file_name; 

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if($this->upload->do_upload('foto')) {
				$this->upload->data();
				return $file_name;
			} else {
				return false;
			}
		}
	}

	public function ubah()
	{
		$id = $this->input->post('id_penyakit');
		$result = ['success' => false, 'messages' => []];
		$msg = [
			'required' => 'Harap isi %s',
			'min_length' => '%s terlalu singkat',
			'max_length' => '%s terlalu panjang',
			'is_unique' => '%s sudah digunakan',
			'numeric' => '%s harus berupa nomor'
		];
	
		if($this->input->post('kode_penyakit') == $this->input->post('kode_penyakit_2')) {
			$this->form_validation->set_rules('kode_penyakit', 'Kode Penyakit', 'trim|required|min_length[2]|max_length[15]', $msg);
		} else {
			$this->form_validation->set_rules('kode_penyakit', 'Kode Penyakit', 'trim|required|min_length[2]|max_length[15]|is_unique[penyakit.kode_penyakit]', $msg);
		}

		$this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'trim|required|min_length[5]|max_length[50]', $msg);

		$this->form_validation->set_rules('deskripsi_penyakit', 'Deskripsi Penyakit', 'trim|required|min_length[3]|max_length[500]', $msg);

		$this->form_validation->set_rules('id_solusi', 'Solusi', 'trim|required', $msg);

		$this->form_validation->set_rules('foto', 'Foto', 'callback_photo_check');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run($this) == TRUE) { 
			$data = [];
			if(!empty($_FILES['foto']['name'])) {

				$this->delete_photo($id);
				$data = [
					'kode_penyakit' => $this->input->post('kode_penyakit'),
					'nama_penyakit' => $this->input->post('nama_penyakit'),
					'deskripsi_penyakit' => $this->input->post('deskripsi_penyakit'),
					'id_solusi' => $this->input->post('id_solusi'),
					'foto' => $this->upload_photo()
				];
			} else {
				$data = [
					'kode_penyakit' => $this->input->post('kode_penyakit'),
					'nama_penyakit' => $this->input->post('nama_penyakit'),
					'deskripsi_penyakit' => $this->input->post('deskripsi_penyakit'),
					'id_solusi' => $this->input->post('id_solusi')
				];
			}

			if($this->Model_penyakit->update_data($id, $data)) $result['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$result['messages'][$key] = form_error($key);
				$result['messages']['foto'] = form_error('foto');
			}
		}
		echo json_encode($result);
	}

	public function delete_photo($id)
	{
		$cek = $this->Model_penyakit->get_where($id);
		if($cek->foto !== '') {
			if(file_exists('assets/img/penyakit/'.$cek->foto)) {
				return unlink('assets/img/penyakit/'.$cek->foto);
			}
		}
	}

	public function hapus()
	{
		$result['success'] = false;
		$id = $this->input->post('id_penyakit');

		$this->delete_photo($id);
		$this->Model_rules->delete_rules_penyakit($id);

		if($this->Model_penyakit->delete_data($id)) {
			$result['success'] = true;
			echo json_encode($result);
		} 
	}


}

/* End of file Penyakit.php */
/* Location: ./application/controllers/admin/Penyakit.php */