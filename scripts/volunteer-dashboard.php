<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/scripts/jquery.dataTables.css">
</head>
<body>
	
        <?php
		
		global $wpdb;
		global $volunteer;
		
		$volunteer_user_id = 0;
		$user_ID = get_current_user_id();
		$volunteer_user_id = $wpdb->get_var( "SELECT `id` FROM `volunteer_user_id_list` WHERE id_user=$user_ID" );
		
		if (!empty($volunteer_user_id)) 
		{
        $volunteer = $wpdb->get_results( $wpdb->prepare('SELECT `first_name`, `last_name`, `title`, `employment_status`, `education_background`, `years_of_experience_in_volunteering`, `email`, `mobile` FROM `volunteers` WHERE user_id=%d', $volunteer_user_id ), OBJECT);	
                        
		}
		else
		{
		$volunteer = $wpdb->get_results( $wpdb->prepare('SELECT `first_name`, `last_name`, `title`, `employment_status`, `education_background`, `years_of_experience_in_volunteering`, `email`, `mobile` FROM `volunteers` WHERE user_id=%d', 0 ), OBJECT);	
        }
		
		?>
		
		<table id="example" class="display" cellspacing="0" width="100%">
        <?php        
		if (count($volunteer) > 0) {
			echo "<thead><tr><th>First name</th><th>Last Name</th><th>Title</th><th>Employment Status</th><th>Education Background</th><th>Years of Experience in Volunteering</th><th>Email</th><th>Mobile</th></tr></thead>";
			echo "<tbody>";
                        foreach ( $volunteer as $row ) 
                        {
                                echo "<tr><td>".$row->first_name."</td><td>".$row->last_name."</td><td>".$row->title."</td><td>".$row->employment_status."</td><td>".$row->education_background."</td><td>".$row->years_of_experience_in_volunteering."</td><td>".$row->email."</td><td>".$row->mobile."</td></tr>";  
                        }
            echo "</tbody>";
		} else {
			echo "There is no volunteer registered.";
		}
        ?> 
        </table>

        <script type="text/javascript" charset="utf8" src="/scripts/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" charset="utf8" src="/scripts/jquery.dataTables.min.js"></script>
		<script>
		$(function(){
			$("#example").dataTable();
		})
		</script> 
</body>
</html>
