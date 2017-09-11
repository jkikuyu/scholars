<?php
	class UserList{
public function grid_fetch($count, $select_user, $MYSQL){
			require "lang/en.php";
    $output = "";
    $columns    = 4;                                                  // users pr. row
    $amount_td  = $columns * (ceil( $count / $columns )) - $count;  // empty rows to create
    $i          = 0;
    $j          = 1;
?>
<div class="table-responsive">
<table class="table table bordered"><tr>
<?php
		if(is_array($select_user)){
foreach($select_user AS $result_row){
        if ( $i >= $columns ) {
            ?>
			</tr><tr>
			<?php
            $i = 0;
        }
        ?>
		<td style = "padding: 10px; text-align: center;"><?php print $result_row["user_name"]; ?><br /><?php print $result_row["full_name"]; ?><br /><?php print $result_row["email"]; ?><br />
<a id = "listlinks" title = "More about <?php echo $result_row["full_name"]; ?>" href = "dispatch.php?viewId=<?php echo $result_row["user_name"]; ?>" class = "nyroModal" ><img src = "images/icons/details.png" width = "20px" height = "20px" /></a> | <a id = "listlinks" title = "Edit <?php echo $result_row["full_name"]; ?>" href = "dispatch.php?editId=<?php echo $result_row["user_name"]; ?>"><img src = "images/icons/edit.png" width = "15px" height = "15px" /></a> | <a id = "listlinks" title = "Delete <?php echo $result_row["full_name"]; ?>" href = "dispatch.php?delId=<?php echo $result_row["user_name"]; ?>" onClick = "return confirm('Are you sure you want to delete <?php echo $result_row["full_name"]; ?> from the database?')"><img src = "images/icons/del.png" width = "15px" height = "15px" /></a>		
		</td>
		<?php
        $i++;
        $j++;
    }
    for( $i = 0; $i < $amount_td; $i++ ) {
        ?><td>&nbsp;</td><?php
    }
		}else{ print '<tr><td colspan = "10">' . $select_user . '</td></tr>'; }
?>
</tr>
		<script type = "text/javascript">
		$(function() {
		  $('.nyroModal').nyroModal();
		});
		</script>
			<?php
		}
		public function list_fetch($select_user, $MYSQL){
			require "lang/en.php";
	?>
		  <div class="table-responsive">
		   <table class="table table bordered">
			<thead>
				<tr>
					<th><?php print ucwords($lang["username"]); ?></th>
					<th><?php print ucwords($lang["fullname"]); ?></th>
					<th><?php print ucwords($lang["email"]); ?></th>
					<th><?php print ucwords($lang["phonenumber"]); ?></th>
					<th><?php print ucwords($lang["actions"]); ?></th>
				</tr>
			</thead>
	<?php
		if(is_array($select_user)){
			foreach($select_user AS $result_row){
	?>
					<tr>
						<td><?php print $result_row["user_name"]; ?></td>
						<td><?php print $result_row["full_name"]; ?></td>
						<td><?php print $result_row["email"]; ?></td>

						<td><?php print $result_row["phone_number"]; ?></td>
						<td>
		<a id = "listlinks" title = "More about <?php echo $result_row["full_name"]; ?>" href = "dispatch.php?viewId=<?php echo $result_row["userid"]; ?>" class = "nyroModal" ><img src = "images/icons/details.png" width = "20px" height = "20px" /></a> | <a id = "listlinks" title = "Edit <?php echo $result_row["full_name"]; ?>" href = "dispatch.php?editId=<?php echo $result_row["userid"]; ?>"><img src = "images/icons/edit.png" width = "15px" height = "15px" /></a> | <a id = "listlinks" title = "Delete <?php echo $result_row["full_name"]; ?>" href = "index.php?delId=<?php echo $result_row["user_name"]; ?>" onClick = "return confirm('Are you sure you want to delete <?php echo $result_row["full_name"]; ?> from the database?')"><img src = "images/icons/del.png" width = "15px" height = "15px" /></a>
						</td>
					</tr>
	<?php
			}
		}else{ print '<tr><td colspan = "10">' . $select_user . '</td></tr>'; }
	?>
			<tfoot>
				<tr>
					<th><?php print ucwords($lang["username"]); ?></th>
					<th><?php print ucwords($lang["fullname"]); ?></th>
					<th><?php print ucwords($lang["email"]); ?></th>
					<th><?php print ucwords($lang["phonenumber"]); ?></th>
					<th><?php print ucwords($lang["actions"]); ?></th>
				</tr>
			</tfoot>
			<script type = "text/javascript">
			$(function() {
			  $('.nyroModal').nyroModal();
			});
			</script>
	<?php
	}
public function article_grid_fetch($count, $select_user, $MYSQL){
			require "lang/en.php";
    $output = "";
    $columns    = 4;                                                  // users pr. row
    $amount_td  = $columns * (ceil( $count / $columns )) - $count;  // empty rows to create
    $i          = 0;
    $j          = 1;
	?>
	<div class="table-responsive">
	<table class="table table bordered"><tr>
	<?php
			if(is_array($select_user)){
	foreach($select_user AS $result_row){
	        if ( $i >= $columns ) {
	            ?>
				</tr><tr>
				<?php
	            $i = 0;
	        }
	        ?>
			<td style = "padding: 10px; text-align: center;"><?php print $result_row["article_title"]; ?><br /><?php print $result_row["full_name"]; ?><br /><?php print $result_row["article_created_date"]; ?><br />
	<a id = "listlinks" title = "More about <?php echo $result_row["article_title"]; ?>" href = "dispatch.php?viewId=<?php echo $result_row["articleid"]; ?>" class = "nyroModal" ><img src = "images/icons/details.png" width = "20px" height = "20px" /></a> | <a id = "listlinks" title = "Edit <?php echo $result_row["article_title"]; ?>" href = "dispatch.php?editId=<?php echo $result_row["articleid"]; ?>"><img src = "images/icons/edit.png" width = "15px" height = "15px" /></a> | <a id = "listlinks" title = "Delete <?php echo $result_row["article_title"]; ?>" href = "dispatch.php?delId=<?php echo $result_row["articleid"]; ?>" onClick = "return confirm('Are you sure you want to delete <?php echo $result_row["article_title"]; ?> from the database?')"><img src = "images/icons/del.png" width = "15px" height = "15px" /></a>		
		</td>
		<?php
        $i++;
        $j++;
    }
    for( $i = 0; $i < $amount_td; $i++ ) {
        ?><td>&nbsp;</td><?php
    }
		}else{ print '<tr><td colspan = "10">' . $select_user . '</td></tr>'; }
	?>
	</tr>
		<script type = "text/javascript">
		$(function() {
		  $('.nyroModal').nyroModal();
		});
		</script>
			<?php
		}
		public function article_list_fetch($select_user, $MYSQL){
			require "lang/en.php";
	?>
		  <div class="table-responsive">
		   <table class="table table bordered">
			<thead>
				<tr>
					<th><?php print ucwords($lang["a_title"]); ?></th>
					<th><?php print ucwords($lang["author"]); ?></th>
					<th><?php print ucwords($lang["fulltext"]); ?></th>
					<th><?php print ucwords($lang["articledate"]); ?></th>
					<th><?php print ucwords($lang["articleupdate"]); ?></th>
					<th><?php print ucwords($lang["actions"]); ?></th>
				</tr>
			</thead>
	<?php
		if(is_array($select_user)){
			foreach($select_user AS $result_row){
	?>
					<tr>
						<td><?php print $result_row["article_title"]; ?></td>
						<td><?php print $result_row["full_name"]; ?></td>
						<td><a href=""><?php print $lang["viewarticle"]; ?></a></td>
						<td><?php print $result_row["article_created_date"]; ?></td>
						<td><?php print $result_row["article_last_update"]; ?></td>

						<td>
		<a id = "listlinks" title = "More about <?php echo $result_row["full_name"]; ?>" href = "dispatch.php?viewId=<?php echo $result_row["articleid"]; ?>" class = "nyroModal" ><img src = "images/icons/details.png" width = "20px" height = "20px" /></a> | <a id = "listlinks" title = "Edit <?php echo $result_row["article_title"]; ?>" href = "dispatch.php?editId=<?php echo $result_row["articleid"]; ?>"><img src = "images/icons/edit.png" width = "15px" height = "15px" /></a> | <a id = "listlinks" title = "Delete <?php echo $result_row["articleid"]; ?>" href = "index.php?delId=<?php echo $result_row["articleid"]; ?>" onClick = "return confirm('Are you sure you want to delete <?php echo $result_row["article_title"]; ?> from the database?')"><img src = "images/icons/del.png" width = "15px" height = "15px" /></a>
						</td>
					</tr>
	<?php
			}
		}else{ print '<tr><td colspan = "10">' . $select_user . '</td></tr>'; }
	?>
			<tfoot>
				<tr>
					<th><?php print ucwords($lang["a_title"]); ?></th>
					<th><?php print ucwords($lang["author"]); ?></th>
					<th><?php print ucwords($lang["fulltext"]); ?></th>
					<th><?php print ucwords($lang["articledate"]); ?></th>
					<th><?php print ucwords($lang["articleupdate"]); ?></th>
					<th><?php print ucwords($lang["actions"]); ?></th>
				</tr>
			</tfoot>
			<script type = "text/javascript">
			$(function() {
			  $('.nyroModal').nyroModal();
			});
			</script>
	<?php
	}

	public function modal_fetch($pers_edit_row){
	?>
		<div class = "modal-header">
			<h2><?php echo $pers_edit_row['full_name']; ?></h2>
		</div>
		<div class = "modal-body">
			<p style = "text-align: justify; text-justify: inter-word;"><img src = "images/people/<?php echo $pers_edit_row['profile_image']; ?>" style = "border: solid #ffffff 0px; width: 100px; height: 100px; padding: 3px;" hspace = "5" align = "left" />
		</div>
		<div class = "modal-footer">
			<h4>Phone number: <?php echo $pers_edit_row['phone_number']; ?> </h4>
			<h4>By: <?php echo $pers_edit_row['full_name']; ?> &lt; <?php echo $pers_edit_row['email']; ?> &gt;</h>
		</div>
<?php
	}
}
?>
