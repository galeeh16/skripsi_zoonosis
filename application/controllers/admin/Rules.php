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

	public function fetch_rules()
	{
	   $fetch_data = $this->Model_rules->make_datatables(); 
	   print_r($fetch_data); 
	   $data = array();  
	   $no = 1;
	   foreach($fetch_data as $row)  
	   {  
        $sub_array = array();  
        $sub_array[] = $no;  
        $sub_array[] = $row->nama_gejala;  
        $sub_array[] = $row->nama_penyakit;  
        $sub_array[] = $row->cf;  
        $sub_array[] = '<button type="button" title="Ubah Rules" onclick="submit('."'$row->id_rules'".')" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></button>';  
        $sub_array[] = '<button type="button"onclick="hapus('."'$row->id_rules'".')" title="Hapus Rules" class="btn btn-danger btn-xs"><i class="lnr lnr-trash"></i></button>';  
        $data[] = $sub_array;

        $no++;
	   }  

	   $output = [ 
      "draw"             => intval($_POST["draw"]),  
      "recordsTotal"     => $this->Model_rules->get_all_data(),  
      "recordsFiltered"  => $this->Model_rules->get_filtered_data(),  
      "data"             => $data  
	   ];  

	   echo json_encode($output);
	}

}

/* End of file Rules.php */
/* Location: ./application/controllers/admin/Rules.php */