<?php
global $wpdb;

$userRole = get_user_role();
if (strcmp($userRole,"trainer") != 0) 
{
        $trainers = $wpdb->get_results( 'SELECT id,primary_name FROM `schools`', OBJECT);
?>
        On Behalf of school:
        <select name="user-onbehalf" >
                <?php
                foreach ( $schools as $school ) {
                        echo "<option value=\"".$school->id."\" >";
                        echo $school->primary_name;
                        echo "</option>\n";
                }
                ?>
        
        </select>
<?php
}
?>
