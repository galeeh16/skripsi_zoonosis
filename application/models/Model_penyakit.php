<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_penyakit extends CI_Model {

	private $table = 'penyakit';
	private $select_column = array("id_penyakit", "kode_penyakit", "nama_penyakit", "deskripsi_penyakit", "nama_solusi", "foto");  
  private $order_column = array(null, "kode_penyakit", "nama_penyakit", "deskripsi_penyakit", "nama_solusi", null);  

	function get_total_penyakit() 
  {
    $this->db->select('COUNT(*) AS jumlah');
    $this->db->from($this->table);
    return $this->db->get()->row();
  }

  function make_query()  
  {  
  	$this->db->select($this->select_column);  
  	$this->db->from($this->table);  
  	$this->db->join('solusi', 'penyakit.id_solusi = solusi.id_solusi', 'left');
  	if(isset($_POST["search"]["value"]))  
  	{  
  		$this->db->like("kode_penyakit", $_POST["search"]["value"]);  
  		$this->db->or_like("nama_penyakit", $_POST["search"]["value"]);  
  		$this->db->or_like("deskripsi_penyakit", $_POST["search"]["value"]);  
  		$this->db->or_like("nama_solusi", $_POST["search"]["value"]);  
  	}  
  	if(isset($_POST["order"]))  
  	{  
  		$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
  	}  
  	else  
  	{  
  		$this->db->order_by('kode_penyakit', 'ASC');  
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

  function get_where($id) {
    $this->db->join('solusi', 'solusi.id_solusi = penyakit.id_solusi', 'left');
    $this->db->where('id_penyakit', $id);
    $query =  $this->db->get($this->table);

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
    $this->db->where('id_penyakit', $id);
    $this->db->update($this->table, $data);

    if($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function delete_data($id) 
  {
    $this->db->where('id_penyakit', $id);
    $this->db->delete($this->table);

    if($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function get_gejala($id) 
  {
    $this->db->where('id_penyakit', $id);
    $this->db->join('gejala', 'gejala.id_gejala = rules.id_gejala', 'left');
    return $this->db->get('rules')->result();
  }

}

/* End of file Model_penyakit.php */
/* Location: ./application/models/Model_penyakit.php */