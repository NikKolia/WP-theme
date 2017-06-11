<?php
require_once "adminmodules_class.php";

class AdminContent extends AdminModules {
	
	protected $title = "Father's account";
	protected $meta_desc = "Father's account.";
	protected $meta_key = "father's account";
	
	protected function getContent() {
		$start = $this->format->getTime("", true);
		$end = $this->format->getTime("", false);
		$result = $this->statistics->getDataForAdmin($start, $end);
		$this->template->set("result", $result);
		return "index";
	}
	
}

?>