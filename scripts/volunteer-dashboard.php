<!DOCTYPE html>
<html>
<body>
	
        <?php
		global $wpdb;
		$volunteer = $wpdb->get_results( 'SELECT `first_name`, `last_name`, `title`, `employment_status`, `education_background`, `years_of_experience_in_volunteering`, `email`, `mobile` FROM `1823734_1023`.`volunteers`', OBJECT);	
        ?>
                
        <table>
        <?php        
		if (count($volunteer) > 0) {
                        foreach ( $volunteer as $row ) 
                        {
                        
                                echo "<tr><td>First Name</td><td>".$row->first_name."</td></tr><tr><td>Last Name</td><td>".$row->last_name."</td></tr><tr><td>Title</td><td>".$row->title."</td></tr><tr><td>Employment Status</td><td>".$row->employment_status."</td></tr><tr><td>Education Background</td><td>".$row->education_background."</td></tr><tr><td>Years of Experience in Volunteering</td><td>".$row->years_of_experience_in_volunteering."</td></tr><tr><td>Email Person</td><td>".$row->email."</td></tr><tr><td>Mobile</td><td>".$row->mobile."</td></tr>";
                                
                        }
		} else {
			echo "There is no volunteer registered.";
		}
         ?>
         </table>
</body>
</html>
