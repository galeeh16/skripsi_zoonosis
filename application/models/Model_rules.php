<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rules extends CI_Model {

	private $table = 'rules';

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