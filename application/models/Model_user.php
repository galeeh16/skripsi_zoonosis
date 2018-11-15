<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	private $table = "users";  
  private $select_column = array("id_user", "username", "name", "password", "address", "handphone", "level", "photo");  
  private $order_column = array(null, "username", "name", null, "address", "handphone", "level", null);  

  function make_query()  
  {  
  	$this->db->select($this->select_column);  
  	$this->db->from($this->table);  
  	if(isset($_POST["search"]["value"]))  
  	{  
  		$this->db->like("username", $_POST["search"]["value"]);  
  		$this->db->or_like("name", $_POST["search"]["value"]);  
  		$this->db->or_like("address", $_POST["search"]["value"]);  
  		$this->db->or_like("handphone", $_POST["search"]["value"]);  
  		$this->db->or_like("level", $_POST["search"]["value"]);  
  	}  
  	if(isset($_POST["order"]))  
  	{  
  		$this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
  	}  
  	else  
  	{  
  		$this->db->order_by('id_user', 'DESC');  
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

  function get_where($id) 
  {
		$this->db->where('id_user', $id);
		$sql = $this->db->get($this->table);

		if($sql->num_rows() > 0) {
			return $sql->row();
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

  function update_data($where, $data) 
  {
    $this->db->where('id_user', $where);
    $this->db->update($this->table, $data);

    if($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function delete_data($id) 
  {
    $this->db->where('id_user', $id);
    $this->db->delete($this->table);

    if($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function get_total_user() {
    $this->db->select('COUNT(*) AS jumlah');
    $this->db->from($this->table);
    return $this->db->get()->row();
  }

}

/* End of file Model_user.php */
/* Location: ./application/models/Model_user.php */