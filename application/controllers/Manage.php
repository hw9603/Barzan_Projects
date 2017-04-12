<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!isset($_SESSION['user'])){
			header("Location:/login?url=".base64_encode($_SERVER["REQUEST_URI"]));
		}
		$this->load->model('m_manage');
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		$data["page_name"] = substr($_SERVER["REQUEST_URI"], 1, strlen($_SERVER["REQUEST_URI"]));
		$data["discription"] = $data["page_name"];
		//added by log
		$data['projects'] = $this->m_manage->get_news_info();
		$this->load->view("manage", $data);
	}

	public function save()
	{
		$past = $this->input->post('past');
		$title = $this->input->post('title');
		$subtitle = $this->input->post('subtitle');
		$abstract = $this->input->post('abstract');
		$website = $this->input->post('website');
		$publication = $this->input->post('publication');
		$people = $this->input->post('people');
		if (strlen($title) > 100 || strlen($subtitle) > 200 || strlen($website) > 500 || strlen($abstract) > 100000 || strlen($publication) > 100000)
			return;
		//过滤html标签
		$title = strip_tags($title);
		$subtitle = strip_tags($subtitle);
		$website = strip_tags($website);
		$news_info = array('past' => $past,
						   'title' => $title,
						   'subtitle' => $subtitle,
						   'website' => $website,
						   'people' => $people,
						   'abstract' => $abstract,
						   'publication' => $publication );
		$id="!";
		$id = $this->m_manage->write_news_info($news_info);
		if($id!="!")
		{
			echo $id;
		}
		else
		{
			echo "error";
		}
	}

	public function update()
	{
		$pid = $this->input->post('pid');
		$past = $this->input->post('past');
		$title = $this->input->post('title');
		$subtitle = $this->input->post('subtitle');
		$abstract = $this->input->post('abstract');
		$website = $this->input->post('website');
		$publication = $this->input->post('publication');
		$people = $this->input->post('people');
		if (strlen($title) > 100 || strlen($subtitle) > 200 || strlen($website) > 500 || strlen($abstract) > 100000 || strlen($publication) > 100000)
			return;
		
		$title = strip_tags($title);
		$subtitle = strip_tags($subtitle);
		$website = strip_tags($website);
		$news_info = array('pid' => $pid,
						   'past' => $past,
						   'title' => $title,
						   'subtitle' => $subtitle,
						   'website' => $website,
						   'people' => $people,
						   'abstract' => $abstract,
						   'publication' => $publication );
		$id="!";
		$id = $this->m_manage->update_news_info($news_info);
		if($id==$pid)
		{
			echo $id;
		}
		else
		{
			echo "error";
		}
	}

	public function delete()
	{
		$pid = $this->input->post('id'); ///////
		$this->m_manage->delete_news($pid); //////
	}

	public function modify()
	{
		$pid = $this->input->post('id');
		$result = $this->m_manage->read_news_article($pid);
		echo $result->title .'####################' .$result->subtitle .'####################' .$result->website .'####################' .$result->people .'####################' .$result->abstract .'####################' .$result->publication;
	}

	public function upload()
	{
		/*$this->model->title = $_FILES['userfile']['name'];
		$this->model->image = file_get_contents($_FILES['userfile']['tmp_name']);

		if ($this->model->store() === TRUE) {
			$notification = '<div class="alert alert-success">Success uploading <strong>'. $_FILES['userfile']['name'] . '</strong> to DB.</div>';
		} else {
			$notification = '<div class="alert alert-danger">Failed uploading image.</div>';
		}

		$this->session->set_flashdata('notification', $notification);

		redirect(site_url('/'), 'refresh');*/
	}

}
