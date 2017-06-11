<?php
require_once "config_class.php";

class URL {
	
	protected $config;
	protected $amp;
	
	public function __construct($amp = true) {
		$this->config = new Config();
		$this->amp = $amp;
	}
	
	public function page($number) {
		$url = $this->deleteGET($this->getThisURL(), "page");
		if ($number == 1) return $this->returnURL($url);
		if (strpos($url, "?")) $sym = "&";
		else $sym = "?";
		return $this->returnURL($url.$sym."page=$number");
	}
	
	public function getView() {
		$view = $_SERVER["REQUEST_URI"];
		$view = substr($view, 1);
		if (($pos = strpos($view, "?")) !== false) {
			$view = substr($view, 0, $pos);
		}
		return $view;
	}
	
	public function setAMP($amp) {
		$this->amp = $amp;
	}
	
	public function getThisURL() {
		$uri = substr($_SERVER["REQUEST_URI"], 1);
		return $this->config->address.$uri;
	}
	
	protected function deleteGET($url, $param) {
		$res = $url;
		if (($p = strpos($res, "?")) !== false) {
			$paramstr = substr($res, $p + 1);
			$params = explode("&", $paramstr);
			$paramsarr = array();
			foreach ($params as $value) {
				$tmp = explode("=", $value);
				$paramsarr[$tmp[0]] = $tmp[1];
			}
			if (array_key_exists($param, $paramsarr)) {
				unset($paramsarr[$param]);
				$res = substr($res, 0, $p + 1);
				foreach ($paramsarr as $key => $value) {
					$str = $key;
					if ($value !== "") {
						$str .= "=$value";
					}
					$res .= "$str&";
				}
				$res = substr($res, 0, -1);
			}
		}
		return $res;
	}
	
	public function index() {
		return $this->returnURL("");
	}
	
	public function addorder($id) {
		return $this->returnURL("addorder?id=$id");
	}
	
	public function addCartoff($id) {
		return $this->returnURL("addcartoff?id=$id");
	}
	
	public function notFound() {
		return $this->returnURL("notfound");
	}
	
	public function cart() {
		return $this->returnURL("cart");
	}
	
	public function order() {
		return $this->returnURL("order");
	}
	
	public function message() {
		return $this->returnURL("message");
	}
	
	public function delivery() {
		return $this->returnURL("delivery");
	}
	
	public function contacts() {
		return $this->returnURL("contacts");
	}
	
	public function docadds() {
		return $this->returnURL("docadd");
	}
	
	public function posts() {
		return $this->returnURL("posts");
	}
	
	public function search() {
		return $this->returnURL("search");
	}
	
	public function section($id) {
		return $this->returnURL("section?id=$id");
	}
	
	public function product($id) {
		return $this->returnURL("product?id=$id");
	}
	
	public function addCart($id) {
		return $this->returnURL("functions.php?func=add_cart&id=$id");
	}
	
	public function deleteCart($id) {
		return $this->returnURL("functions.php?func=delete_cart&id=$id");
	}
	
	public function sortTitleUp() {
		return $this->sortOnField("buh", 1);
	}
	
	public function sortTitleDown() {
		return $this->sortOnField("buh", 0);
	}
	
	public function sortDateUp() {
		return $this->sortOnField("datedg", 1);
	}
	
	public function sortDateDown() {
		return $this->sortOnField("datedg", 0);
	}
	
	public function action() {
		return $this->returnURL("functions.php");
	}
	
	public function adminEditProduct($id) {
		return $this->returnURL("?view=products&func=edit&id=$id", $this->config->address_admin);
	}
	
	public function adminDeleteProduct($id) {
		return $this->returnURL("functions.php?func=delete_product&id=$id", $this->config->address_admin);
	}
	
	public function adminEditImage($id) {
		return $this->returnURL("?view=images&func=edit&id=$id", $this->config->address_admin);
	}
	
	public function adminDeleteImage($id) {
		return $this->returnURL("functions.php?func=delete_image&id=$id", $this->config->address_admin);
	}
	
	public function adminEditPost($id) {
		return $this->returnURL("?view=posts&func=edit&id=$id", $this->config->address_admin);
	}
	
	public function adminDeletePost($id) {
		return $this->returnURL("functions.php?func=delete_post&id=$id", $this->config->address_admin);
	}
	
	public function adminEditInfo($id) {
		return $this->returnURL("?view=infos&func=edit&id=$id", $this->config->address_admin);
	}
	
	public function adminDeleteInfo($id) {
		return $this->returnURL("functions.php?func=delete_info&id=$id", $this->config->address_admin);
	}
	
	public function adminEditVideo($id) {
		return $this->returnURL("?view=videos&func=edit&id=$id", $this->config->address_admin);
	}
	
	public function adminDeleteVideo($id) {
		return $this->returnURL("functions.php?func=delete_video&id=$id", $this->config->address_admin);
	}
	
	public function adminEditComment($id) {
		return $this->returnURL("?view=comments&func=edit&id=$id", $this->config->address_admin);
	}
	
	public function adminDeleteComment($id) {
		return $this->returnURL("functions.php?func=delete_comment&id=$id", $this->config->address_admin);
	}
	
	public function adminEditSection($id) {
		return $this->returnURL("?view=sections&func=edit&id=$id", $this->config->address_admin);
	}
	
	public function adminDeleteSection($id) {
		return $this->returnURL("functions.php?func=delete_section&id=$id", $this->config->address_admin);
	}
	
	public function adminEditOrder($id) {
		return $this->returnURL("?view=orders&func=edit&id=$id", $this->config->address_admin);
	}
	
	public function adminDeleteOrder($id) {
		return $this->returnURL("functions.php?func=delete_order&id=$id", $this->config->address_admin);
	}
	
	public function adminEditDiscount($id) {
		return $this->returnURL("?view=discounts&func=edit&id=$id", $this->config->address_admin);
	}
	
	public function adminDeleteDiscount($id) {
		return $this->returnURL("functions.php?func=delete_discount&id=$id", $this->config->address_admin);
	}
	
	protected function sortOnField($field, $up) {
		$this_url = $this->getThisURL();
		$this_url = $this->deleteGET($this_url, "up");
		$this_url = $this->deleteGET($this_url, "sort");
		if (strpos($this_url, "?") === false) $url = $this->url."?sort=$field&up=$up";
		else $url = $this_url."&sort=$field&up=$up";
		return $this->returnURL($url);
	}
	
	protected function returnURL($url, $index = false) {
		if (!$index) $index = $this->config->address;
		if ($url == "") return $index;
		if (strpos($url, $index) !== 0) $url = $index.$url;
		if ($this->amp) $url = str_replace("&", "&amp;", $url);
		return $url;
	}
	
	public function fileExists($file) {
		$arr = explode(PATH_SEPARATOR, get_include_path());
		foreach ($arr as $val) {
			if (file_exists($val."/".$file)) return true;
		}
		return false;
	}
	
	public function editEditProduct($id) {
		return $this->returnURL("?view=products&func=edit&id=$id", $this->config->address_edit);
	}
	
	public function editDeleteProduct($id) {
		return $this->returnURL("functions.php?func=delete_product&id=$id", $this->config->address_edit);
	}
	
	public function editEditImage($id) {
		return $this->returnURL("?view=images&func=edit&id=$id", $this->config->address_edit);
	}
	
	public function editDeleteImage($id) {
		return $this->returnURL("functions.php?func=delete_image&id=$id", $this->config->address_edit);
	}
	
	public function editEditPost($id) {
		return $this->returnURL("?view=posts&func=edit&id=$id", $this->config->address_edit);
	}
	
	public function editDeletePost($id) {
		return $this->returnURL("functions.php?func=delete_post&id=$id", $this->config->address_edit);
	}
	
	public function editEditInfo($id) {
		return $this->returnURL("?view=infos&func=edit&id=$id", $this->config->address_edit);
	}
	
	public function editDeleteInfo($id) {
		return $this->returnURL("functions.php?func=delete_info&id=$id", $this->config->address_edit);
	}
	
	public function editEditVideo($id) {
		return $this->returnURL("?view=videos&func=edit&id=$id", $this->config->address_edit);
	}
	
	public function editDeleteVideo($id) {
		return $this->returnURL("functions.php?func=delete_video&id=$id", $this->config->address_edit);
	}
	
	public function editEditComment($id) {
		return $this->returnURL("?view=comments&func=edit&id=$id", $this->config->address_edit);
	}
	
	public function editDeleteComment($id) {
		return $this->returnURL("functions.php?func=delete_comment&id=$id", $this->config->address_edit);
	}
	
	public function editEditSection($id) {
		return $this->returnURL("?view=sections&func=edit&id=$id", $this->config->address_edit);
	}
	
	public function editDeleteSection($id) {
		return $this->returnURL("functions.php?func=delete_section&id=$id", $this->config->address_edit);
	}
	
	public function editEditOrder($id) {
		return $this->returnURL("?view=orders&func=edit&id=$id", $this->config->address_edit);
	}
	
	public function editDeleteOrder($id) {
		return $this->returnURL("functions.php?func=delete_order&id=$id", $this->config->address_edit);
	}
	
	public function editEditDiscount($id) {
		return $this->returnURL("?view=discounts&func=edit&id=$id", $this->config->address_edit);
	}
	
	public function editDeleteDiscount($id) {
		return $this->returnURL("functions.php?func=delete_discount&id=$id", $this->config->address_edit);
	}
	
	public function childEditProduct($id) {
		return $this->returnURL("?view=products&func=edit&id=$id", $this->config->address_child);
	}
	
	public function childDeleteProduct($id) {
		return $this->returnURL("functions.php?func=delete_product&id=$id", $this->config->address_child);
	}
	
	public function childEditImage($id) {
		return $this->returnURL("?view=images&func=edit&id=$id", $this->config->address_child);
	}
	
	public function childDeleteImage($id) {
		return $this->returnURL("functions.php?func=delete_image&id=$id", $this->config->address_child);
	}
	
	public function childEditPost($id) {
		return $this->returnURL("?view=posts&func=edit&id=$id", $this->config->address_child);
	}
	
	public function childDeletePost($id) {
		return $this->returnURL("functions.php?func=delete_post&id=$id", $this->config->address_child);
	}
	
	public function childEditInfo($id) {
		return $this->returnURL("?view=infos&func=edit&id=$id", $this->config->address_child);
	}
	
	public function childDeleteInfo($id) {
		return $this->returnURL("functions.php?func=delete_info&id=$id", $this->config->address_child);
	}
	
	public function childEditVideo($id) {
		return $this->returnURL("?view=videos&func=edit&id=$id", $this->config->address_child);
	}
	
	public function childDeleteVideo($id) {
		return $this->returnURL("functions.php?func=delete_video&id=$id", $this->config->address_child);
	}
	
	public function childEditComment($id) {
		return $this->returnURL("?view=comments&func=edit&id=$id", $this->config->address_edit);
	}
	
	public function childDeleteComment($id) {
		return $this->returnURL("functions.php?func=delete_comment&id=$id", $this->config->address_edit);
	}
	
	public function childEditSection($id) {
		return $this->returnURL("?view=sections&func=edit&id=$id", $this->config->address_child);
	}
	
	public function childDeleteSection($id) {
		return $this->returnURL("functions.php?func=delete_section&id=$id", $this->config->address_child);
	}
	
	public function childEditOrder($id) {
		return $this->returnURL("?view=orders&func=edit&id=$id", $this->config->address_child);
	}
	
	public function childDeleteOrder($id) {
		return $this->returnURL("functions.php?func=delete_order&id=$id", $this->config->address_child);
	}
	
	public function childEditDiscount($id) {
		return $this->returnURL("?view=discounts&func=edit&id=$id", $this->config->address_child);
	}
	
	public function childDeleteDiscount($id) {
		return $this->returnURL("functions.php?func=delete_discount&id=$id", $this->config->address_child);
	}
	
}

?>