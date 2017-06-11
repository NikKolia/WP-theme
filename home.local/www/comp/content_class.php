<?php
require_once "modules_class.php";

class Content extends Modules {
	
	protected $title = "Домашний";
	protected $meta_desc = "Домашний";
	protected $meta_key = "Домашний";
	
	protected function getContent() {
		$this->setLinkSort();
		$sort = $this->data["sort"];
		$up = $this->data["up"];
		$this->template->set("message", $this->message());
		$this->template->set("table_products_title", "Все задания");
		$this->template->set("products", $this->product->getAllSort($sort, $up, $this->config->productsi_count));
		$this->template->set("pages", $this->product->getPages());
		return "index";
	}
	
}

?>