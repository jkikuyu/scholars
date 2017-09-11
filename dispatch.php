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
	if(isset($_GET["editId"])){

		if(is_numeric($_GET["editId"])){
			$_SESSION["editId"] = $_GET["editId"];
			$_SESSION["choice"] = 1; 
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
	if(isset($_GET["addarticle"])){
		$_SESSION["choice"] = 2; 
		if(isset($_SESSION["editId"])){
			unset($_SESSION["editId"]);
		}
		header("location: user_form.php");
		exit();
	}

	
	if (isset($_GET["choice"])){
		$choice = $_GET["choice"];
		$_SESSION["table_name"] = $choice;
		if ($choice ==="users"){
			$_SESSION["choice"] = 1;

		}
		elseif($choice ==="articles"){

			$_SESSION["choice"] = 2;
		}
		else{
			$_SESSION["table_name"] = "articles";


			$_SESSION["choice"] = 3;
		}

		header("Location: ./");
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