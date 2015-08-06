
	 <?php
	global $wpdb;
	
	if (isset($_POST["school-onbehalf"]))
        {
                $school_id=$_POST["school-onbehalf"];
	
        
                //echo "You are school representative of School ID ".$school_id."\n";
                $results = $wpdb->get_results( $wpdb->prepare( 'SELECT `id`, `region_id`, `organization_type`, `primary_name`, `alternative_name`, `address`, `contact_number`, `email`, `fax_number`, `website`, `contact_person` FROM `schools` WHERE id=%d', $school_id), OBJECT );

                if (count($results) > 0) { ?>
                        <table>
                        <tr>
                            <th>Primary name</th><th>Secondary name</th><th>Contact Number</th><th>Contact Person</th>
                        </tr>
                <?php
                        foreach ( $results as $row ) 
                        {
                                echo "<tr>";
                                echo "<td>".$row->primary_name."</td><td>".$row->alternative_name."</td><td>".$row->contact_number."</td><td>".$row->contact_person."</td>";
                                echo "</tr>";
                        }
                        echo "</table>";
                } else {
                        echo "0 results";
                }
        }

	?> 

