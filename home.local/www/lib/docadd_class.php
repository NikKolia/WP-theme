<?php
require_once "global_class.php";

class Docadd extends GlobalClass {
	
	public function __construct() {
		parent::__construct("products");
	}
	
	protected function transformElement($docadd) {
		// $comment["comment"] = str_replace("\n", "<br />", $comment["comment"]);
		// $docadd["date"] = $this->format->date($docadd["date"]);
		return $docadd;
	}
	
	protected function checkData($data) {
		if (!$this->check->id($data["section_id"])) return "UNKNOWN_ERROR";
		if (!$this->check->amount($data["price"])) return "ERROR_DEAL";
		if (!$this->check->title($data["title"])) return "ERROR_TOPIC";
		if (!$this->check->text($data["model"])) return "ERROR_AGENT";
		// if (!$this->check->text($data["description"])) return "ERROR_DESCRIPTION";
		return true;
	}
	
}

?>