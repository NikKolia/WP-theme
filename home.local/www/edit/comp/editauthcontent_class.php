<?php
require_once "editmodules_class.php";

class EditAuthContent extends EditModules {
	
	protected $title = "Mother's account";
	protected $meta_desc = "Mother's account.";
	protected $meta_key = "mother's account";
	
	public function __construct() {
		parent::__construct(false);
	}
	
	protected function getContent() {
		if ($this->template->auth) $this->redirect($this->url_edit->index());
		if ($_SERVER["HTTP_REFERER"] != $this->url_edit->getThisURL()) {
			if ($_SERVER["HTTP_REFERER"] != $this->url_edit->action()) {
				$_SESSION["r"] = $_SERVER["HTTP_REFERER"];
			}
		}
		$this->template->set("login", $_SESSION["login"]);
		$this->template->set("r", $_SESSION["r"]);
		return "auth";
	}
	
}

?>