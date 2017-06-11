<?php
require_once "global_class.php";
require_once "lib/url_class.php";

class Post extends GlobalClass {
	
	protected $page_info;
	
	public function __construct() {
		parent::__construct("posts");
		
		$this->setPageInfo();
	}
	
	public function getPages() {
		$pages = array();
		for ($i = 1; $i <= $this->page_info["count"]; $i++) {
			$pages[] = $this->url->page($i);
		}
		return $pages;
	}
	
	private function setPageInfo() {
		$this->page_info["page"] = isset($_GET["page"])? $_GET["page"] : 1;
		if ($this->page_info["page"] <= 0) $this->notFound();
		$this->page_info["count"] = $this->getPageCount();
	}
	
	protected function getPageCount() {
		return ceil($this->getCount() / $this->config->posts_count);
	}
	
	public function getAllTable() {
		return $this->getAll("id");
	}
	
	public function getTableData($count, $offset) {
		$l = $this->getL($count, $offset);
		$query = "SELECT `".$this->table_name."`.`id`,
		`".$this->table_name."`.`post`,
		`".$this->table_name."`.`post_img`,
		`".$this->table_name."`.`date`
		FROM `".$this->table_name."`
		ORDER BY `date` DESC $l";
		return $this->transform($this->db->select($query));
	}
	
	protected function transformElement($post) {
		$post["post_img"] = $this->config->address.$this->config->dir_img_posts.$post["post_img"];
		// $post["post"] = str_replace("\n", "<br />", $post["post"]);
		$post["link_admin_edit"] = $this->url->adminEditPost($post["id"]);
		$post["link_admin_delete"] = $this->url->adminDeletePost($post["id"]);
		$post["date"] = $this->format->date($post["date"]);
		return $post;
	}
	
	public function get($id) {
		if (!$this->check->id($id)) return false;
		$query = "SELECT `".$this->table_name."`.`id`,
		`".$this->table_name."`.`post`,
		`".$this->table_name."`.`post_img`,
		`".$this->table_name."`.`date`
		FROM `".$this->table_name."`
		WHERE `".$this->table_name."`.`id` = ".$this->config->sym_query;
		return $this->transform($this->db->selectRow($query, array($id)));
	}
	
	protected function checkData($data) {
		if (!$this->check->text($data["post"], true)) return "ERROR_POST";
		if (!$this->check->title($data["post_img"])) return "ERROR_IMG";
		if (!$this->check->ts($data["date"])) return "UNKNOWN_ERROR";
		return true;
	}
	
	public function getDate($id) {
		return $this->getFieldOnID($id, "date");
	}
	
	public function getPostImg($id) {
		return $this->getFieldOnID($id, "post_img");
	}
	
	public function getPosts($count) {
		$offset = ($this->page_info["page"] - 1) * $this->config->posts_count;
		$l = $this->getL($count, $offset);
		$query = "SELECT * FROM `".$this->table_name."` ORDER BY `date` DESC $l";
		return $this->transform($this->db->select($query));
	}
	
}

?>