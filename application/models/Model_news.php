<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_news extends CI_Model {

	private $table = 'news';

	function get_total_news() {
    $this->db->select('COUNT(*) AS jumlah');
    $this->db->from($this->table);
    return $this->db->get()->row();
  }

}

/* End of file Model_news.php */
/* Location: ./application/models/Model_news.php */