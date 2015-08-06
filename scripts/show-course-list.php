<!DOCTYPE html>
<html>
<body>
	<table>
		 <?php
		global $wpdb;
		
                $names = $wpdb->get_results( 'SELECT courses.id,courses.school_id,courses.course_code,schools.primary_name FROM `courses` join `schools` on courses.school_id=schools.id', OBJECT );
                
                for ($x = 1; $x <= 3; $x++)
                {
                        echo "Preference ".(string)$x."<br>";
                        echo "<select name=\"choice$x\" onchange=\"\">";
        
                        foreach ( $names as $row ) 
                        {
                                echo "<option value=\"".$row->id."\">".$row->primary_name.": ".$row->course_code."</option>\n";
                        }
                        echo "</select><br><br>";
                }
                ?>
                


	</table>
</body>
</html>

