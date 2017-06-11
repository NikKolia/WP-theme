<?php
require_once "global_class.php";

class Image extends GlobalClass {
	
	public function __construct() {
		parent::__construct("images");
	}
	
	public function getAllTable() {
		return $this->getAll("id");
	}
	
	public function getTableData($product_table, $count, $offset) {
		$l = $this->getL($count, $offset);
		$query = "SELECT `".$this->table_name."`.`id`,
		`".$this->table_name."`.`product_id`,
		`".$this->table_name."`.`imgs`,
		`".$this->table_name."`.`img_title`,
		`".$this->table_name."`.`img_description`,
		`".$this->table_name."`.`date`,
		`$product_table`.`title` as `product`
		FROM `".$this->table_name."`
		INNER JOIN `$product_table` ON `$product_table`.`id` = `".$this->table_name."`.`product_id`
		ORDER BY `product_id`,`img_title` $l";
		return $this->transform($this->db->select($query));
	}
	
	protected function transformElement($image) {
		$image["imgs"] = $this->config->address.$this->config->dir_img_images.$image["imgs"];
		// $image["img_description"] = str_replace("\n", "<br />", $image["img_description"]);
		$image["link_admin_edit"] = $this->url->adminEditImage($image["id"]);
		$image["link_admin_delete"] = $this->url->adminDeleteImage($image["id"]);
		$image["date"] = $this->format->date($image["date"]);
		return $image;
	}
	
	public function get($id, $product_table) {
		if (!$this->check->id($id)) return false;
		$query = "SELECT `".$this->table_name."`.`id`,
		`".$this->table_name."`.`product_id`,
		`".$this->table_name."`.`imgs`,
		`".$this->table_name."`.`img_title`,
		`".$this->table_name."`.`img_description`,
		`".$this->table_name."`.`date`,
		`$product_table`.`title` as `product`
		FROM `".$this->table_name."`
		INNER JOIN `$product_table` ON `$product_table`.`id` = `".$this->table_name."`.`product_id`
		WHERE `".$this->table_name."`.`id` = ".$this->config->sym_query;
		return $this->transform($this->db->selectRow($query, array($id)));
	}
	
	protected function checkData($data) {
		if (!$this->check->id($data["product_id"])) return "UNKNOWN_ERROR";
		if (!$this->check->id($data["img_title"])) return "ERROR_IMG_TITLE";
		if (!$this->check->text($data["img_description"], true)) return "ERROR_DESCRIPTION";
		if (!$this->check->title($data["imgs"])) return "ERROR_IMG";
		if (!$this->check->ts($data["date"])) return "UNKNOWN_ERROR";
		return true;
	}
	
	public function getDate($id) {
		return $this->getFieldOnID($id, "date");
	}
	
	public function getImages($id) {
		return $this->getFieldOnID($id, "imgs");
	}
	
}

?>