<?php
	session_start();
	require_once "classes/classesAutoload.php";
	$choice = isset($_SESSION["choice"])?$_SESSION["choice"]:1;
	if($choice==2){

		$article_to_edit = $objProc->get_edit_article($MYSQL);

		$objProc->update_article_details($MYSQL);
		$objLayout->head();
		$objLayout->body_open();
		$objForm->article_form($article_to_edit);

		$objLayout->footer();


	}
	else{ 

		$pers_to_edit = $objProc->get_edit_user($MYSQL);

		$objProc->update_user_details($MYSQL);
		
		$objLayout->head();
		$objLayout->body_open();
		$objForm->registration_form($pers_to_edit);

		$objLayout->footer();
	}
?>