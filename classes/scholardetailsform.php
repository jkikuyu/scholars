<?php
class ScholarDetailsForm{
	public function student_registration_form($sub_to_edit){
		require "lang/en.php";
?>
        <tr>
            <td style = "width: 50%">
            <fieldset style = "width: 50%;">
                        <legend><?php echo $lang["personal_info"]; ?></legend>
                    <table border = "0" align = "center" style = "width: 100%;" >
                        <form action = "" method = "POST" enctype = "multipart/form-data">
                            <tr>
                                <td style = "width: 100%;">
                                    <input  type = "text" name = "username" placeholder = "<?php echo $lang["username"];?>" <?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $pers_to_edit["user_name"]; ?>" disabled <?php } ?> autofocus required />
                                </td>

                            </tr>
                            <tr>
                                <td style = "width: 100%;">
                                    <input  type = "password" name = "password" placeholder = "<?php echo $lang["password"];?>" <?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $pers_to_edit["password"]; ?>" disabled <?php } ?> autofocus required />
                                </td>

                            </tr>

                            <tr>
                                <td style = "width: 100%;">
                                
                                         <select  name="usertype" <?php if(isset($_SESSION['editId'])){ echo " disabled"; }?> >
                                            <?php
                                            if (isset($_SESSION["usertype"])){
                                                if ($_SESSION["usertype"]==1){ ?>
                                                      <option value="1" <?php if($pers_to_edit["usertype"]== 1){echo " selected";} ?> >Super User</option>
                                                      <option value="2" <?php if($pers_to_edit["usertype"]== 2){echo " selected";} ?>>Administrator</option>
                                                    <?php
                                                }
                                            }
                                            ?>


                                             <option value="3" <?php if($pers_to_edit["usertype"]== 2){echo " selected";} ?>>User</                                  </select>
                                </td>
                            </tr>

                            <tr>
                                <td style = "width: 100%;">
                                    <input  type = "text" name = "fullname" placeholder = "<?php echo $lang["fullname"];?>"<?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $pers_to_edit["full_name"]; ?>"<?php } ?> required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input  type = "email" name = "email" placeholder = "<?php echo $lang["email"];?>" <?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $pers_to_edit["email"]; ?>"<?php } ?> required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input  type = "text" name ="phonenumber" placeholder = "<?php echo $lang["phonenumber"];?>" <?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $pers_to_edit["phone_number"];?>"<?php } ?> required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?php if(isset($_GET["wrong_ext"])){?><p class = "blink_me error"><?php print $lang["profile_image"]; ?></p><?php }?>
                                
                                    <input  type = "file" name = "Userphoto" />
                                </td>
                            </tr>
<!--                            <tr>
                                <td>
                                    <ul>
                                        <?php foreach($arr_spot_hobbies AS $set_hobbies){?>
                                        <li><input style = "margin-right: 10px;" type = "checkbox" name = "get_hobbies[]" value = "<?php echo $set_hobbies; ?>" id = "<?php echo $set_hobbies; ?>" <?php if(isset($_SESSION['editId'])){ if(in_array($set_hobbies, $arr_hobbies)){echo 'checked'; }} ?> /><label for = "<?php echo $set_hobbies; ?>"><?php echo $set_hobbies; ?></label></li>
                                        <?php } ?>
                                    </ul>
                                </td>
                            </tr>
 -->                            <tr>
                                <td>
    <?php if(isset($_SESSION['editId'])){ ?>
        <input  type = "submit" name = "update_details" value = "<?php echo $lang["updatedetailsbutton"]; ?>" />
        <input type = "hidden" name = "Username" value = "<?php echo $pers_to_edit["user_name"]; ?>" />
    <?php }else{ ?>
        <input  type = "submit" name = "save_details" value = "<?php echo $lang["savedetailsbutton"]; ?>" />
    <?php } ?>
        <input  type = "button" OnClick = "parent.location='./'" value = "<?php echo $lang["returnbutton"]; ?>" />   
                                </td>
                            </tr>
                        </form>
                    </table>
                </fieldset>
            </td>


<?php

}
public function parameter_details_form($param_to_edit){
    require "lang/en.php";

?>
	<span class="required_notification">* Denotes Required Field</span>
	<tr>
		<td style = "width: 50%">
		<fieldset style = "width: 50%;">
					<legend><?php echo $lang["param_details"]; ?></legend>
				<table border = "0" align = "center" style = "width: 100%;" >
					<form class = "reg-form" action = "" method = "POST" name="reg-form">
					    <legend> ?php echo $lang["sub_detail"]</legend>
					    <tr>
					         <td>
                                 <select  name="type" <?php if(isset($_SESSION['editId'])){ echo " disabled"; }?> >
                                    <?php
                                    $cnt = 1; 
                                    foreach ( $$param_to_edit as $keys => $values){ 
                                        
                                       echo "<option value='". $cnt. "'".  ($values == 1)?" selected >":"".$keys. "</option>";
                                        $cnt++;
                                    }
                                    ?>


                            </td>
                        </tr>

						<tr>
							<td style = "width: 100%;">
								<input type = "text" name = "paramname" placeholder = "<?php echo $lang["shortname"];?>" 
								<?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $param_to_edit["shortname"]; ?>" 
								disabled <?php } ?> autofocus required />
							</td>
                            <td style = "width: 100%;">
                                <input type = "text" name = "paramvalue" placeholder = "<?php echo $lang["paramvalue"];?>" 
                                <?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $param_to_edit["newvalue"]; ?>" 
                                disabled <?php } ?> autofocus required />
                            </td>

						</tr>
                        <tr>
                            <td style = "width: 100%;">
                            <textarea name = "longname" placeholder = "<?php echo $lang["longname"];?>"<?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $sub_to_edit["longname"]; ?>"<?php } ?> required />
                            </td>
                        </tr>

						<tr>
							<td style = "width: 100%;">
							<textarea name = "param_desc" placeholder = "<?php echo $lang["paramdesc"];?>"<?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $sub_to_edit["description"]; ?>"<?php } ?> required />
							</td>
						</tr>
						<tr>
							<td>
								<input type = "date" name = "startdate" placeholder = "<?php echo $lang["startdate"];?>" <?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $sub_to_edit["startdate"]; ?>"<?php } ?> required />
							</td>
                            <td>
                                <input  type = "date" name ="enddate " placeholder = "<?php echo $lang["enddate"];?>" <?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $sub_to_edit["enddate"];?>"<?php } ?> required />
                            </td>

						</tr>
						<tr>
							<td>
                            	<?php if(isset($_SESSION['editId'])){ ?>
                            		<input  type = "submit" name = "update_details" value = "<?php echo $lang["updatedetailsbutton"]; ?>" />
                            		<input type = "hidden" name = "Username" value = "<?php echo $param_to_edit["user_name"]; ?>" />
                            	<?php }else{ ?>
                            		<input  type = "submit" name = "save_details" value = "<?php echo $lang["savedetailsbutton"]; ?>" />
                            	<?php } ?>
	                          <input type = "button" OnClick = "parent.location='./'" value = "<?php echo $lang["returnbutton"]; ?>" />	
							</td>
						</tr>
					</form>
				</table>
			</fieldset>
		</td>
	</tr>
<?php
}
public function class_registration_form($class_to_edit){
    require "lang/en.php";

?>
    <span class="required_notification">* Denotes Required Field</span>
    <tr>
        <td style = "width: 50%">
        <fieldset style = "width: 50%;">
                    <legend><?php echo $lang["class_details"]; ?></legend>
                <table border = "0" align = "center" style = "width: 100%;" >
                    <form class = "reg-form" action = "" method = "POST" name="reg-form">
                        <legend> ?php echo $lang["class_detail"]</legend>
                        <tr>
                            <td style = "width: 100%;">
                                <input type = "text" name = "classname" placeholder = "<?php echo $lang["classname"];?>" 
                                <?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $class_to_edit["name"]; ?>" 
                                disabled <?php } ?> autofocus required />
                            </td>
                            <td style = "width: 100%;">
                                <input type = "text" name = "classcode" placeholder = "<?php echo $lang["classcode"];?>" 
                                <?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $class_to_edit["code"]; ?>" 
                                disabled <?php } ?> autofocus required />
                            </td>

                        </tr>

                        <tr>
                            <td style = "width: 100%;">
                            <textarea name = "class_desc" placeholder = "<?php echo $lang["classdesc"];?>"<?php 
                            if(isset($_SESSION['editId'])){ ?> value = "<?php echo $sub_to_edit["description"]; ?>"
                            <?php } ?> required />
                            </td>
                        </tr>
                              <tr>
                            <td>
                                <?php if(isset($_SESSION['editId'])){ ?>
                                    <input  type = "submit" name = "update_details" value = "<?php echo $lang["updatedetailsbutton"]; ?>" />
                                    <input type = "hidden" name = "Username" value = "<?php echo $sub_to_edit["user_name"]; ?>" />
                                <?php }else{ ?>
                                    <input  type = "submit" name = "save_details" value = "<?php echo $lang["savedetailsbutton"]; ?>" />
                                <?php } ?>
                              <input type = "button" OnClick = "parent.location='./'" value = "<?php echo $lang["returnbutton"]; ?>" /> 
                            </td>
                        </tr>
                    </form>
                </table>
            </fieldset>
        </td>
    </tr>

<?php
}
public function teacher_registration_form($teacher_to_edit){
	require "lang/en.php";
?>
	<tr>
		<?php 
		?>
		<td style = "width: 50%">
		<fieldset style = "width: 50%;">
					<legend><?php echo $lang["teacher_info"]; ?></legend>
				<table border = "0" align = "center" style = "width: 100%;" >
					<form action = "" method = "POST">
						<tr>
							<td style = "width: 100%;">
								<input  type = "text" name = "teacher_title" placeholder = "<?php echo $lang["teacher_title"];?>" 
								<?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $teacher_to_edit["teacher_title"]; ?>" 
								disabled <?php } ?> autofocus required />
							</td>
                        <tr>
                            <td style = "width: 100%;">
                                <input  type = "text" name = "teacher_name" placeholder = "<?php echo $lang["teacher_name"];?>" 
                                <?php if(isset($_SESSION['editId'])){ ?> value = "<?php echo $teacher_to_edit["name"]; ?>" 
                                disabled <?php } ?> autofocus required />
                            </td>

						</tr>
 						<tr>
							<td>
								<?php if(isset($_SESSION['editId'])){  ?>
									<input  type = "submit" name = "update_details" value = "<?php echo $lang["updatedetailsbutton"]; ?>" />
								<?php }else{ ?>
									<input  type = "submit" name = "save_details" value = "<?php echo $lang["savedetailsbutton"]; ?>" />
								<?php } ?>
									<input  type = "button" OnClick = "parent.location='./'" value = "<?php echo $lang["returnbutton"]; ?>" />	
								</td>
							</tr>
						</form>
					</table>
				</fieldset>
			</td>
		<tr>
<?php
}
}
?>