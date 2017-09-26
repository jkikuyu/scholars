<?php
	class Process{
		public function user_list(){

			 	$MYSQL = func_get_arg(0);
				require_once "lang/en.php";
			
			if(isset($_GET["delId"])){
				if(is_numeric($_GET["delId"])){
					$delId = $_GET["delId"];
					$where = [ "userid" => $delId ];
					
					$del_table_name_pers = $MYSQL->delete($_SESSION["table_name"], $where);
					if($del_table_name_pers ){
					
								
					} else { print "Error: " . $del_table_name_pers ; }
					
				} else { print "Error: " ; }
			}
			
			if((isset($_POST["query"])) OR (!empty($_POST["query"]))){
			 	$search = $MYSQL->escape_values($_POST["query"]);
				$sql = "SELECT userid, user_name, full_name , email, phone_number, profile_image FROM users WHERE usertype >" .$_SESSION["usertype"]." AND (email LIKE %".$search."% OR user_name LIKE %".$search."% OR users.full_name LIKE %".$search."% ) ORDER BY full_name ASC";
			} else {
				$sql = "SELECT userid, user_name, full_name , email, phone_number, profile_image FROM users where usertype>" .$_SESSION["usertype"];

			}
			$cnt = $MYSQL->count_results($sql);
			if($cnt > 0) {
				$select_user = $MYSQL->getResults($sql);
			} else {
				$select_user = 'Data Not Found';
			}

			if (func_num_args()>1){

				return array ($cnt, $sql, $select_user);
			}
				else{
					return array ($cnt, $select_user);

			}
		}

		public function article_list($MYSQL){
				require_once "lang/en.php";

			if(isset($_GET["delId"])){
				if(is_numeric($_GET["delId"])){
					$delId = $_GET["delId"];
					$where = [ "userid" => $delId ];
					
					$del_table_name_pers = $MYSQL->delete($_SESSION["table_name"], $where);
					if($del_table_name_pers ){
					
								
					} else { print "Error: " . $del_table_name_pers ; }
					
				} else { print "Error: " ; }
			}
			
			if((isset($_POST["query"])) OR (!empty($_POST["query"]))){
			 	$search = $MYSQL->escape_values($_POST["query"]);
				$sql = "SELECT articleid, authorid, article_title,article_full_text,article_created_date, article_last_update, article_display, article_order FROM articles WHERE article_title LIKE %".$search."% OR article_full_text LIKE %".$search."% ORDER BY article_title ASC";
			} else {
				if (isset($_SESSION["usertype"])){
					if ($_SESSION["usertype"] ==3) {
						// filter articles for given user;
						if(isset($_SESSION["userId"])){
							$sql = "SELECT  a.articleid, u.full_name, a.article_title,a.article_full_text,a.article_created_date, a.article_last_update, a.article_display, a.article_order FROM articles a inner join users u on u.userid = a.authorid where u.userid=".$_SESSION["userId"];
						}
					
					}
					else{
				
						$sql = "SELECT  a.articleid, u.full_name, a.article_title,a.article_full_text,a.article_created_date, a.article_last_update, a.article_display, a.article_order FROM articles a inner join users u on u.userid = a.authorid";

					}
				}

			}
			$cnt = $MYSQL->count_results($sql);
			if($cnt > 0) {
				$select_article = $MYSQL->getResults($sql);
			} else {
				$select_article = 'Data Not Found';
			}
			return array ($cnt, $select_article);
		}

		
		public function select_settings($MYSQL){
			//require "lang/en.php";
			$spot_offdays_rows = $MYSQL->select('SELECT * FROM `offdays_settings`');

			$arr_can_apply_on = explode (",", $spot_offdays_rows["can_apply_on"]);
			$arr_class_days = explode (",", $spot_offdays_rows["can_take_off_on"]);
			$will_take_effect = $spot_offdays_rows["will_take_effect"] . " On ";

			$all_week_days = $lang["all_week_days"];

			$spot_Monday = date("jS F, Y, l", strtotime("next Monday"));
			
			return array($all_week_days, $arr_can_apply_on, $arr_class_days, $will_take_effect, $spot_Monday, $spot_offdays_rows);
		}	
		
		public function select_history($MYSQL){
			$spot_offdays_hist_re = $MYSQL->select_while('SELECT * FROM offdays_history ORDER BY offdays_historyId DESC');
			return array($spot_offdays_hist_re);
		}
		
		public function get_edit_param($MYSQL){
	
			if((isset($_SESSION["editId"])) OR (isset($_GET["viewId"]))){
				
				if(isset($_GET["viewId"])){
					$editId = $_GET["viewId"];
				}else if(isset($_SESSION["editId"])){
					$editId = $_SESSION["editId"];
				}

                 $sql = "SELECT `parameter`.`paramid`,`parameter`.`shortname`,`parameter`.`newvalue`,
                        `parameter`.`oldvalue`,`parameter`.`startdate`,`parameter`.`enddate`,
                        `parameter`.`typeid`,`parameter`.`Description`,`parameter`.`longname`
                            FROM `scholar`.`parameter` WHERE paramid =". $editId;

				$param_to_edit = $MYSQL->select($sql);

				
			}else{

			}
			if(isset($_GET["viewId"]) || isset($_SESSION["editId"])){
				return  $param_to_edit ;
			}else{

				
			}
		}
        public function get_edit_student($MYSQL){
    
            if((isset($_SESSION["editId"])) OR (isset($_GET["viewId"]))){
                
                if(isset($_GET["viewId"])){
                    $editId = $_GET["viewId"];
                }else if(isset($_SESSION["editId"])){
                    $editId = $_SESSION["editId"];
                }

                 $sql = "SELECT `parameter`.`paramid`,`parameter`.`shortname`,`parameter`.`newvalue`,
                        `parameter`.`oldvalue`,`parameter`.`startdate`,`parameter`.`enddate`,
                        `parameter`.`typeid`,`parameter`.`Description`,`parameter`.`longname`
                            FROM `scholar`.`parameter` WHERE paramid =". $editId;

                $param_to_edit = $MYSQL->select($sql);

                
            }else{

            }
            if(isset($_GET["viewId"]) || isset($_SESSION["editId"])){
                return  $param_to_edit ;
            }else{

                
            }
        }

        public function get_edit_teacher($MYSQL){
    
            if((isset($_SESSION["editId"])) OR (isset($_GET["viewId"]))){
                
                if(isset($_GET["viewId"])){
                    $editId = $_GET["viewId"];
                }else if(isset($_SESSION["editId"])){
                    $editId = $_SESSION["editId"];
                }

                 $sql = "SELECT `parameter`.`paramid`,`parameter`.`shortname`,`parameter`.`newvalue`,
                        `parameter`.`oldvalue`,`parameter`.`startdate`,`parameter`.`enddate`,
                        `parameter`.`typeid`,`parameter`.`Description`,`parameter`.`longname`
                            FROM `scholar`.`parameter` WHERE paramid =". $editId;

                $param_to_edit = $MYSQL->select($sql);

                
            }else{

            }
            if(isset($_GET["viewId"]) || isset($_SESSION["editId"])){
                return  $param_to_edit ;
            }else{

                
            }
        }

		
		public function update_settings($MYSQL){
			//require "lang/en.php";
			if(isset($_POST["save_settings"])){
				$can_apply_on = $_POST["can_apply_on"];
				$can_take_off_on = $_POST["class_days"];
				$will_take_effect = $_POST["will_take_effect"];
				
				$get_applydays = implode (",", $can_apply_on);
				$get_availabledays = implode (",", $can_take_off_on);
				
				$MYSQL->truncate("offdays_settings");

				$keys = array("can_apply_on", "can_take_off_on", "will_take_effect");
				$values = array($get_applydays, $get_availabledays, $will_take_effect);
				
				$data  = array_combine($keys, $values);
				$insert_offdays = $MYSQL->insert("offdays_settings",$data);
				
				if($insert_offdays == TRUE){
					header("Location: offdays.php");
				}
			}
			function bind_to_template($replacements, $template) {
					return preg_replace_callback('/{{(.+?)}}/', function($matches) use ($replacements) {
						return $replacements[$matches[1]];
					}, $template);
				}

			if(isset($_POST["update_status"])){
				$offdays_historyId = $_POST["offdays_historyId"];
				$offdays_status = implode("", $_POST["offdays_status"]);

					if ($offdays_status == "Deleted"){
						$where = ["offdays_historyId" => $offdays_historyId];
						$update_status = $MYSQL->delete("`offdays_history`",$where);
					}else{
						$data = ["offdays_status" => $offdays_status];
						$where = ["offdays_historyId" => $offdays_historyId];
						$update_status = $MYSQL->update("`offdays_history`",$data,$where);
					}
					
					if ($update_status == TRUE){

				$spot_app_details = $MYSQL->select('SELECT DISTINCT offdays_history.peopleId, '.$_SESSION["table_name"].'.Fullname, '.$_SESSION["allgroups"].'.Emailaddress FROM offdays_history LEFT JOIN '.$_SESSION["allgroups"].' ON (offdays_history.peopleId = '.$_SESSION["allgroups"].'.Username) LEFT JOIN '.$_SESSION["table_name"].' ON (offdays_history.peopleId = '.$_SESSION["table_name"].'.Username) WHERE offdays_history.offdays_historyId = '.$offdays_historyId.' LIMIT 1');

					$replacements = array('student_name' => $spot_app_details["Fullname"], 'status' => $offdays_status);

					date_default_timezone_set('Africa/Nairobi');

						require_once 'mailer/PHPMailerAutoload.php';

						//Create a new PHPMailer instance
						$mail = new PHPMailer;

						//Tell PHPMailer to use SMTP
						$mail->isSMTP();

						//Enable SMTP debugging
						// 0 = off (for production use)
						// 1 = client messages
						// 2 = client and server messages
						$mail->SMTPDebug = 0;

						//Ask for HTML-friendly debug output
						$mail->Debugoutput = 'html';

						//Set the hostname of the mail server
						$mail->Host = 'smtp.gmail.com';
						// use
						// $mail->Host = gethostbyname('smtp.gmail.com');
						// if your network does not support SMTP over IPv6

						//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
						$mail->Port = 587;

						//Set the encryption system to use - ssl (deprecated) or tls
						$mail->SMTPSecure = 'tls';

						//Whether to use SMTP authentication
						$mail->SMTPAuth = true;

						//Username to use for SMTP authentication - use full email address for gmail
						$mail->Username = "bbitalex@gmail.com";

						//Password to use for SMTP authentication
						$mail->Password = "alex2017";

						//Set who the message is to be sent from
						$mail->setFrom('bbit3b@gmail.com', 'bbit3 Bee');

						//Set an alternative reply-to address
						$mail->addReplyTo('bbit3b@gmail.com', 'bbit3 Bee');

						//Set who the message is to be sent to
						$mail->addAddress($spot_app_details["Emailaddress"], $spot_app_details["Fullname"]);

						//Set the subject line
						$mail->Subject = $lang["title"] . ' - Hello ' . $spot_app_details["Fullname"];

						//Read an HTML message body from an external file, convert referenced images to embedded,
						//convert HTML into a basic plain-text alternative body
						// $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

						//Replace the plain text body with one created manually
						// $mail->AltBody = 'This is a plain-text message body';
						
						$mail->Body = bind_to_template($replacements, $lang["template"]);

						//Attach an image file
						// $mail->addAttachment('images/phpmailer_mini.png');

						//send the message, check for errors
						if (!$mail->send()) {
							print "Mailer Error: " . $mail->ErrorInfo;
						} else {
							print "Message sent!";
						}				
						header("Location: offdays.php");
				}
			}
			
			if(isset($_POST["apply_offdays_plan"])){
				$offdays_plan = $_POST["offdays_plan"];
				$offdays_status = "Pending";
				$peopleId = $_POST["admissionId"];
				
		$result = $MYSQL->count_results('SELECT '.$_SESSION["allgroups"].'.Username FROM '.$_SESSION["allgroups"].' LEFT JOIN '.$_SESSION["table_name"].' ON ('.$_SESSION["allgroups"].'.Username = '.$_SESSION["table_name"].'.Username) WHERE '.$_SESSION["allgroups"].'.Username = '.$peopleId.' AND '.$_SESSION["allgroups"].'.Emailaddress IS NOT NULL LIMIT 1');

				if ($result > 0){
					$keys = array("peopleId", "offdays_history", "offdays_status");
					$values = array($peopleId, $offdays_plan, $offdays_status);
					
					$data  = array_combine($keys, $values);	
					$insert_offdays_plan = $MYSQL->insert("offdays_history",$data);
					
					if($insert_offdays_plan == TRUE){
						header("Location: offdays.php");
						exit();
					}else{
						print $insert_offdays_plan;
					}
				}else{
					header("Location: offdays.php?not_exist");
					exit();
				}
			}
		}
		
		public function update_param_details($MYSQL){
				require "lang/en.php";
			if((isset($_POST["save_details"])) OR (isset($_POST["update_details"]))){
				$paramname = addslashes((isset($_POST["paramname"])? $_POST["paramname"]: ""));
                $longname = addslashes((isset($_POST["longname"])? $_POST["longname"]: ""));
                
				$paramvalue = ucwords(strtolower(addslashes(isset($_POST["paramvalue"])?$_POST["paramvalue"]:"")));
				$paramid = $_SESSION["paramid"];
				$type = isset($_POST["type"])?$_POST["type"]:1;
				$usertype = $usertype +0; // convert to integer
				$startdate = date("Y-m-d H:i:s") ;
				$description=(isset($_POST["description"])?$_POST["description"]:"");
				$param_data  = ["shortname" => $paramname, "longname" => $longname,
                "newvalue" => $paramvalue, "startdate" => $startdate];

				if(isset($_POST["save_details"])){
				

						$insert_in_param = $MYSQL->insert($_SESSION["table_name"], $param_data);

					if($insert_in_param){

						if(isset($_SESSION["editId"])){ unset($_SESSION["editId"]); }
						header("Location: ./"); 
                        print $lang["ins_success"];
                        exit();
                        
					} 
					else{ 
						print $lang["ins_error"];
					} 
				}

				if(isset($_POST["update_details"])){
					$where = ["paramid"=>$paramid];
					$enddate = date("Y-m-d H:i:s") ;
					$update_param = $MYSQL->update($_SESSION["table_name"], $param_data, $where);
						if($update_user == TRUE){
							if(isset($_SESSION["editId"])){ unset($_SESSION["editId"]); }
							header("Location: ./"); exit();
						} else { print $lang["ins_success"]; }

				} else { print $lang["ins_error"]; }
					
			}
		}
		public function update_article_details($MYSQL){
				require "lang/en.php";
			if((isset($_POST["save_details"])) OR (isset($_POST["update_details"]))){
				$a_title= addslashes((isset($_POST["a_title"])? $_POST["a_title"]: ""));
				$full_text = addslashes(isset($_POST["full_text"])?$_POST["full_text"]:"");
				$article_order = isset($_POST["article_order"])?$_POST["article_order"]:"";
				$show_article = isset($_POST["showarticle"])?$_POST["showarticle"]:"";
				$lastupdate = date("Y-m-d H:i:s") ;
				$articleid = isset($_SESSION["editId"]);
					$user_data  = ["article_title" => $a_title, "article_full_text" => $full_text,
					"article_order" => $article_order, "article_display"=>$show_article, "article_last_update"=>$lastupdate, 
					"authorid"=>$_SESSION["userId"]];

					if(isset($_POST["save_details"])){
						
							$insert_in_user = $MYSQL->insert($_SESSION["table_name"], $user_data);

						if($insert_in_user == TRUE){

							if(isset($_SESSION["editId"])){ 
								unset($_SESSION["editId"]); 
							}
							header("Location: ./"); exit();
						} 
						else{ 
							print $lang["ins_success"];
						} 
					}
					else { 
						print $lang["ins_error"];
					}
					if(isset($_POST["update_details"])){
						
						$where = ["articleid"=>$articleid];

						
						$update_user = $MYSQL->update($_SESSION["table_name"], $user_data, $where);
							if($update_user == TRUE){
								if(isset($_SESSION["editId"])){ unset($_SESSION["editId"]); }
								header("Location: ./"); exit();
							} else { print $lang["ins_success"]; }

					} else { print $lang["ins_error"]; }
					
			}
		}

	}
?>