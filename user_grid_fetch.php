<?php
	session_start();
	require_once "classes/classesAutoload.php";
	
	list($count, $select_user) = $objProc->user_list($MYSQL);


	$objLst->grid_fetch($count, $select_user, $MYSQL);

?>