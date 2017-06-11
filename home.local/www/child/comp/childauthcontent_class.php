<?php
require_once "childmodules_class.php";

class ChildAuthContent extends ChildModules {
	
	protected $title = "Child's account";
	protected $meta_desc = "Child's account.";
	protected $meta_key = "child's account";
	
	public function __construct() {
		parent::__construct(false);
	}
	
	protected function getContent() {
		if ($this->template->auth) $this->redirect($this->url_child->index());
		if ($_SERVER["HTTP_REFERER"] != $this->url_child->getThisURL()) {
			if ($_SERVER["HTTP_REFERER"] != $this->url_child->action()) {
				$_SESSION["r"] = $_SERVER["HTTP_REFERER"];
			}
		}
		$this->template->set("login", $_SESSION["login"]);
		$this->template->set("r", $_SESSION["r"]);
		return "auth";
	}
	
}

?>