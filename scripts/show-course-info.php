<!DOCTYPE html>
<html>
<body>
	<table>
		 <?php
		global $wpdb;
                
                $results = $wpdb->get_results( 'SELECT courses.id,primary_name, course_code, district
FROM `courses`
JOIN `schools` ON courses.school_id = schools.id', OBJECT);
                
           
                
		if (count($results) > 0) {
                        echo "Showing " . ((string)count($results)) . " courses";
echo "<table>";
                        echo "<tr><th>Course code</th><th>School Name</th><th>District</th><th>Date and Time</th></tr>";
                        foreach ( $results as $row ) 
                        {
                                $coursetime = $wpdb->get_results( $wpdb->prepare('SELECT date, start_time, end_time, remarks
FROM `course_time_slots`
WHERE course_id=%d ORDER BY date ASC', $row->id), OBJECT);
                                echo "<tr>";
                                echo "<td>".$row->course_code."</td><td>".$row->primary_name."</td><td>".$row->district."</td>";
                                echo "<td><table>";
                                foreach ( $coursetime as $slot )
                                {
                                        echo "<tr>";
                                        echo "<td>".$slot->date."</td><td>".$slot->start_time."</td><td>".$slot->end_time."</td><td>".$slot->remarks."</td>";
                                        echo "</tr>";
                                }
                                echo "</table></td>";
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
