<?php
require_once "childmodules_class.php";

class ChildContent extends ChildModules {
	
	protected $title = "Child's account";
	protected $meta_desc = "Child's account.";
	protected $meta_key = "child's account";
	
	protected function getContent() {
		$start = $this->format->getTime("", true);
		$end = $this->format->getTime("", false);
		$result = $this->statistics->getDataForAdmin($start, $end);
		$this->template->set("result", $result);
		return "index";
	}
	
}

?>