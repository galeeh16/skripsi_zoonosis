<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rules extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cek_session();
		$this->load->model('Model_rules');
		$this->load->model('Model_gejala');
		$this->load->model('Model_penyakit');
		$this->load->model('Model_user');
	}

	public function index()
	{
		$title['title'] = "Zoonsis | Admin Rules";
		$title['user'] = $this->Model_user->get_where($this->session->userdata('id'));
		$data = [
			'gejala'   => $this->Model_gejala->get_all(),
			'penyakit' => $this->Model_penyakit->get_all(),
		];

		$this->load->view('admin/v_header_admin', $title);
		$this->load->view('admin/v_rules', $data);
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

	public function fetch_rules()
	{
	   $fetch_data = $this->Model_rules->make_datatables(); 
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

	   echo '<pre>';
	   print_r($output);
	   echo '<pre>';

	   echo json_encode($output);
	}

}

/* End of file Rules.php */
/* Location: ./application/controllers/admin/Rules.php */