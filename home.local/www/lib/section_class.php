<?php
require_once "global_class.php";

class Section extends GlobalClass {
	
	public function __construct() {
		parent::__construct("sections");
	}
	
	public function getAllData() {
		return $this->transform($this->getAllid("id"));
	}
	
	public function getTableData($count, $offset) {
		return $this->transform($this->getAll("id", true, $count, $offset));
	}
	
	public function get($id) {
		return $this->transform(parent::get($id));
	}
	
	protected function transformElement($section) {
		$section["infoimg_description"] = str_replace("\n", "<br />", $section["infoimg_description"]);
		$section["video_desc"] = str_replace("\n", "<br />", $section["video_desc"]);
		$section["infoimgs"] = $this->config->address.$this->config->dir_img_infos.$section["infoimgs"];
		$section["link"] = $this->url->section($section["id"]);
		$section["link_admin_edit"] = $this->url->adminEditSection($section["id"]);
		$section["link_admin_delete"] = $this->url->adminDeleteSection($section["id"]);		
		$section["link_edit_edit"] = $this->url->editEditSection($section["id"]);
		$section["link_edit_delete"] = $this->url->editDeleteSection($section["id"]);		
		$section["link_child_edit"] = $this->url->childEditSection($section["id"]);
		$section["link_child_delete"] = $this->url->childDeleteSection($section["id"]);
		return $section;
	}
	
	protected function checkData($data) {
		if (!$this->check->title($data["title"])) return "ERROR_TITLE";
		return true;
	}
	
	public function getInfoses($id, $info_table) {
		if (!$this->check->id($id)) return false;
		$query = "SELECT
		`$info_table`.`infoimgs`,
		`$info_table`.`infoimg_title`,
		`$info_table`.`infoimg_description`
		FROM `".$this->table_name."`
		INNER JOIN `$info_table` ON `$info_table`.`section_id` = `".$this->table_name."`.`id`
		WHERE `".$this->table_name."`.`id` = ".$this->config->sym_query." ORDER BY `infoimg_title`";
		return $this->transform($this->db->select($query, array($id)));
	}
	
	public function getVideos($id, $video_table) {
		if (!$this->check->id($id)) return false;
		$query = "SELECT
		`$video_table`.`sec_videos`,
		`$video_table`.`video_title`,
		`$video_table`.`video_desc`
		FROM `".$this->table_name."`
		INNER JOIN `$video_table` ON `$video_table`.`section_id` = `".$this->table_name."`.`id`
		WHERE `".$this->table_name."`.`id` = ".$this->config->sym_query." ORDER BY `video_title`";
		return $this->transform($this->db->select($query, array($id)));
	}
	
}

?>