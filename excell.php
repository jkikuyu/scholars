<?php
	session_start();
	require_once "classes/classesAutoload.php";

	list($cnt,$sql, $select_user) = $objProc->user_list($MYSQL,1);
	
	$objPdf->extract_excel($sql, $select_user, $MYSQL);
?>
