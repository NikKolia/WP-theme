<?php
class Config {
	public $secret = "DFSJLFHBUVGV";
	public $sitename = "Домашний";
	public $address = "http://home.local/";
	public $address_edit = "http://home.local/edit/";
	public $address_admin = "http://home.local/admin/";
	public $address_child = "http://home.local/child/";
	public $db_host = "localhost";
	public $db_user = "root";
	public $db_password = "";
	public $db_name = "home.local";
	public $db_prefix = "h_";
	public $sym_query = "{?}";
	
	public $admname = "Roman";
	public $admemail = "romanbondua@gmail.com";
	public $adm_login = "";
	public $adm_password = "7ceb40caebee617c8f67296777b9df6e";	
	public $edit_login = "";
	public $edit_password = "7ceb40caebee617c8f67296777b9df6e";	
	public $child_login = "";
	public $child_password = "7ceb40caebee617c8f67296777b9df6e";
	
	public $pagination_count = 50;
	public $posts_count = 3;
	public $products_count = 50;
	public $productsi_count = 50;
	
	public $dir_text = "lib/text/";
	public $dir_tmpl = "tmpl/";
	public $dir_tmpl_admin = "admin/tmpl/";
	public $dir_tmpl_edit = "edit/tmpl/";
	public $dir_tmpl_child = "child/tmpl/";
	
	public $max_name = 255;
	public $max_title = 255;
	public $max_text = 65535;
	
	public $max_size_img = 1024000;
	
}
?>