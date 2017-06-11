<?php
	require_once "start.php";
	session_start();
	require_once "manageadmin_class.php";
	require_once "urladmin_class.php";
	require_once "auth_class.php";
	
	$manage = new ManageAdmin();
	$url = new URLAdmin();
	$auth = new Auth();
	$func = $_REQUEST["func"];
	if ($func == "auth") {
		$link = $manage->auth();
		header("Location: ".$url->auth());
		exit;
	}
	elseif (!$auth->checkAdmin($_SESSION["login"], $_SESSION["password"])) {
		header("Location: ".$url->auth());
		exit;
	}
	else {
		if ($func == "logout") {
			$manage->logout();
		}
		elseif ($func == "add_product") {
			$link = $manage->addProduct();
		}
		elseif ($func == "edit_product") {
			$link = $manage->editProduct();
		}
		elseif ($func == "delete_product") {
			$manage->deleteProduct();
		}
		elseif ($func == "add_image") {
			$link = $manage->addImage();
		}
		elseif ($func == "edit_image") {
			$link = $manage->editImage();
		}
		elseif ($func == "delete_image") {
			$manage->deleteImage();
		}
		elseif ($func == "add_post") {
			$link = $manage->addPost();
		}
		elseif ($func == "edit_post") {
			$link = $manage->editPost();
		}
		elseif ($func == "delete_post") {
			$manage->deletePost();
		}
		elseif ($func == "add_video") {
			$link = $manage->addVideo();
		}
		elseif ($func == "edit_video") {
			$link = $manage->editVideo();
		}
		elseif ($func == "delete_video") {
			$manage->deleteVideo();
		}
		elseif ($func == "add_info") {
			$link = $manage->addInfo();
		}
		elseif ($func == "edit_info") {
			$link = $manage->editInfo();
		}
		elseif ($func == "delete_info") {
			$manage->deleteInfo();
		}
		elseif ($func == "add_comment") {
			$link = $manage->addComment();
		}
		elseif ($func == "edit_comment") {
			$link = $manage->editComment();
		}
		elseif ($func == "delete_comment") {
			$manage->deleteComment();
		}
		elseif ($func == "add_section") {
			$link = $manage->addSection();
		}
		elseif ($func == "edit_section") {
			$link = $manage->editSection();
		}
		elseif ($func == "delete_section") {
			$manage->deleteSection();
		}
		elseif ($func == "add_order") {
			$link = $manage->addOrder();
		}
		elseif ($func == "edit_order") {
			$link = $manage->editOrder();
		}
		elseif ($func == "delete_order") {
			$manage->deleteOrder();
		}
		elseif ($func == "add_discount") {
			$link = $manage->addDiscount();
		}
		elseif ($func == "edit_discount") {
			$link = $manage->editDiscount();
		}
		elseif ($func == "delete_discount") {
			$manage->deleteDiscount();
		}
		else exit;
	}
	if (!$link) $link = ($_SERVER["HTTP_REFERER"] != "")? $_SERVER["HTTP_REFERER"]: $url->index();
	header("Location: $link");
	exit;
?>