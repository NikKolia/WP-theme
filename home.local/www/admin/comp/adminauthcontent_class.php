<?php
require_once "adminmodules_class.php";

class AdminAuthContent extends AdminModules {
	
	protected $title = "Father's account";
	protected $meta_desc = "Father's account.";
	protected $meta_key = "father's account";
	
	public function __construct() {
		parent::__construct(false);
	}
	
	protected function getContent() {
		if ($this->template->auth) $this->redirect($this->url_admin->index());
		if ($_SERVER["HTTP_REFERER"] != $this->url_admin->getThisURL()) {
			if ($_SERVER["HTTP_REFERER"] != $this->url_admin->action()) {
				$_SESSION["r"] = $_SERVER["HTTP_REFERER"];
			}
		}
		$this->template->set("login", $_SESSION["login"]);
		$this->template->set("r", $_SESSION["r"]);
		return "auth";
	}
	
}

?>