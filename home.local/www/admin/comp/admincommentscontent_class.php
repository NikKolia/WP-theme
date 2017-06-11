<?php
require_once "adminform_class.php";

class AdminCommentsContent extends AdminForm {
	
	protected $title = "Отзывы и комментарии";
	protected $meta_desc = "Страница с отзывами и комментариями";
	protected $meta_key = "отзывы, комментарии, список отзывов, список комментариев";
	
	protected function getFormData() {
		$form_data = array();
		$this->template->set("products", $this->product->getAllcomData());
		$form_data["fields"] = array("product_id", "email", "name", "comment");
		$form_data["func_add"] = "add_comment";
		$form_data["func_edit"] = "edit_comment";
		$form_data["title_add"] = "Добавление комментария";
		$form_data["title_edit"] = "Редактирование комментария";
		$form_data["get"] = $this->comment->get($this->data["id"], $this->product->getTableName());
		$form_data["form_t"] = "comment_form";
		$form_data["t"] = "comments";
		$form_data["obj"] = $this->comment;
		$form_data["table_data"] = $this->comment->getTableData($this->product->getTableName(), $this->config->pagination_count, $this->page_info["offset"]);
		return $form_data;
	}
}

?>