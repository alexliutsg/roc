    <?php
        global $wpdb;


        if (isset($_POST["school-onbehalf"]))
        {
                $school_ID=$_POST["school-onbehalf"];
                
                echo "<h3>School chooses available dates</h3>";

        ?>
        
                <form action="" method="POST">
                        <input type="hidden" name="school_id" value="<?php echo $school_ID ?>">
                
                        <table id="school-timeslots-table">
                                <tr>
                                    <th>Date</th><th>Start Time</th><th>End Time</th><th>Remarks</th>
                                </tr>
        
        
                        <?php

                        
                        $cnt = 1;

                        echo "<tr>";
                        echo "<td><input type=\"date\" name=\"date[]\"></td>";
                        echo "<td><input type=\"time\" name=\"start_time[]\"></td>";
                        echo "<td><input type=\"time\" name=\"end_time[]\"></td>";
                        echo "<td><input type=\"text\" name=\"remarks[]\"></td>"; 
                        echo "</tr>\n";
         
                        ?>
                                
                        </table>
                        <input type="button" value="Add Row" onclick="addRow('school-timeslots-table')" >
            
                        <input type="submit" name="submitschooltime" value="Submit" />        
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
        }
</script>

<?php
        global $wpdb;


        if (isset($_POST["submitschooltime"]))
        {
                
                foreach ( $_POST["date"] as $key => $value ) 
                {
                        if (strlen($_POST["date"][$key]) > 0) 
                        {
                                $wpdb->query( $wpdb->prepare( 
                                "
                                INSERT INTO school_time_slots
                                ( school_id, date, start_time, end_time, remarks, created_at, updated_at )
                                VALUES ( %s, %s, %s, %s, %s, now(), now() )
                                ",
                                $_POST["school_id"],
                                $_POST["date"][$key],
                                $_POST["start_time"][$key],
                                $_POST["end_time"][$key],
                                $_POST["remarks"][$key] ) );
                        }
                }
                        
                echo "<h2>School time slots inserted successfully</h2>";

        }
        
?>

