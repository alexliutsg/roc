<!DOCTYPE html>
<html>
<body>
	<table>
		 <?php
		global $wpdb;
		
                if (isset($_POST["school_id"])) {
                        $school_id = $_POST["school_id"];
                }
		else {
                        $user_ID = get_current_user_id();
                        //echo "User id is ".$user_ID."\n";
                        $school_id = $wpdb->get_var( "SELECT `school_id` FROM `user_school` WHERE user_id=$user_ID" );
		}
                
                if (!empty($school_id)) {
                        //echo "You are school representative of School ID ".$school_id."\n";
                        $results = $wpdb->get_results( $wpdb->prepare( 'SELECT `id`, `region_id`, `organization_type`, `primary_name`, `alternative_name`, `address`, `contact_numbers`, `email`, `fax_number`, `website`, `contact_persons` FROM `schools` WHERE id=%d', $school_id), OBJECT );
                        //$rep_results = $wpdb->get_results( $wpdb->prepare( 'SELECT `school_id`, `name`, `title` FROM `school_representatives` WHERE school_id=%d', $school_id), OBJECT );
                        if (count($results) > 0) {
                                foreach ( $results as $row ) 
                                {
                                        echo "<tr>";
                                        echo "<td>".$row->id."</td><td>".$row->primary_name."</td><td>".$row->alternative_names."</td><td>".$row->contact_numbers."</td><td>".$row->contact_persons."</td>";
                                        echo "</tr>";
                                }
                        } else {
                                echo "0 results";
                        }
                }
                else {
                        //echo "You are admin\n\n";
                        $names = $wpdb->get_results( 'SELECT `id`, `region_id`, `organization_type`, `primary_name`, `alternative_name`, `address`, `contact_numbers`, `email`, `fax_number`, `website`, `contact_person` FROM `schools`', OBJECT );
                        echo "Choose school:"; ?>
                        <form action="" method="POST"><select name="school_id" onchange="this.form.submit();">
                        <?php
                        foreach ( $names as $row ) 
                        {
                                echo "<option value=\"".$row->id."\">".$row->primary_name."</option>\n";
                        }
                        ?>
                        </select>
                        </form>
                        <?php

                }
                
		

		?> 
	</table>
</body>
</html>