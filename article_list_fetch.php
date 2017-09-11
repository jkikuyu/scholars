<?php
	session_start();
	require_once "classes/classesAutoload.php";
	
	list($count, $listItems) = $objProc->article_list($MYSQL);

	$objLst->article_list_fetch($listItems, $MYSQL);
?>
