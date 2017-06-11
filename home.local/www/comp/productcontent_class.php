<?php
require_once "modules_class.php";

class ProductContent extends Modules {
	
	
	protected function getContent() {
		$product_info = $this->product->get($this->data["id"], $this->section->getTableName());
		if (!$product_info) return $this->notFound();
		$this->title = $product_info["title"];
		$this->meta_desc = "Описание ".$product_info["title"]." №".$product_info["id"];
		$this->meta_key = mb_strtolower("описание ".$product_info["title"]." №".$product_info["id"]);
		
		$this->template->set("link_section", $this->url->section($product_info["section_id"]));
		$this->template->set("product", $product_info);
		$this->template->set("comments", $this->product->getComment($this->data["id"], $this->comment->getTableName()));
		$this->template->set("images", $this->product->getImages($this->data["id"], $this->image->getTableName()));
		$this->template->set("product_id", $product_info["id"]);
		$this->template->set("products", $this->product->getOthers($product_info, $this->config->count_others));
		$this->template->set("name", $_SESSION["name"]);
		$this->template->set("email", $_SESSION["email"]);
		$this->template->set("comment", $_SESSION["comment"]);
		$this->template->set("message", $this->message());
		return "product";
	}
	
}

?>