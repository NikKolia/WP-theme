<?php
require_once "editmodules_class.php";

class EditContent extends EditModules {
	
	protected $title = "Mother's account";
	protected $meta_desc = "Mother's account.";
	protected $meta_key = "mother's account";
	
	protected function getContent() {
		$start = $this->format->getTime("", true);
		$end = $this->format->getTime("", false);
		$result = $this->statistics->getDataForAdmin($start, $end);
		$this->template->set("result", $result);
		return "index";
	}
	
}

?>