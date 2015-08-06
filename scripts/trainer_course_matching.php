<!DOCTYPE html>
<html>
<body>
        <p>Trainers' preferences on the upcoming courses.</p>
        <table>
<?php
        global $wpdb;
        
        $course = $wpdb->get_results( 'SELECT  `courses`.`id` ,  `course_code` ,  `primary_name`,`trainer_id` FROM  `courses` ,  `schools` WHERE  `schools`.`id` =  `school_id`', OBJECT );
        $trainer_pref=$wpdb->get_results( 'SELECT `trainers`.`id`,`first_name`,`last_name`,`trainer_id`,`choice1`,`choice2`,`choice3` FROM `trainers`,`trainer_choice` WHERE `trainers`.`id`=`trainer_choice`.`trainer_id`', OBJECT );
        
        //display trainer name
        echo "<tr><td></td>";
        foreach ( $trainer_pref as $column )
                echo "<td>".$column->first_name.$column->last_name."</td>";
        echo "</tr>";
        
        //
        foreach ( $course as $row )  {
                echo "<tr><td>".$row->id.$row->course_code.$row->primary_name."</td>";
                       foreach ( $trainer_pref as $column ) {
                               switch ($row->id) {
                                       case $column->choice1:echo "<td>1st</td>";break;
                                       case $column->choice2:echo "<td>2nd</td>";break;
                                       case $column->choice3:echo "<td>3rd</td>";break;
                                       default:echo "<td></td>";break;
                               }
                       } 
                         
                echo "</tr>";
        }
        
?> 
        </table>
        
        <p>3. Staff can assign coach to courses</p>
        <form action="" method="POST">
                <table>
<?php
                //display trainer name
                echo "<tr><td></td>";
                foreach ( $trainer_pref as $column )
                        echo "<td>".$column->first_name.$column->last_name."</td>";
                echo "</tr>";
                
                //
                foreach ( $course as $row )  {
                        echo "<tr><td>".$row->id.$row->course_code.$row->primary_name."</td>";
                               foreach ( $trainer_pref as $column ) {
                                       if ($row->trainer_id==$column->id)
                                               echo "<td><input type=\"checkbox\" name=\"".($row->id*1000+$column->id)."\" value=\"1\" checked></td>";
                                       else
                                               echo "<td><input type=\"checkbox\" name=\"".($row->id*1000+$column->id)."\" value=\"0\"></td>";
                                
                             
                               } 
                                 
                        echo "</tr>";
                }
?>
                </table>
        
                <input type="submit" name="submitform" value="Submit 提交" />        
        </form>
                         
                 
                 
<?php 
                
                if (isset($_POST["submitform"])) {
                         
                        foreach ( $course as $row ) {
                                $assigned=0;
                                foreach ( $trainer_pref as $column )
                                {
                                        $box_id=$row->id*1000+$column->id;
                                        if (isset($_POST["$box_id"])) { //checked
                                                
                                                        $wpdb->query( $wpdb->prepare( 
                                                        "
                                                        UPDATE courses SET
                                                        trainer_id=%d
                                                        WHERE
                                                        id=%d
                                                        ", 
                                                        $column->id,
                                                        $row->id
                                                        ) );
                                                        $assigned=1;
                                                }
                                }
                                 if (!$assigned)  {//not checked
                                                
                                        $wpdb->query( $wpdb->prepare( 
                                        "
                                        UPDATE courses SET
                                        trainer_id=%d
                                        WHERE
                                        id=%d
                                        ", 
                                        0,
                                        $row->id
                                        ) );
                                }
                                        
                        }
                  }
                 
                                echo "<h2>Submitted successfully</h2>";
                        
		

?> 
</body>
</html>