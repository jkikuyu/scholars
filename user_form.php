<?php
	session_start();
	require_once "classes/classesAutoload.php";
	$choice = isset($_SESSION["choice"])?$_SESSION["choice"]:1;
    $objLayout->head();
    $objLayout->body_open();
    $objMenu->menuInit();
    switch ($choice){
        case "parameter":
            $param_to_edit = $objProc->get_edit_param($MYSQL);
            $_SESSION["types"] = $objProc->get_type($MYSQL);
            $objProc->save_param_details($MYSQL);
            $objForm->parameter_details_form($param_to_edit);
            break;
        case "student":
            $pers_to_edit = $objProc->get_edit_student($MYSQL);
            $objProc->update_user_details($MYSQL);

            break;
        case "group":
            $pers_to_edit = $objProc->get_edit_user($MYSQL);
            $objProc->update_user_details($MYSQL);

            break;
        case "teacher":
            $pers_to_edit = $objProc->get_edit_user($MYSQL);
            $objProc->update_user_details($MYSQL);

            break;
        default:
            $objLayout->head();
            $objLayout->body_open();
            $objForm->registration_form($pers_to_edit);
    
            
        }	

	$objLayout->footer();
			

	
?>