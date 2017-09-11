<?php
	class Layout{
		public function head(){
			require "lang/en.php";
			?>
					<!DOCTYPE html>
					<html dir = "ltr" lang = "en" xml:lang = "en">
					<head>
						<meta charset="UTF-8">
							<title><?php echo $lang["title"]; ?></title>
							<link rel = "stylesheet" href = "styles/style.css" />
							<link type = "text/css" rel = "stylesheet" href = "styles/bootstrap.min.css" />

							<link type = "text/css" rel = "stylesheet" href = "js/nyroModal/styles/nyroModal.css" />
							<script type = "text/javascript" src = "js/nyroModal/js/jquery-1.11.1.min.js" ></script>
							<script type = "text/javascript" src = "js/nyroModal/js/jquery.nyroModal.custom.js" ></script>
							<script type = "text/javascript" src = "js/ckeditor/ckeditor.js" ></script>
							<script type = "text/javascript" src = "js/article.js" ></script>
					</head>
			<?php
		}
		public function body_open(){
			require "lang/en.php";
			?>
	<body>

		  <div class="table-responsive">
	   <table class="table table bordered" align = "center" style = "width: 80%">
			<?php
		}
		public function settings_display($all_week_days, $arr_can_apply_on, $arr_class_days, $will_take_effect, $spot_Monday, $spot_offdays_rows, $MYSQL){
			require "lang/en.php";
			?>
<form action = "" method = "post">
		<tr>
			<td style = "vertical-align: top;">
			<?php echo $lang["whenapply"]; ?>

				<ul style = "list-style: none;">
					<?php foreach ($all_week_days AS $can_apply_on){ ?>
						<li><input style = "margin-right: 10px;" type = "checkbox" name = "can_apply_on[]" value = "<?php echo $can_apply_on; ?>" id = "1_<?php echo $can_apply_on; ?>" <?php if(in_array($can_apply_on, $arr_can_apply_on)) {echo 'checked';} ?> /><label for = "1_<?php echo $can_apply_on; ?>"><?php echo $can_apply_on; ?></label></li>
					<?php } ?>
				</ul>
			</td>
			<td style = "vertical-align: top;">
			<?php echo $lang["whichweek"]; ?>
				<ul style = "list-style: none;">
					<?php foreach ($all_week_days AS $class_days){ ?>
						<li><input style = "margin-right: 10px;" type = "checkbox" name = "class_days[]" value = "<?php echo $class_days; ?>" id = "2_<?php echo $class_days; ?>" <?php if(in_array($class_days, $arr_class_days)) {echo 'checked';} ?> /><label for = "2_<?php echo $class_days; ?>"><?php echo $class_days; ?></label></li>
					<?php } ?>
				</ul>
			</td>
		</tr>

		<tr>
			<td style = "vertical-align: top;" colspan = "2">
				<ul style = "list-style: none;">
					<li><input style = "margin-right: 10px;" type = "radio" name = "will_take_effect" id = "this_week" value = "This Week" <?php if ($spot_offdays_rows["will_take_effect"] == "This Week"){ echo "Checked"; } ?> required /><label for = "this_week"><?php echo $lang["thisweek"]; ?></label></li>
					<li><input style = "margin-right: 10px;" type = "radio" name = "will_take_effect" id = "next_week" value = "Next Week" <?php if ($spot_offdays_rows["will_take_effect"] == "Next Week"){ echo "Checked"; } ?> required /><label for = "next_week"><?php echo $lang["nextweek"]; ?></label></li>
					<li><input style = "margin-right: 10px;" type = "radio" name = "will_take_effect" id = "this_week_next_week" value = "This Week & Next Week" <?php if ($spot_offdays_rows["will_take_effect"] == "This Week & Next Week"){ echo "Checked"; } ?> required /><label for = "this_week_next_week"><?php echo $lang["thisnextweek"]; ?></label></li>
				</ul>
			</td>
		</tr>
		<tr>
			<td style = "vertical-align: top;" colspan = "2">
				<input type = "submit" name = "save_settings" value = "Save Settings" />
			</td>
		</tr>
	</form>
			<?php
		}
		public function history_display($spot_offdays_hist_re, $MYSQL){
			require "lang/en.php";
			?>
		<tr>
			<td style = "vertical-align: top;" colspan = "2">
				<table class="table">
				<thead>
					<tr><th><?php echo ucwords(strtolower($lang["agent"])); ?></th><th><?php echo $lang["plannedoff"]; ?></th><th><?php echo $lang["status"]; ?></th><th><?php echo $lang["appliedon"]; ?></th><th><?php echo $lang["actions"]; ?></th></tr>
				</thead>
						<?php
						foreach($spot_offdays_hist_re AS $spot_offdays_hist_row){
							if( $spot_offdays_hist_row["offdays_status"] == $spot_offdays_hist_row ){continue;}
						?>
						<form action = "" method = "post">
							<tr class = "innertd"><td class = "innertd"><?php echo $spot_offdays_hist_row["peopleId"]; ?></td><td class = "innertd"><?php echo $spot_offdays_hist_row["offdays_history"]; ?></td><td class = "innertd"><select name = "offdays_status[]" ><option value = "<?php echo $spot_offdays_hist_row["offdays_status"]; ?>" ><?php echo $spot_offdays_hist_row["offdays_status"]; ?></option><option value = "Appoved" >Appoved</option><option value = "Rejected" >Rejected</option><option disabled >-------</option><option value = "Deleted" >Deleted</option></select>
							<input type = "hidden" name = "offdays_historyId" value = "<?php echo $spot_offdays_hist_row["offdays_historyId"]; ?>" />
							</td><td class = "innertd textleft"><?php echo date("jS M Y H:i:s", strtotime($spot_offdays_hist_row["offdays_applied_on"])); ?></td><td class = "innertd textleft"><input type = "submit" name = "update_status" OnClick = "parent.location='#'" value = "<?php echo $lang["updatebutton"]; ?>" /></td></tr>
						</form>
						<?php 
						} ?>
				<tfoot>
					<tr><th><?php echo ucwords(strtolower($lang["agent"])); ?></th><th><?php echo $lang["plannedoff"]; ?></th><th><?php echo $lang["status"]; ?></th><th><?php echo $lang["appliedon"]; ?></th><th><?php echo $lang["actions"]; ?></th></tr>
				</tfoot>
				</table>
			</td>
		</tr>
			<?php
		}
		public function application_form($will_take_effect, $arr_class_days, $all_week_days, $arr_can_apply_on, $MYSQL){
			require "lang/en.php";
			?>
	<form action = "" method = "post">
		<tr>
			<td style = "vertical-align: top;">
						<?php echo $lang["applyquestion"]; ?>
				<br />
					<?php if (in_array(date("l"), $arr_can_apply_on)){ echo $lang["applyyes"]; }else{ echo $lang["applyno"]; } if (isset($_GET["not_exist"])){ echo '<p class = "error">' . $lang["not_exist"] . '</p>'; } ?>
				<br />
				<input type = "text" name = "admissionId" class = "numeric" maxlength = "6" <?php if (!in_array(date("l"), $arr_can_apply_on )){ ?> placeholder = "<?php echo $lang["unavailableapp"]; ?>" disabled <?php }else{ ?> placeholder = "<?php echo $lang["strathmoreid"]; ?>" <?php }?> required autofocus />
			</td>
			<td style = "vertical-align: top;">
			<?php echo $lang["offdaysoptions"]; ?>
				<ul style = "list-style: none;">
					<?php foreach ($all_week_days AS $week_day){ ?>						
						<li><input style = "margin-right: 10px;" type = "radio" name = "offdays_plan" id = "3_<?php echo $week_day; ?>" value = "<?php echo date("jS F, Y, l", strtotime("next " . $week_day)); ?>" <?php if ((!in_array($week_day, $arr_class_days)) OR (!in_array(date("l"), $arr_can_apply_on))){ echo "Disabled"; }?> required /><label for = "3_<?php echo $week_day; ?>"><?php if (!in_array($week_day, $arr_class_days)){ echo $lang["not"] . $week_day; }else{echo $will_take_effect . date("jS F, Y, l", strtotime("next " . $week_day)); } ?></label></li>
					<?php } ?>
				</ul>
			</td>
		</tr>
		<tr>
			<td style = "vertical-align: top;" colspan = "2">
				<input type = "submit" name = "apply_offdays_plan" <?php if (!in_array(date("l"), $arr_can_apply_on )){ ?> value = "<?php echo $lang["unavailableapp"]; ?>" disabled <?php }else{ ?>  value = "<?php echo $lang["applynow"]; ?>" <?php } ?> />
			</td>
		</tr>
	<script type = "text/javascript" src = "js/numeric_only_jQuery.js"></script>
	<script type = "text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Backspace
        specialKeys.push(13); //Backspace
        $(function () {
            $(".numeric").bind("keypress", function (e) {
                var keyCode = e.which ? e.which : e.keyCode
                var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
                $(".error").css("display", ret ? "none" : "inline");
                return ret;
            });
            $(".numeric").bind("paste", function (e) {
                return false;
            });
            $(".numeric").bind("drop", function (e) {
                return false;
            });
        });
    </script>
	</form>
			<?php
		
		}
		public function admin_container(){
			require "lang/en.php";
			$dispatch=array();
			$usertype = isset($_SESSION["usertype"])?$_SESSION["usertype"]:"";
			$usertype = $usertype + 0; //convert to integer
			switch ($usertype) {
				case 3:
				 $dispatch[0] = "editId=". $_SESSION["userId"];
				 $dispatch[1] = "choice=articles";
				 $dispatch[2] = "logout=true";
				 break;
				 default:
				 $dispatch[0] = "editId=". $_SESSION["userId"];
				 $dispatch[1] = "choice=users";
				 $dispatch[2] = "choice=vwarticles";
				 $dispatch[3] = "logout=true";

			?>
 			<?php if (basename($_SERVER['PHP_SELF']) == "index.php" and $usertype > 2 ) { ?>
				<div class = "form-group">
					<div class = "input-group">
						<span class = "input-group-addon">Search</span>
						<input type = "text" name = "search_text" id = "search_text" placeholder = "Search by any details.." class = "form-control" autofocus autocomplete = "off" />
					</div>
				</div>
			<?php } ?>
			<h2 align = "center"><?php print $lang["table_title"]; ?></h2>

			<?php
					break;
			}

			?>
        <div class = "container">
            <p align = "right">
                <?php if(isset($_SESSION["choice"])){
                    if($_SESSION["choice"] ==1 || $_SESSION["choice"]==2){
                ?>
                        
                
                [<a id="adduser"
                    <?php 
                    if($usertype==1){
                        echo "href = dispatch.php?adduser>Add New User";
                    }
                    elseif($usertype==2){
                        echo  "href =dispatch.php?adduser>Add Author";
                    }
                    else{


                        echo "href =dispatch.php?addarticle>Add Article";
                    }
                    
                ?></a>] 
                <?php
                    }
                    else{
                        echo "<script> userLinkHide();</script>";
                    }
                }
                if ($usertype ==3){
            ?>
                
                [<a href = "dispatch.php?<?php echo $dispatch[0]?>">Update Profile</a>]
                [<a href = "dispatch.php?<?php echo $dispatch[1]?>">View Articles </a>]
                [<a href = "dispatch.php?<?php echo $dispatch[2]?>">Log out </a>]
                current user <?php echo ": ". ucwords($_SESSION["username"])?>
            <?php
                }
                else{


            ?>

                [<a href = "dispatch.php?<?php echo $dispatch[0]?>">Update Profile</a>]
                [<a href = "dispatch.php?<?php echo $dispatch[1]?>">Manage Users </a>]
                [<a href = "dispatch.php?<?php echo $dispatch[2]?>">View Articles </a>]
                [<a href = "dispatch.php?<?php echo $dispatch[3]?>">Log out </a>]
                current user <?php echo ": ". ucwords($_SESSION["username"])?>
            </p>
<!--            <p align = "right">
                [<a href = "dispatch.php?adduser">Add New <?php print $lang["group_name"]; ?> User </a>]
            </p>
-->         

        <?php }?> 

            <p align = "right">
                [<a href = "topdf.php" target = "_BLANK">Export Pdf</a>] | [<a href = "textfile.php" target = "_BLANK">export to Text File</a>] | [<a href = "excell.php">export to Excel</a>]
            </p>
<!--            <p align = "right">
                [<a href = "offdays.php">Apply for a day off</a>]
            </p>
 -->            
            <p align = "right">
                [<a href = "dispatch.php?user_view=grid_view">Grid View</a>] | [<a href = "dispatch.php?user_view=list_view" >List View</a>]
            </p>

            <?php
        }



		public function user_lists(){
			require "lang/en.php";
			?>

			<?php if($_SESSION["user_view"] == "grid_view"){?>
				<div id = "result_grid"></div>
			<?php }else if($_SESSION["user_view"] == "list_view"){ ?>

				<div id = "result_list"></div>
			<?php } ?>
		</div>
		<?php
		}
		public function footer(){
			require "lang/en.php";
			?>

			<tr>
				<td class = "footer" align = "center" colspan = "2">
					<?php echo $lang["copyright"]; ?>
				</td>
			</tr>
		</table>
		</div>
		<?php if (isset($_SESSION["choice"])){
				if($_SESSION["choice"]==1){ ?>
					<script src  = "js/userDisplay.js"></script>
				<?php }else{ ?> 
					<script src  = "js/articleDisplay.js"></script>
				<?php }
				}?>           	 
		</body>
	</html>
	<?php
	}
		
	public function errorMessage($errMess){

		//echo "disp_err(".$errMess.")";	
	?>
	
	<script type = "text/javascript" src = "js/article.js" ></script>
	
	<script type = "text/javascript">
 		disp_err('test);
 	</script>
 	
 	<?php
 	}
	
	}


?>