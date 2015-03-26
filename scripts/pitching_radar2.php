<!DOCTYPE html>
<html>
<body>
	<table>
		 <?php
		global $wpdb;
                $columns = $wpdb->get_results( 'SHOW COLUMNS FROM schools ', OBJECT );
		$results = $wpdb->get_results( 'SELECT `schools`.`id`,`primary_name`, `alternative_name`, `contact_person`,`date`, `pitching_status` FROM `schools`, `pitching_history` WHERE `schools`.`id`=`pitching_history`.`school_id` AND `pitching_history`.`id` IN    
(
	SELECT `id` FROM `pitching_history` WHERE `date` IN
	(
		SELECT `max_date` FROM 
		(
			SELECT `school_id`,max(`date`) AS `max_date`FROM `pitching_history` GROUP BY `school_id`
		) max_date_table
	)
) 
AND `pitching_history`.`id` IN 
(
	SELECT `max_id` FROM 
	(
		SELECT `date`,max(`id`) AS `max_id` FROM `pitching_history` GROUP BY `date`
	) max_id_table
)', OBJECT );
               
                //echo count($columns);
                
		if (count($results) > 0) {
                        echo "Showing " . ((string)count($results)) . " schools";
                        echo "<tr><th>School ID</th><th>Chinese Name</th><th>English Name</th><th>Contact Person</th><th>Last Pitched Date</th><th>Pitching Status</th></tr>";
                        foreach ( $results as $row ) 
                        {
                                echo "<tr>";
                                echo "<td>".$row->id."</td><td>".$row->primary_name."</td><td>".$row->alternative_name."</td><td>".$row->contact_person."</td><td>".$row->date."</td><td>".$row->pitching_status."</td>";
                                echo "</tr>";
                        }
		} else {
			echo "0 results";
		}

		?> 
	</table>
</body>
</html>