<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rules extends CI_Model {

	private $table = 'rules';
  private $select_column = array("id_rules", "cf",  "nama_gejala", "nama_penyakit");  
  private $order_column = array(null, "cf", "nama_gejala", "nama_penyakit");

  function make_query()  
  {  
  	$this->db->select($this->select_column);  
  	$this->db->from($this->table);  
  	$this->db->join('gejala', 'gejala.id_gejala = rules.id_gejala', 'left');
  	$this->db->join('penyakit', 'penyakit.id_penyakit = rules.id_penyakit', 'left');
  	if(isset($_POST["search"]["value"]))  
  	{  
  		$this->db->like("nama_penyakit", $_POST["search"]["value"]);  
  		$this->db->or_like("nama_gejala", $_POST["search"]["value"]);  
  		$this->db->or_like("cf", $_POST["search"]["value"]);    
  	}  
  	if(isset($_POST['order']))  
  	{  
  		$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
  	}  
  	else  
  	{  
  		$this->db->order_by("id_rules", "ASC");  
  	}  
  }  

  function make_datatables()
  {  
  	$this->make_query();  
  	if(!empty($_POST['length']) && $_POST["length"] != -1)  
  	{  
  		$this->db->limit($_POST["length"], $_POST["start"]);  
  	}  
  	$query = $this->db->get();  
  	return $query->result();  
  }  

  function get_filtered_data()
  {  
  	$this->make_query();  
  	$query = $this->db->get();  
  	return $query->num_rows();  
  } 

  function get_all_data()  
  {  
  	$this->db->select("*");  
  	$this->db->from($this->table);  
  	return $this->db->count_all_results();  
  }

	function delete_rules_gejala($id_gejala) 
	{
		$this->db->where('id_gejala', $id_gejala);
		$this->db->delete($this->table);

		if($this->db->affected_rows() > 0 ) {
			return true;
		} else {
			return false;
		}
	}	

	function delete_rules_penyakit($id) {
		$this->db->where('id_penyakit', $id);
		$this->db->delete($this->table);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function get_total_rules() {
    $this->db->select('COUNT(*) AS jumlah');
    $this->db->from($this->table);
    return $this->db->get()->row();
  }


}

/* End of file Model_rules.php */
/* Location: ./application/models/Model_rules.php */