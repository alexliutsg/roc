<!DOCTYPE html>
<html>
<body>
	
        <?php
		global $wpdb;
		$trainer = $wpdb->get_results( 'SELECT `first_name`, `last_name`, `title`, `payment_rate`, `club_represented`, `qualification`, `email`, `mobile` FROM `1823734_1023`.`trainers`', OBJECT);	
        ?>
                
        <table>
        <?php        
		if (count($trainer) > 0) {
                        foreach ( $trainer as $row ) 
                        {
                        
                                echo "<tr><td>First name</td><td>".$row->first_name."</td></tr><tr><td>Last Name</td><td>".$row->last_name."</td></tr><tr><td>Title</td><td>".$row->title."</td></tr><tr><td>Payment rate</td><td>".$row->payment_rate."</td></tr><tr><td>Club</td><td>".$row->club_represented."</td></tr><tr><td>Qualification</td><td>".$row->qualification."</td></tr><tr><td>Email Person</td><td>".$row->email."</td></tr><tr><td>Mobile</td><td>".$row->mobile."</td></tr>";
                                
                        }
		} else {
			echo "There is no trainer registered.";
		}
         ?>
         </table>
</body>
</html>