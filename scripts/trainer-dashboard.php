<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/scripts/jquery.dataTables.css">
</head>
<body>
	
        <?php
		
		global $wpdb;
		global $trainer;
		
		$trainer_user_id = 0;
		$user_ID = get_current_user_id();
		$trainer_user_id = $wpdb->get_var( "SELECT `id` FROM `trainer_user_id_list` WHERE id_user=$user_ID" );
		
		if (!empty($trainer_user_id)) 
		{
        $trainer = $wpdb->get_results( $wpdb->prepare('SELECT `first_name`, `last_name`, `title`, `payment_rate`, `club_represented`, `qualification`, `email`, `mobile` FROM `trainers` WHERE user_id=%d', $trainer_user_id ), OBJECT);	
                        
		}
		else
		{
		$trainer = $wpdb->get_results( $wpdb->prepare('SELECT `first_name`, `last_name`, `title`, `payment_rate`, `club_represented`, `qualification`, `email`, `mobile` FROM `trainers` WHERE user_id=%d', 0 ), OBJECT);	
        }
		
		?>
		
		<table id="example" class="display" cellspacing="0" width="100%">
        <?php        
		if (count($trainer) > 0) {
			echo "<thead><tr><th>First name</th><th>Last Name</th><th>Title</th><th>Payment rate</th><th>Club</th><th>Qualification</th><th>Email</th><th>Mobile</th></tr></thead>";
			echo "<tbody>";
                        foreach ( $trainer as $row ) 
                        {
                                echo "<tr><td>".$row->first_name."</td><td>".$row->last_name."</td><td>".$row->title."</td><td>".$row->payment_rate."</td><td>".$row->club_represented."</td><td>".$row->qualification."</td><td>".$row->email."</td><td>".$row->mobile."</td></tr>";  
                        }
            echo "</tbody>";
		} else {
			echo "There is no trainer registered.";
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
