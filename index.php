<?php
	session_start();
	require_once "classes/classesAutoload.php";
	echo "hello world";
die();
	if (isset($_POST["username"])){	
		$success= $objLogin->checkValidUser($MYSQL);
        
		$_SESSION["success"] = TRUE;
		if ($success){
				$objLayout->head();
				$objLayout->body_open();
                $objMenu->menuInit();

				//$objLayout->admin_container();
				//$objLayout->user_lists();
			
			//$objLayout->user_lists();
			
		}
		else{
			$objLogin->show_login();
			//$objLayout->errorMessage("error");
		}
	}
	elseif (isset($_SESSION["usertype"])){
		$objLayout->head();
		$objLayout->body_open();

		$objLayout->admin_container();
		$objLayout->user_lists();
		$objLayout->footer();

	}

	else{
		$objLogin->show_login();
	}
	if(isset($_SESSION["success"]) && $_SESSION["success"]){
		$objLayout->user_lists();
		//$objLayout->footer();			
	}


?>
 
