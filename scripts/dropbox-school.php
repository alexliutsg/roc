<?php
global $wpdb;

$schools = $wpdb->get_results( 'SELECT id,primary_name FROM `schools`', OBJECT);
?>
<select name="school-onbehalf" >
        <?php
        foreach ( $schools as $school ) {
                echo "<option value=\"".$school->id."\" >";
                echo $school->primary_name;
                echo "</option>\n";
        }
        ?>

</select>

