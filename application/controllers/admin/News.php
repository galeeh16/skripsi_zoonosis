<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cek_session();
		$this->load->model('Model_news');
		$this->load->model('Model_user');
	}

	public function index()
	{
			$title['title'] = 'Zoonosis | News';
			$title['user'] = $this->Model_user->get_where($this->session->userdata('id'));
			$this->load->view('admin/v_header_admin', $title);
			$this->load->view('admin/v_news');
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

	public function fetch_news()
	{
		$fetch_data = $this->Model_news->make_datatables();  
		$data = array();  
		$no = 1;
		foreach($fetch_data as $row)  
		{  
			$sub_array = array();  
			$sub_array[] = $no;  
			$sub_array[] = $row->name;  
			$sub_array[] = $row->title;   
			$sub_array[] = $row->description;   
			$sub_array[] = $row->date;   
			$sub_array[] = $row->time;   
			$sub_array[] = '<button type="button" title="Ubah User" onclick="submit('."'$row->id_news'".')" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></button>';  
			$sub_array[] = '<button type="button"onclick="hapus('."'$row->id_news'".')" title="Hapus User" class="btn btn-danger btn-xs"><i class="lnr lnr-trash"></i></button>';  

			$data[] = $sub_array;

			$no++;
		}  

	  $output = [ 
      "draw"             => intval($_POST["draw"]),  
      "recordsTotal"     => $this->Model_news->get_all_data(),  
      "recordsFiltered"  => $this->Model_news->get_filtered_data(),  
      "data"             => $data  
	  ];  

	  echo json_encode($output);
	}

	public function get_id()
	{
		$id = $this->input->post('id_news');
		$get = $this->Model_news->get_where($id);
		if($get) {
			echo json_encode($get);
		}		
	}

	public function add_news()
	{
		$result = ['success' => false, 'messages' => []];
		$msg = [
			'required' => 'Harap isi %s',
			'min_length' => '%s terlalu pendek',
			'max_length' => '%s terlalu panjang'
		];

		$this->form_validation->set_rules('title', 'Judul Pengumuman', 'trim|required|min_length[5]|max_length[30]', $msg);

		$this->form_validation->set_rules('description', 'Isi Pengumuman', 'trim|required|min_length[5]|max_length[500]', $msg);

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run($this) == TRUE) {
			$data = [
				'user_id' => $this->session->userdata('id'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'date' => date('Y-m-d'),
				'time' => date('H:i:s')
			];

			if($this->Model_news->insert_data($data)) {
				$result['success'] = true;
			}

		} else {
			foreach ($_POST as $key => $value) {
				$result['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($result);

	}

	public function edit_news()
	{
		$id = $this->input->post('id_news');
		$result = ['success' => false, 'messages' => []];
		$msg = [
			'required' => 'Harap isi %s',
			'min_length' => '%s terlalu pendek',
			'max_length' => '%s terlalu panjang'
		];

		$this->form_validation->set_rules('title', 'Judul Pengumuman', 'trim|required|min_length[5]|max_length[30]', $msg);

		$this->form_validation->set_rules('description', 'Isi Pengumuman', 'trim|required|min_length[5]|max_length[500]', $msg);

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if ($this->form_validation->run($this) == TRUE) {
			$data = [
				'user_id' => $this->session->userdata('id'),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'date' => date('Y-m-d'),
				'time' => date('H:i:s')
			];

			if($this->Model_news->update_data($id, $data)) {
				$result['success'] = true;
			}

		} else {
			foreach ($_POST as $key => $value) {
				$result['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($result);
	}

	public function delete_news()
	{
		$result['success'] = false;
		$id = $this->input->post('id_news');
		$delete = $this->Model_news->delete_data($id);
		if($delete) {
			$result['success'] = true;
			echo json_encode($result);
		}
	}

}

/* End of file News.php */
/* Location: ./application/controllers/admin/News.php */