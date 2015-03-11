<!DOCTYPE html>
<html>
<body>
	<table>
		 <?php
		global $wpdb;
                $columns = $wpdb->get_results( 'SHOW COLUMNS FROM schools ', OBJECT );
		$results = $wpdb->get_results( 'SELECT `id`, `region_id`, `organization_type`, `primary_name`, `alternative_names`, `address`, `contact_numbers`, `email`, `fax_numbers`, `website`, `contact_persons`, `pitching_status`, `remarks` FROM `schools`', OBJECT );
               
                echo count($columns);
                
		if (count($results) > 0) {
                        foreach ( $results as $row ) 
                        {
                                echo "<tr>";
                                echo "<td>".$row->primary_name."</td><td>".$row->alternative_names."</td><td>".$row->address."</td><td>".$row->contact_numbers."</td><td>".$row->contact_persons."</td><td>".$row->pitching_status."</td><td>".$row->remarks."</td>";
                                echo "</tr>";
                        }
		} else {
			echo "0 results";
		}

		?> 
	</table>
</body>
</html>