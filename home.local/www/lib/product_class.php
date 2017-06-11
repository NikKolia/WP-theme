<?php
require_once "global_class.php";

class Product extends GlobalClass {
	
	public function __construct() {
		parent::__construct("products");
		
		$this->setPageInfo($section_id);
		$this->setPageInfoI();
	}
	
	public function getAllimgData() {
		return $this->transform($this->getAll("id"));
	}
	
	public function getAllcomData() {
		return $this->transform($this->getAll("id"));
	}
	
	public function getAllTable() {
		return $this->getAll("id");
	}
	
	public function getTableData($section_table, $count, $offset) {
		$l = $this->getL($count, $offset);
		$query = "SELECT `".$this->table_name."`.`id`,
		`".$this->table_name."`.`section_id`,
		`".$this->table_name."`.`buh`,
		`".$this->table_name."`.`title`,
		`".$this->table_name."`.`model`,
		`".$this->table_name."`.`price`,
		`".$this->table_name."`.`description`,
		`".$this->table_name."`.`datedg`,
		`".$this->table_name."`.`frame`,
		`$section_table`.`title` as `section`
		FROM `".$this->table_name."`
		LEFT JOIN `$section_table` ON `$section_table`.`id` = `".$this->table_name."`.`section_id`
		ORDER BY `id` DESC $l";
		return $this->transform($this->db->select($query));
	}
	
	protected function transformElement($product) {
		$product["img"] = $this->config->address.$this->config->dir_img_products.$product["img"];
		$product["imgs"] = $this->config->address.$this->config->dir_img_images.$product["imgs"];
		$product["link"] = $this->url->product($product["id"]);
		$product["link_cart"] = $this->url->addCart($product["id"]);
		$product["description"] = str_replace("\n", "<br />", $product["description"]);
		$product["img_description"] = str_replace("\n", "<br />", $product["img_description"]);
		$product["link_delete"] = $this->url->deleteCart($product["id"]);
		$product["link_admin_edit"] = $this->url->adminEditProduct($product["id"]);
		$product["link_admin_delete"] = $this->url->adminDeleteProduct($product["id"]);		
		$product["link_edit_edit"] = $this->url->editEditProduct($product["id"]);
		$product["link_edit_delete"] = $this->url->editDeleteProduct($product["id"]);		
		$product["link_child_edit"] = $this->url->childEditProduct($product["id"]);
		$product["link_child_delete"] = $this->url->childDeleteProduct($product["id"]);
		$product["datecom"] = $this->format->date($product["datecom"]);
		return $product;
	}
	
	private function checkSortUp($sort, $up) {
		return ((($sort === "buh") || ($sort === "datedg")) && (($up === "1") || ($up === "0")));
	}
	
	public function getAllOnSectionID($section_id, $sort, $up, $count) {
		$offset = ($this->page_info["page"] - 1) * $this->config->products_count;
		if (!$this->checkSortUp($sort, $up)) return $this->transform($this->getAllOnField("section_id", $section_id, "id", false, $count, $offset));
		return $this->transform($this->getAllOnField("section_id", $section_id, $sort, $up, $count, $offset));
	}
	
	public function getAllSort($sort, $up, $count) {
		$offset = ($this->page_info["page"] - 1) * $this->config->productsi_count;
		if (!$this->checkSortUp($sort, $up)) return $this->transform($this->getAllData("id", false, $count, $offset));
		return $this->transform($this->getAllData($sort, $up, $count, $offset));
	}
	
	public function getAllData($order = false, $up = true, $count = false, $offset = false) {
		$ol = $this->getOL($order, $up, $count, $offset);
		$query = "SELECT * FROM `".$this->table_name."` $ol";
		return $this->db->select($query);
	}
	
	public function get($id, $section_table) {
		if (!$this->check->id($id)) return false;
		$query = "SELECT `".$this->table_name."`.`id`,
		`".$this->table_name."`.`section_id`,
		`".$this->table_name."`.`img`,
		`".$this->table_name."`.`title`,
		`".$this->table_name."`.`model`,
		`".$this->table_name."`.`price`,
		`".$this->table_name."`.`description`,
		`".$this->table_name."`.`datedg`,
		`".$this->table_name."`.`frame`,
		`".$this->table_name."`.`buh`,
		`$section_table`.`title` as `section`
		FROM `".$this->table_name."`
		LEFT JOIN `$section_table` ON `$section_table`.`id` = `".$this->table_name."`.`section_id`
		WHERE `".$this->table_name."`.`id` = ".$this->config->sym_query;
		return $this->transform($this->db->selectRow($query, array($id)));
	}
	
	public function getAllOnIDs($ids) {
		$query_ids = "";
		$params = array();
		for ($i = 0; $i < count($ids); $i++) {
			$query_ids .= $this->config->sym_query.",";
			$params[] = $ids[$i];
		}
		$query_ids = substr($query_ids, 0, -1);
		$query = "SELECT * FROM `".$this->table_name."` WHERE `id` IN ($query_ids)";
		return $this->transform($this->db->select($query, $params));
	}
	
	public function getPriceOnIDs($ids) {
		$products = $this->getAllOnIDs($ids);
		$result = array();
		for ($i = 0; $i < count($products); $i++) {
			$result[$products[$i]["id"]] = $products[$i]["price"];
		}
		$summa = 0;
		for ($i = 0; $i < count($ids); $i++) {
			$summa += $result[$ids[$i]];
		}
		return $summa;
	}
	
	public function getOthers($product_info, $count) {
		$l = $this->getL($count, 0);
		$query = "SELECT * FROM `".$this->table_name."` WHERE `section_id` != 8 AND `section_id` != 2 AND `section_id` != 4 AND `section_id` != 6 AND `id` != ".$this->config->sym_query." ORDER BY `id` $l";
		return $this->transform($this->db->select($query, array($product_info["id"])));
	}
	
	public function getDate($id) {
		return $this->getFieldOnID($id, "date");
	}
	
	public function getImg($id) {
		return $this->getFieldOnID($id, "img");
	}
	
	public function search($q, $sort, $up) {
		if (!$this->checkSortUp($sort, $up)) return $this->transform(parent::search($q, array("id", "title", "description", "model", "frame", "datedg")));
		return $this->transform(parent::search($q, array("id", "title", "description", "model", "frame", "datedg"), $sort, $up));
	}
	
	protected function checkData($data) {
		// if (!$this->check->title($data["title"])) return "ERROR_TOPIC";
		return true;
	}

	public function getComment($id, $comment_table) {
		if (!$this->check->id($id)) return false;
		$query = "SELECT
		`$comment_table`.`comment`,
		`$comment_table`.`datecom`,
		`$comment_table`.`name`
		FROM `".$this->table_name."`
		INNER JOIN `$comment_table` ON `$comment_table`.`product_id` = `".$this->table_name."`.`id`
		WHERE `".$this->table_name."`.`id` = ".$this->config->sym_query." ORDER BY `datecom` DESC";
		return $this->transform($this->db->select($query, array($id)));
	}
	
	public function getImages($id, $image_table) {
		if (!$this->check->id($id)) return false;
		$query = "SELECT
		`$image_table`.`imgs`,
		`$image_table`.`img_title`,
		`$image_table`.`img_description`
		FROM `".$this->table_name."`
		INNER JOIN `$image_table` ON `$image_table`.`product_id` = `".$this->table_name."`.`id`
		WHERE `".$this->table_name."`.`id` = ".$this->config->sym_query." ORDER BY `img_title`";
		return $this->transform($this->db->select($query, array($id)));
	}
	
	public function getID($id) {
		return $this->transform(parent::get($id));
	}
	
	public function getPages() {
		$pages = array();
		for ($i = 1; $i <= $this->page_info["count"]; $i++) {
			$pages[] = $this->url->page($i);
		}
		return $pages;
	}
	
	public function setPageInfo($section_id) {
		$this->page_info["page"] = isset($_GET["page"])? $_GET["page"] : 1;
		if ($this->page_info["page"] <= 0) $this->notFound();
		$this->page_info["count"] = $this->getPageCount($section_id);
	}
	
	protected function getPageCount($section_id) {
		return ceil($this->getCountsec($section_id) / $this->config->products_count);
	}

	public function getPagesI() {
		$pages = array();
		for ($i = 1; $i <= $this->page_info["count"]; $i++) {
			$pages[] = $this->url->page($i);
		}
		return $pages;
	}
	
	public function setPageInfoI() {
		$this->page_info["page"] = isset($_GET["page"])? $_GET["page"] : 1;
		if ($this->page_info["page"] <= 0) $this->notFound();
		$this->page_info["count"] = $this->getPageCountI();
	}
	
	protected function getPageCountI() {
		return ceil($this->getCount() / $this->config->productsi_count);
	}
}

?>