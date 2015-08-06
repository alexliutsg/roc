<?php
global $wpdb;

$userRole = get_user_role();
if (strcmp($userRole,"trainer") != 0) 
{
        $trainers = $wpdb->get_results( 'SELECT id,first_name, last_name, title FROM `trainers`', OBJECT);
?>
        On Behalf of coach:
        <select name="user-onbehalf" >
                <?php
                foreach ( $trainers as $trainer ) {
                        echo "<option value=\"".$trainer->id."\" >";
                        echo $trainer->title." ".$trainer->first_name." ".$trainer->last_name;
                        echo "</option>\n";
                }
                ?>
        
        </select>
<?php
}
?>
