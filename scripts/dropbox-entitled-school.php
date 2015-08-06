<?php
global $wpdb;

$userRole = get_user_role();
$user_id = get_current_user_id();
if (strcmp($userRole,"schoolrep") != 0) 
{
        $schools = $wpdb->get_results( 'SELECT id,primary_name FROM `schools`', OBJECT);
}
else
{
        $school_id = $wpdb->get_var( 'SELECT id_school FROM `school_rep` WHERE user_id='.$user_id );
        $schools = $wpdb->get_results( 'SELECT id,primary_name FROM `courses` WHERE `id`='.$school_id, OBJECT);
}

if (isset($_POST["school-onbehalf"]))
        $school_ID=$_POST["school-onbehalf"];

?>

<select name="school-onbehalf" >
        <?php
        foreach ( $schools as $school ) {
                if (isset($school_ID) && $school->id==$school_ID)
                        echo "<option value=\"".$school->id."\" selected=\"selected\" >";
                else
                        echo "<option value=\"".$school->id."\">";
                echo $school->primary_name;
                echo "</option>\n";
        }
        ?>

</select>
