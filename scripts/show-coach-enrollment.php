<!DOCTYPE html>
<html>
<body>
	<table>
		 <?php
		global $wpdb;
                
                
                $results = $wpdb->get_results( 'SELECT distinct trainer_id FROM `trainer_choice`', OBJECT);
                
		if (count($results) > 0) {
                        echo "Showing " . ((string)count($results)) . " trainers (only their most recent enrollment)";
                        echo "<table>";
                        echo "<tr><th>Coach Name</th><th>1st choice</th><th>2nd choice</th><th>3rd choice</th></tr>";
                        foreach ( $results as $row ) 
                        {
                                $trainername = $wpdb->get_row( $wpdb->prepare('SELECT first_name, last_name, title
FROM `trainers`
WHERE id=%d', $row->trainer_id), OBJECT);
                                
                                echo "<tr>";
                                echo "<td>".$trainername->title." ".$trainername->first_name." ".$trainername->last_name."</td>";
                                for ( $choice=1; $choice<=3; $choice++ )
                                {
                                        $col = $wpdb->get_col( $wpdb->prepare('SELECT course_id FROM `trainer_choice` WHERE trainer_id=%d AND choice=%d', $row->trainer_id, $choice));
                                        $coursename = $wpdb->get_var( $wpdb->prepare('SELECT course_code FROM `courses` WHERE id=%d', end($col)));

                                        echo "<td>".$coursename."</td>";
                                }

                                echo "</tr>";
                        }
                        echo "</table>";
		} else {
			echo "0 results";
		}

		?> 
	</table>
</body>
</html>
