<?php
	session_start();
	require_once "classes/classesAutoload.php";

	list($cnt, $select_user) = $objProc->user_list($MYSQL);
	
	$objPdf->extract_textfile($cnt, $select_user, $MYSQL);
?>
