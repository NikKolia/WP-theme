<?php
require_once "lib/abstractmodules_class.php";
require_once "lib/urlchild_class.php";
require_once "lib/auth_class.php";
require_once "lib/statistics_class.php";

abstract class ChildModules extends AbstractModules {
	
	protected $url_child;
	protected $page_info;
	protected $statistics;
	
	public function __construct($check_auth = true) {
		parent::__construct();
		
		$this->url_child = new URLChild();
		$this->statistics = new Statistics();
		$auth = $this->checkAuth();
		if ($check_auth && !$auth) $this->redirectAuth();
		$this->setMenu();
		$this->setPageInfo();
		$this->template->set("auth", $auth);
		$this->template->set("content", $this->getContent());
		$this->template->set("message", $this->message());
		$this->template->set("action", $this->url_child->action());
		$this->template->set("title", $this->title);
		$this->template->set("meta_desc", $this->meta_desc);
		$this->template->set("meta_key", $this->meta_key);
		$this->template->set("pages", $this->getPages());
		$this->template->display("main");
	}
	
	private function getPages() {
		$pages = array();
		for ($i = 1; $i <= $this->page_info["count"]; $i++) {
			$pages[] = $this->url_child->page($i);
		}
		return $pages;
	}
	
	private function setPageInfo() {
		$this->page_info["page"] = isset($this->data["page"])? $this->data["page"]: 1;
		if ($this->page_info["page"] <= 0) $this->notFound();
		$this->page_info["offset"] = ($this->page_info["page"] - 1) * $this->config->pagination_count;
	}
	
	private function setMenu() {
		$this->template->set("index", $this->url_child->index());
		$this->template->set("link_products", $this->url_child->products());
		$this->template->set("link_images", $this->url_child->images());
		$this->template->set("link_videos", $this->url_child->videos());
		$this->template->set("link_infos", $this->url_child->infos());
		$this->template->set("link_orders", $this->url_child->orders());
		$this->template->set("link_sections", $this->url_child->sections());
		$this->template->set("link_comments", $this->url_child->comments());
		$this->template->set("link_discounts", $this->url_child->discounts());
		$this->template->set("link_posts", $this->url_child->posts());
		$this->template->set("link_statistics", $this->url_child->statistics());
		$this->template->set("logout", $this->url_child->logout());
	}
	
	private function checkAuth() {
		$auth = new Auth();
		return $auth->checkChild($_SESSION["login"], $_SESSION["password"]);
	}
	
	private function redirectAuth() {
		$this->redirect($this->url_child->auth());
	}

	protected function getDirTmpl() {
		return $this->config->dir_tmpl_child;
	}
}

?>