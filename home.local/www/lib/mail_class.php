<?php
require_once "config_class.php";
require_once "email_class.php";

class Mail {
	
	private $config;
	private $email;
	
	public function __construct() {
		$this->config = new Config();
		$this->email = new Email();
	}
	
	public function send_adm($to_adm, $data, $template, $from = "") {
		$data["sitename"] = $this->config->sitename;
		if ($from == "") $from = $this->config->admemail;
		$subject = $this->email->getTitle($template);
		$message = $this->email->getText($template);
		$headers = "From: $from\r\nReply-To: $from\r\nContent-type: text/html; charset=utf-8\r\n";
		foreach ($data as $key => $value) {
			$subject = str_replace("%$key%", $value, $subject);
			$message = str_replace("%$key%", $value, $message);
		}
		$subject = '=?utf-8?B?'.base64_encode($subject).'?=';
		return mail($to_adm, $subject, $message, $headers);
	}
	
	public function send_user($to_user, $data, $template, $from = "") {
		$data["sitename"] = $this->config->sitename;
		if ($from == "") $from = $this->config->admemail;
		$subject = $this->email->getTitle($template);
		$message = $this->email->getText($template);
		$headers = "From: $from\r\nReply-To: $from\r\nContent-type: text/html; charset=utf-8\r\n";
		foreach ($data as $key => $value) {
			$subject = str_replace("%$key%", $value, $subject);
			$message = str_replace("%$key%", $value, $message);
		}
		$subject = '=?utf-8?B?'.base64_encode($subject).'?=';
		return mail($to_user, $subject, $message, $headers);
	}
}
?>