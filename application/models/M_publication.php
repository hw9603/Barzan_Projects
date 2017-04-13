<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_publication extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function get_publication_info()
	{
		$sql = 'SELECT * FROM `publication_info` ORDER BY `year` DESC';
		$query = $this->db->query($sql);
		return $query->result();
	}

}
