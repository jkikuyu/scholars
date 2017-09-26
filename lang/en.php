<?php
$lang["timezone"] = "Africa/Nairobi";

$lang["title"] = "Welcome to Sholar";

$lang["personal_info"] = "Personal Information";
$lang["username"] = "Username";
$lang["fullname"] = "Full Name";
$lang["password"] = "Password";
$lang["actions"] = "Actions";
$lang["ins_error"] = "Failed to save record";
$lang["ins_success"] = "Record Successfully saved";

$lang["param_details"] = "Parameter Details";
$lang["shortname"] = "Short Name";
$lang["longname"] = "Long Name";
$lang["type"] = "Type";

$lang["paramvalue"] = "Value";
$lang["paramdesc"] = "Description";
$lang["startdate"] = "Start Date";
$lang["enddate"] = "End Date";

$lang["class_details"] = "Class Details";
$lang["classname"] = "Class Name";
$lang["classcode"] = "Class Code";
$lang["classdesc"] = "Class Description";

$lang["teacher_details"] = "Teacher Details";
$lang["teachername"] = "Teacher Name";
$lang["teacherinitials"] = "tacher Initials";

$lang["actions"] = "Actions";
$lang["ins_error"] = "Failed to save record";
$lang["ins_success"] = "Record Successfully saved";


$lang["password"] = "Password";
$lang["email"] = "Email";
$lang["phonenumber"] = "Phone Number";
$lang["profile_image"]="Profile Image";
$lang["returnbutton"] = "Return";
$lang["updatedetailsbutton"] = "Update Record";
$lang["savedetailsbutton"] = !isset($_SESSION["usertype"])?"":($_SESSION["usertype"]==3?"Save Article":"Save Details");

$lang["movetoadmin"] = "Move this area to an administrator's page";
$lang["copyright"] = "Copyright &copy; " . date("Y") . " - BBIT3104";
$lang["table_name"] = $_SESSION["table_name"];
$lang["group_name"] = ucwords(strtolower(str_replace( '_' , ' ' , $lang["table_name"] )));
$lang["table_title"] = $lang["group_name"] . " Listing";
$lang["article_info"] = "Article Details";
$lang["a_title"] = "Article Title";
$lang["author"] = "Author";
$lang["fulltext"]= "Full Text";
$lang["viewarticle"]="View Article";
$lang["articledate"] ="Date created";
$lang["articleupdate"]= "Last Update";
$lang["showarticle"] = "Show Article";





?>
