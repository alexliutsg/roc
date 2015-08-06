    <?php
        global $wpdb;


        if (isset($_POST["school-onbehalf"]))
        {
                $school_ID=$_POST["school-onbehalf"];
                
                echo "<h3>Course creation form</h3>";
                //course creation form

        ?>
        
                <form action="" method="POST">
                        <input type="hidden" name="school_id" value="<?php echo $school_ID ?>">
                
                        Course code:
                        <input type="text" name="course_code">
                
                        <table id="school-timeslots-table">
                                <tr>
                                    <th>Date</th><th>Start Time</th><th>End Time</th><th>Remarks</th><th>Include (Tick)</th>
                                </tr>
        
        
                        <?php

                        $timeslots = $wpdb->get_results( 'SELECT `date`,`start_time`,`end_time`,`remarks` FROM `school_time_slots` WHERE `school_id`='.$school_ID.' ORDER BY date ASC', OBJECT );
                        
                        $cnt = 0;
                        
                        foreach ( $timeslots as $slot )  {
                                echo "<tr>";
                                echo "<td><input type=\"date\" name=\"date[]\" value=\"".$slot->date."\"></td>";
                                echo "<td><input type=\"time\" name=\"start_time[]\" value=\"".$slot->start_time."\"></td>";
                                echo "<td><input type=\"time\" name=\"end_time[]\" value=\"".$slot->end_time."\"></td>";
                                echo "<td><input type=\"text\" name=\"remarks[]\" value=\"".$slot->remarks."\"></td>"; 
                                echo "<td><input type=\"checkbox\" name=\"chosen[".$cnt."]\"></td>";
                                echo "</tr>\n";
                                
                                $cnt = $cnt + 1;
                        }
         
                        ?>
                                
                        </table>
                        <input type="button" value="Add Row" onclick="addRow('school-timeslots-table')" >
            
                        <input type="submit" name="createcourse" value="Create Course" />        
                </form>
                 
        <?php
        }
        ?>
        
<script type="text/javascript">
        function addRow(tableID) {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;
                var row = table.insertRow(rowCount);
                var cell1 = row.insertCell(0);
                var element1 = document.createElement("input");
                element1.type = "date";
                element1.name = "date[]";
                cell1.appendChild(element1);
                var cell2 = row.insertCell(1);
                var element2 = document.createElement("input");
                element2.type = "time";
                element2.name = "start_time[]";
                cell2.appendChild(element2);
                var cell3 = row.insertCell(2);
                var element3 = document.createElement("input");
                element3.type = "time";
                element3.name = "end_time[]";
                cell3.appendChild(element3);
                var cell4 = row.insertCell(3);
                var element4 = document.createElement("input");
                element4.type = "text";
                element4.name = "remarks[]";
                cell4.appendChild(element4);
                var cell5 = row.insertCell(4);
                var element5 = document.createElement("input");
                element5.type = "checkbox";
                element5.name = "chosen["+(rowCount-1).toString()+"]";
                cell5.appendChild(element5);
        }
</script>

<?php
        global $wpdb;


        if (isset($_POST["createcourse"]))
        {
                
                if (count($_POST["chosen"]) > 0)
                {
                        $wpdb->query( $wpdb->prepare( 
                        "
                        INSERT INTO courses
                        ( school_id, course_code, created_at, updated_at )
                        VALUES ( %d, %s, now(), now() )
                        ",
                        $_POST["school_id"],
                        $_POST["course_code"] ) );
                        
                        $course_id = $wpdb->insert_id;
                        
                        foreach ( $_POST["chosen"] as $key => $value ) { //checked
                                $wpdb->query( $wpdb->prepare( 
                                "
                                INSERT INTO course_time_slots
                                ( course_id, date, start_time, end_time, remarks, created_at, updated_at )
                                VALUES ( %s, %s, %s, %s, %s, now(), now() )
                                ",
                                $course_id,
                                $_POST["date"][$key],
                                $_POST["start_time"][$key],
                                $_POST["end_time"][$key],
                                $_POST["remarks"][$key] ) );
                        }
                        
                        echo "<h2>Course (Code: ".$_POST["course_code"].") created successfully</h2>";
                }
                else
                {
                        echo "<h2>No time slot is chosen for course (Code: ".$_POST["course_code"].")</h2>";
                }
        }
        
?>

