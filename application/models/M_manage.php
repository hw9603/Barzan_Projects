<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_manage extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

/*////////////// this is a template
	public function get_site_name()
	{
		
		$query = $this->db->get('aa_site_info'); // get all data from table aa_site_info
		foreach ($query->result() as $row)
		{
			echo $row->item.'<br> ';
		    echo $row->value.'<br> ';
		}
		$test = $query->result()[1]->value;
		return $test;
		
		// get data from aa_site_info where item == "site_name"
		$query = $this->db->get_where('aa_site_info', array('item' => 'site_name'));

		return $query->result()[0]->value;
	}
*///////////////

	/*
	** @ $news_info 
	** Return true or false, insert $news_info into database.
	** news_info include title content.
	*/
	
	public function get_news_info($news_num = 3)//added by log (copied from m_home)
	{
		$sql = 'SELECT * FROM `project_info` ORDER BY `pid` ASC';
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function write_news_info($news_info)
	{
		//TODO//
		$sql = "INSERT INTO `project_info`(`past`, `title`, `subtitle`, `website`, `people`, `abstract`, `publication`) VALUES ('".$news_info['past']."','".$news_info['title']."','".$news_info['subtitle']."','".$news_info['website']."','".$news_info['people']."','".$news_info['abstract']."','".$news_info['publication']."')";
		$this->db->query($sql);
		$sql = "SELECT `pid` FROM `project_info` WHERE `title`='".$news_info['title']."'";
		$query = $this->db->query($sql);
		return $query->result()[0]->pid;
	}

	public function update_news_info($news_info)
	{
		$sql = "UPDATE `project_info` SET `title`='" .$news_info['title'] ."', `past`='" .$news_info['past'] ."', `subtitle`='" .$news_info['subtitle'] ."', `website`='" .$news_info['website'] ."', `people`='" .$news_info['people'] ."', `abstract`='" .$news_info['abstract'] ."', `publication`='" .$news_info['publication'] ."' WHERE `pid`=" .$news_info['pid'];
		$this->db->query($sql);
		$sql = "SELECT `pid` FROM `project_info` WHERE `title`='".$news_info['title']."'";
		$query = $this->db->query($sql);
		return $query->result()[0]->pid;
	}

	/*
	** @ $news_info 
	** Return true or false, insert $news_info into database.
	** there should be ID in news_info and the news with 
	** corresponding ID should be updated. If no ID matches
	** return false. 
	*/
	public function read_news_article($project_id)
	{
		$sql = "SELECT * FROM `project_info` WHERE `pid` = $project_id";
		$query = $this->db->query($sql);
		return $query->result()[0];
	}

	/*
	** @ $news_info 
	** Return true or false, insert $news_info into database.
	** news_info include ID. If no ID matches return false. 
	** update ID?
	*/
	public function delete_news($project_id)
	{
		$sql = "DELETE FROM `project_info` WHERE `pid` = $project_id";
		$query = $this->db->query($sql);
		return true;
	}

	public function store()
	{
		/*try {
			if (
				empty($this->title) ||
				empty($this->image)
			) {
				return FALSE;
			} else {
				$action = $this->db->insert($this->table, $this);
				$this->flush();

				return $action;
			}
		} catch (Exception $e) {
			return FALSE;
		}*/
	}

	public function add_publication_info($pub_info)
	{
		//TODO//
		$sql = "INSERT INTO `publication_info`(`article_title`, `article_link`, `year`, `date`, `image_link`, `people`, `publisher`) VALUES ('".$pub_info['article_title']."','".$pub_info['article_link']."','".$pub_info['year']."','".$pub_info['date']."','".$pub_info['image_link']."','".$pub_info['people']."','".$pub_info['publisher']."')";
		$this->db->query($sql);
		$sql = "SELECT `publication_id` FROM `publication_info` WHERE `article_title`='".$pub_info['article_title']."'";
		$query = $this->db->query($sql);
		return $query->result()[0]->pid;
	}
}
