<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gejala extends CI_Model {

	private $table = 'gejala';
	private $select_column = array("id_gejala", "kode_gejala", "nama_gejala");  
  private $order_column = array(null, "kode_gejala", "nama_gejala");  

  function make_query()  
  {  
  	$this->db->select($this->select_column);  
  	$this->db->from($this->table);  
  	if(isset($_POST["search"]["value"]))  
  	{  
  		$this->db->like("kode_gejala", $_POST["search"]["value"]);  
  		$this->db->or_like("nama_gejala", $_POST["search"]["value"]);  
  	}  
  	if(isset($_POST["order"]))  
  	{  
  		$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
  	}  
  	else  
  	{  
  		$this->db->order_by('kode_gejala', 'ASC');  
  	}  
  }

  function make_datatables()
  {  
  	$this->make_query();  
  	if($_POST["length"] != -1)  
  	{  
  		$this->db->limit($_POST['length'], $_POST['start']);  
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

  function get_all() {
    return $this->db->get($this->table)->result();
  }

  function get_all_array() {
    return $this->db->get($this->table)->result_array();
  }

  function get_id($id) 
  {
  	$this->db->where('id_gejala', $id);
  	$query = $this->db->get($this->table);

  	if($query->num_rows() > 0) {
  		return $query->row();
  	} else {
  		return false;
  	}
  }

  function insert_data($data) 
  {
  	$this->db->insert($this->table, $data);

  	if($this->db->affected_rows() > 0) {
  		return true;
  	} else {
  		return false;
  	}
  }

  function update_data($id, $data) 
  {
  	$this->db->where('id_gejala', $id);
  	$query = $this->db->update($this->table, $data);

  	if($this->db->affected_rows() > 0) {
  		return true;
  	} else {
  		return false;
  	}
  }

  function delete_data($id) 
	{
		$this->db->where('id_gejala', $id);
		$this->db->delete($this->table);

		if($this->db->affected_rows() > 0 ) {
			return true;
		} else {
			return false;
		}
	}

  function get_total_gejala() 
  {
    $this->db->select('COUNT(*) AS jumlah');
    $this->db->from($this->table);
    return $this->db->get()->row();
  }


}

/* End of file Model_gejala.php */
/* Location: ./application/models/Model_gejala.php */