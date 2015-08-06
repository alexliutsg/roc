	<?php
        
        global $wpdb;
        
        if (isset($_POST["changecourse"]))
        {
                $course_ID = $_POST["course_id"];
                
                $school_ID = $wpdb->get_var( 'SELECT `school_id` FROM `courses` WHERE `id`='.$course_ID );
                                   
                $lessons = $wpdb->get_results( 'SELECT `id`, `date`, `start_time`, `end_time` FROM `course_time_slots` WHERE `course_id`='.$course_ID, OBJECT );
                
                if (isset($_POST["lesson_id"]))
                        $lesson_ID=$_POST["lesson_id"];
                else
                        foreach ( $lessons as $row )
                                $lesson_ID=$row->id;
                

                ?>
                
                
                <form action="" method="POST">
                        <input type="hidden" name="changecourse" value="true">
                        <input type="hidden" name="course_id" value="<?php echo $course_ID ?>">
                        
                        <select name="lesson_id" >
                                <?php
                                foreach ( $lessons as $row ) {
                                        if ($row->id==$lesson_ID)
                                                echo "<option value=\"".$row->id."\" selected=\"selected\">";
                                        else
                                                echo "<option value=\"".$row->id."\">";
                                        echo $row->date." (".$row->start_time."-".$row->end_time.")";
                                        echo "</option>\n";
                                }
                                ?>
                                
                        </select>
                        <input type="submit" name="selectlesson" value="Change Date" />
                        
                        <table>
                            <tr>
                                    <th>Name</th><th>Gender</th><th>Present (Tick)</th>
                            </tr>
                
                
                <?php
                //student attendacnce list
                

                $students = $wpdb->get_results( 'SELECT `id`,`name`, `gender` FROM `participants` WHERE `school_id`='.$school_ID, OBJECT );
                $lesson_ID=$_POST["lesson_id"];
                $attendance= $wpdb->get_results( 'SELECT `student_id`,`attended` FROM `attendance` WHERE `course_id`='.$course_ID.' AND `lesson_id`='.$lesson_ID, OBJECT );
                $attend=array();
                foreach ( $attendance as $row ) {
                        $attend[$row->student_id]=$row->attended;
                }
                          
                        
                foreach ( $students as $row )  {
                        echo "<tr><td>".$row->name."</td><td>".$row->gender."</td>";
                        
                        if (isset($_POST["submitform"]))
                        {
                                if (isset($_POST["$row->id"]))
                                        echo "<td><input type=\"checkbox\" id=\"cb".$row->id."\" name=\"".$row->id."\" value=\"1\" checked></td>";
                                else
                                        echo "<td><input type=\"checkbox\" id=\"cb".$row->id."\" name=\"".$row->id."\" value=\"0\"></td>";
                        }
                        else 
                        {
                                if ($attend[$row->id]==1)
                                        echo "<td><input type=\"checkbox\" id=\"cb".$row->id."\" name=\"".$row->id."\" value=\"1\" checked></td>";
                                else
                                        echo "<td><input type=\"checkbox\" id=\"cb".$row->id."\" name=\"".$row->id."\" value=\"0\"></td>";
                        }
                        echo "</tr>\n";
                }
                               
                ?>
                                
                        </table>
            
                        <input type="submit" name="submitform" value="Submit 提交" />        
                </form>

                
        <?php
        }
        
        if (isset($_POST["submitform"])) {

                foreach ( $students as $row ) {
                        if (isset($_POST["$row->id"])) { //checked
                                if (!isset($attend[$row->id])) { //no previous record
                                        $wpdb->query( $wpdb->prepare( 
                                        "
                                        INSERT INTO attendance
                                        ( course_id, lesson_id, student_id,attended )
                                        VALUES ( %d, %d, %d, %d  )
                                        ", 
                                        $course_ID, 
                                        $lesson_ID,
                                        $row->id,
                                        1      
                                        ) );
                                } else
                                if ($attend[$row->id]==0) { //previously not checked
                                        $wpdb->query( $wpdb->prepare( 
                                        "
                                        UPDATE attendance SET
                                        attended=%d
                                        WHERE
                                        course_id=%d AND 
                                        lesson_id=%d AND  
                                        student_id=%d
                                        ", 
                                        1,
                                        $course_ID, 
                                        $lesson_ID,
                                        $row->id
                                        ) );
                                }
                        } else {//not checked
                                if ($attend[$row->id]==1) { //previously checked
                                        $wpdb->query( $wpdb->prepare( 
                                        "
                                        UPDATE attendance SET
                                        attended=%d
                                        WHERE
                                        course_id=%d AND 
                                        lesson_id=%d AND
                                        student_id=%d
                                        ", 
                                        0,
                                        $course_ID, 
                                        $lesson_ID,
                                        $row->id
                                        ) );
                                }
                        }
                        
                  }
         
                echo "<h2>Attendance updated successfully</h2>";
                
	}
        ?>



