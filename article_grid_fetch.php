<?php
	session_start();
	require_once "classes/classesAutoload.php";
	
	list($count,$sql, $select_user) = $objProc->article_list($MYSQL);


	$objLst->article_grid_fetch($count, $select_user, $MYSQL);

?>
