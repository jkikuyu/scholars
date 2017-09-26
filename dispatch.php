<?php
	session_start();
	require_once "classes/classesAutoload.php";

	if(isset($_GET["viewId"])){
		if(is_numeric($_GET["viewId"])){
			$viewId = $_GET["viewId"];
			$pers_edit_row = $objProc->get_edit_user($MYSQL);
			$objLst->modal_fetch($pers_edit_row);
		}
	}
	if(isset($_GET["edituser"])){

		if(is_numeric($_GET["edituser"])){
			$_SESSION["edituser"] = $_GET["edituser"];
			header("location: user_form.php");
			exit();
		}
	}
	if(isset($_GET["adduser"])){
		$_SESSION["choice"] = 1; 
		if(isset($_SESSION["editId"])){
			unset($_SESSION["editId"]);
		}
		header("location: user_form.php");
		exit();
	}

	
	if (isset($_GET["choice"])){
		$choice= $_GET["choice"];
        $_SESSION["choice"] = $choice;
		$_SESSION["table_name"] = $choice;


		header("location: user_form.php");
		exit();
	}

	if (isset($_GET["logout"])){
		session_destroy();
		header("Location: ./");
		exit();
	}

	if (isset($_GET["user_view"])){
		$_SESSION["user_view"] = $_GET["user_view"];
		header("Location: ./");
		exit();
	}
?>