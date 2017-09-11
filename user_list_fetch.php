<?php
	session_start();
	require_once "classes/classesAutoload.php";
	
	list($count, $listItems) = $objProc->user_list($MYSQL);

	$objLst->list_fetch($listItems, $MYSQL);
?>
