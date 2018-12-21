<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_news extends CI_Model {

	private $table = 'news';

	function get_total_news() 
	{
    $this->db->select('COUNT(*) AS jumlah');
    $this->db->from($this->table);
    return $this->db->get()->row();
  }

  function make_query()  
  {  
    $this->db->select('*');  
    $this->db->from($this->table);  
    $this->db->join('users', 'users.id_user = news.user_id', 'left');
    if(isset($_POST["search"]["value"]))  
    {  
      $this->db->like("name", $_POST["search"]["value"]);  
      $this->db->or_like("title", $_POST["search"]["value"]);  
      $this->db->or_like("description", $_POST["search"]["value"]);   
    }  
    if(isset($_POST["order"]))  
    {  
      $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
    }  
    else  
    {  
      $this->db->order_by('id_news', 'DESC');  
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

  function get_all() 
  {
    $this->db->join('users', 'users.id_user = news.user_id', 'left');
    return $this->db->get($this->table)->result();
  }

  function get_where($id)
  {
    $this->db->where('id_news', $id);
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
    $this->db->where('id_news', $id);
    $this->db->update($this->table, $data);

    if($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function delete_data($id)
  {
    $this->db->where('id_news', $id);
    $this->db->delete($this->table);

    if($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

}

/* End of file Model_news.php */
/* Location: ./application/models/Model_news.php */