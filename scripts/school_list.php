<!DOCTYPE html>
<html>
<body>
	<table>
		 <?php
		global $wpdb;		
        $names = $wpdb->get_results( 'SELECT `id`, `region_id`, `organization_type`, `primary_name`, `alternative_name`, `address`, `contact_number`, `email`, `fax_number`, `website`, `contact_person` FROM `schools`', OBJECT );
        echo "Choose school:"; 
		
		if (isset($_POST["school_id"]))
        $school_id=$_POST["school_id"];
		else
        foreach ( $names as $row )
        $school_id=$row->id;
		?>
	<form action="" method="POST">
	<select name="school_id" >
		<?php
		foreach ( $names as $row ) 
		{
				//echo "<option value=\"".$row->id."\">".$row->primary_name."</option>\n";
				
				if ($row->id==$school_id)
                        echo "<option value=\"".$row->id."\" selected=\"selected\" >";
                else
                        echo "<option value=\"".$row->id."\">";
                echo $row->primary_name;
                echo "</option>\n";
		}
		?>
		
	</select>
	</form>
	
	</table>
</body>
</html>
