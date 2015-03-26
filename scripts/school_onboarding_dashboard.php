<!DOCTYPE html>
<html>
<body>
	
        <?php
		global $wpdb;
                //$columns = $wpdb->get_results( 'SHOW COLUMNS FROM schools ', OBJECT );
		$school = $wpdb->get_results( 'SELECT `primary_name`, `alternative_name`, `address`, `contact_number`, `email`, `fax_number`, `contact_person`, `title` FROM `1823734_1023`.`schools` WHERE `id`=1', OBJECT);
        
		$school_timeslot = $wpdb->get_results( 'SELECT `date`, `start_time`, `end_time` FROM `1823734_1023`.`school_time_slots` WHERE `school_id`=1', OBJECT);
		
		$participant = $wpdb->get_results( 'SELECT `name`, `email`, `mobile`, `gender`, `age`, `remarks` FROM `1823734_1023`.`participants` WHERE `school_id`=1', OBJECT);		
		 
                //echo count($columns);
        ?>
                
        <table>
        <?php        
		if (count($school) > 0) {
                        foreach ( $school as $row ) 
                        {
                        
                                echo "<tr><td>School Name</td><td>".$row->primary_name."</td></tr><tr><td>School Name</td><td>".$row->alternative_name."</td></tr><tr><td>Address</td><td>".$row->address."</td></tr><tr><td>Phone</td><td>".$row->contact_number."</td></tr><tr><td>Email</td><td>".$row->email."</td></tr><tr><td>Fax</td><td>".$row->fax_number."</td></tr><tr><td>Contact Person</td><td>".$row->contact_person."</td></tr><tr><td>Title</td><td>".$row->title."</td></tr>";
                                
                        }
		} else {
			echo "0 results";
		}
         ?>
         </table>
         <table>
         <th>Time</th>
         <?php
		if (count($school_timeslot) > 0) {
                        foreach ( $school_timeslot as $row ) 
                        {
                                echo "<tr>";
                                echo "<td>".$row->date."</td><td>".$row->start_time."</td><td>".$row->end_time."</td>";
                                echo "</tr>";
                        }
		} else {
			echo "0 results";
		}
	?>
        </table>
        <table>
        <th>Participant List</th>
        <?php
           
		if (count($participant) > 0) {
                        foreach ( $participant as $row ) 
                        {
                                echo "<tr>";
                                echo "<td>".$row->name."</td><td>".$row->email."</td><td>".$row->mobile."</td><td>".$row->gender."</td><td>".$row->age."</td><td>".$row->remarks."</td>";
                                echo "</tr>";
                        }
		} else {
			echo "0 results";
		}

		?>
             </table>
	
</body>
</html>