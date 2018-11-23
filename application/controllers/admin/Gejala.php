<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_gejala');
		$this->load->model('Model_rules');
		$this->load->model('Model_user');
	}

	public function index()
	{
		$title['title'] = 'Zoonosis | Admin Gejala';
		$title['user'] = $this->Model_user->get_where($this->session->userdata('id'));
		$this->load->view('admin/v_header_admin', $title);
		$this->load->view('admin/v_gejala');
	}

	public function fetch_gejala()
	{
		$fetch_data = $this->Model_gejala->make_datatables();  
		$data = array();  
		$no = 1;
		foreach($fetch_data as $row)  
		{  
			$sub_array = array();  
			$sub_array[] = $no;  
			$sub_array[] = $row->kode_gejala;  
			$sub_array[] = $row->nama_gejala;   
			$sub_array[] = '<button type="button" title="Ubah User" onclick="submit('."'$row->id_gejala'".')" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></button>';  
			$sub_array[] = '<button type="button"onclick="hapus('."'$row->id_gejala'".')" title="Hapus User" class="btn btn-danger btn-xs"><i class="lnr lnr-trash"></i></button>';  

			$data[] = $sub_array;

			$no++;
		}  

	  $output = [ 
      "draw"             => intval($_POST["draw"]),  
      "recordsTotal"     => $this->Model_gejala->get_all_data(),  
      "recordsFiltered"  => $this->Model_gejala->get_filtered_data(),  
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
			'is_unique' => '%s sudah digunakan'
		];

		$this->form_validation->set_rules('kode_gejala', 'Kode Gejala', 'trim|required|min_length[3]|max_length[12]|is_unique[gejala.kode_gejala]', $msg);

		$this->form_validation->set_rules('nama_gejala', 'Nama Gejala', 'trim|required|min_length[3]|max_length[50]', $msg);

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run($this) == TRUE) {
			$data = [
				'kode_gejala' => $this->input->post('kode_gejala'),
				'nama_gejala' => $this->input->post('nama_gejala')
			];

			if($this->Model_gejala->insert_data($data))  $result['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$result['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($result);
	}

	public function get_id()
	{
		$id = $this->input->post('id_gejala');
		$get = $this->Model_gejala->get_id($id);
		if($get) {
			echo json_encode($get);
		}
	}

	public function ubah()
	{
		$id = $this->input->post('id_gejala');
		$result = ['success' => false, 'messages' => []];
		$msg = [
			'required' => 'Harap isi %s',
			'min_length' => '%s terlalu singkat',
			'max_length' => '%s terlalu panjang',
			'is_unique' => '%s sudah digunakan'
		];

		if($this->input->post('kode_gejala') == $this->input->post('kode_gejala_2')) {
			$this->form_validation->set_rules('kode_gejala', 'Kode Gejala', 'trim|required|min_length[3]|max_length[12]', $msg);
		} else {
			$this->form_validation->set_rules('kode_gejala', 'Kode Gejala', 'trim|required|min_length[3]|max_length[12]|is_unique[gejala.kode_gejala]', $msg);
		}

		$this->form_validation->set_rules('nama_gejala', 'Nama Gejala', 'trim|required|min_length[3]|max_length[50]', $msg);

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run($this) == TRUE) {
			$data = [
				'kode_gejala' => $this->input->post('kode_gejala'),
				'nama_gejala' => $this->input->post('nama_gejala')
			];

			if($this->Model_gejala->update_data($id, $data))  $result['success'] = true;
		} else {
			foreach ($_POST as $key => $value) {
				$result['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($result);
	}

	public function hapus()
	{
		$result['success'] = false;
		$id = $this->input->post('id_gejala');

		$hapus_rules = $this->Model_rules->delete_rules_gejala($id);

		if($this->Model_gejala->delete_data($id)) {
			$result['success'] = true;
			echo json_encode($result);
		}
	}

}

/* End of file Gejala.php */
/* Location: ./application/controllers/admin/Gejala.php */