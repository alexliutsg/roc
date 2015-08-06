<?php
global $wpdb;

$userRole = get_user_role();
$user_id = get_current_user_id();
if (strcmp($userRole,"trainer") != 0) 
{
        $courses = $wpdb->get_results( 'SELECT id,course_code FROM `courses`', OBJECT);
}
else
{
        $trainer_id = $wpdb->get_var( 'SELECT id FROM `trainer_user_id_list` WHERE id_user='.$user_id );
        $courses = $wpdb->get_results( 'SELECT id,course_code FROM `courses` WHERE `trainer_id`='.$trainer_id, OBJECT);
}

if (isset($_POST["course_id"]))
        $course_ID=$_POST["course_id"];
else
        foreach ( $courses as $row )
                $course_ID=$row->id;
?>

<select name="course_id" >
        <?php
        foreach ( $courses as $course ) {
                if ($course->id==$course_ID)
                        echo "<option value=\"".$course->id."\" selected=\"selected\" >";
                else
                        echo "<option value=\"".$course->id."\">";
                echo $course->course_code;
                echo "</option>\n";
        }
        ?>

</select>
