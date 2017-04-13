<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_publication');
//		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$data['publication'] = $this->m_publication->get_publication_info();
		$this->load->view('publication', $data);
	}
}