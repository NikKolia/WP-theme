<?php
require_once "global_class.php";

class Info extends GlobalClass {
	
	public function __construct() {
		parent::__construct("infos");
	}
	
	public function getAllData($count) {
		return $this->transform($this->getAll("date", false, $count));
	}
	
	public function getAllTable() {
		return $this->getAll("id");
	}
	
	public function getTableData($section_table, $count, $offset) {
		$l = $this->getL($count, $offset);
		$query = "SELECT `".$this->table_name."`.`id`,
		`".$this->table_name."`.`section_id`,
		`".$this->table_name."`.`infoimgs`,
		`".$this->table_name."`.`infoimg_title`,
		`".$this->table_name."`.`infoimg_description`,
		`".$this->table_name."`.`date`,
		`$section_table`.`title` as `section`
		FROM `".$this->table_name."`
		INNER JOIN `$section_table` ON `$section_table`.`id` = `".$this->table_name."`.`section_id`
		ORDER BY `section_id`,`infoimg_title` $l";
		return $this->transform($this->db->select($query));
	}
	
	protected function transformElement($info) {
		$info["infoimgs"] = $this->config->address.$this->config->dir_img_infos.$info["infoimgs"];
		$info["infoimg_description"] = str_replace("\n", "<br />", $info["infoimg_description"]);
		$info["link_admin_edit"] = $this->url->adminEditInfo($info["id"]);
		$info["link_admin_delete"] = $this->url->adminDeleteInfo($info["id"]);
		$info["date"] = $this->format->date($info["date"]);
		return $info;
	}
	
	public function get($id, $section_table) {
		if (!$this->check->id($id)) return false;
		$query = "SELECT `".$this->table_name."`.`id`,
		`".$this->table_name."`.`section_id`,
		`".$this->table_name."`.`infoimgs`,
		`".$this->table_name."`.`infoimg_title`,
		`".$this->table_name."`.`infoimg_description`,
		`".$this->table_name."`.`date`,
		`$section_table`.`title` as `section`
		FROM `".$this->table_name."`
		INNER JOIN `$section_table` ON `$section_table`.`id` = `".$this->table_name."`.`section_id`
		WHERE `".$this->table_name."`.`id` = ".$this->config->sym_query;
		return $this->transform($this->db->selectRow($query, array($id)));
	}
	
	protected function checkData($data) {
		if (!$this->check->id($data["section_id"])) return "UNKNOWN_ERROR";
		if (!$this->check->id($data["infoimg_title"])) return "ERROR_IMG_TITLE";
		if (!$this->check->text($data["infoimg_description"], true)) return "ERROR_DESCRIPTION";
		if (!$this->check->title($data["infoimgs"])) return "ERROR_IMG";
		if (!$this->check->ts($data["date"])) return "UNKNOWN_ERROR";
		return true;
	}
	
	public function getDate($id) {
		return $this->getFieldOnID($id, "date");
	}
	
	public function getInfos($id) {
		return $this->getFieldOnID($id, "infoimgs");
	}
	
}

?>