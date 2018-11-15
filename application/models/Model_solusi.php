<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_solusi extends CI_Model {

	private $table = 'solusi';

	function get_all() {
		return $this->db->get($this->table)->result();
	}	

}

/* End of file Model_solusi.php */
/* Location: ./application/models/Model_solusi.php */