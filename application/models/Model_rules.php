<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rules extends CI_Model {

	private $table = 'rules';
	private $select_column = array("id_rules", "id_gejala", "id_penyakit", "kode_gejala", "nama_gejala", "kode_penyakit", "nama_penyakit", "bobot");  
  private $order_column = array(null, null, null, "kode_gejala", "nama_gejala", "kode_penyakit", "nama_penyakit", "bobot");

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