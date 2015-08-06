    <?php
        global $wpdb;


        if (isset($_POST["school-onbehalf"]))
        {
                $school_ID=$_POST["school-onbehalf"];
                
                echo "<h3>School adds student</h3>";

        ?>
        
                <form action="" method="POST">
                        <input type="hidden" name="school_id" value="<?php echo $school_ID ?>">
                
                        <table id="school-student-table">
                                <tr>
                                    <th>Name</th><th>Gender</th><th>Age</th><th>Remarks</th>
                                </tr>
        
        
                        <?php

                        
                        $cnt = 1;

                        echo "<tr>";
                        echo "<td><input type=\"text\" name=\"name[]\"></td>";
                        echo "<td><input type=\"radio\" name=\"sex0\" value=\"male\"> Male<br><input type=\"radio\" name=\"sex0\" value=\"female\"> Female<br></td>";
                        echo "<td><input type=\"number\" name=\"age[]\"></td>";
                        echo "<td><input type=\"text\" name=\"remarks[]\"></td>"; 
                        echo "</tr>\n";
         
                        ?>
                                
                        </table>
                        <input type="button" value="Add Row" onclick="addRow('school-student-table')" >
            
                        <input type="submit" name="submitschoolstudent" value="Submit" />        
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
                element1.type = "text";
                element1.name = "name[]";
                cell1.appendChild(element1);
                var cell2 = row.insertCell(1);
                var element2a = document.createElement("input");
                element2a.type = "radio";
                element2a.value = "male";
                element2a.name = "sex"+(rowCount-1).toString();
                element2a.id = "radiobuttonM"+rowCount.toString();
                cell2.appendChild(element2a);
                var element2at = document.createElement("label");
                element2at.for = "radiobuttonM"+rowCount.toString();
                element2at.innerHTML = "Male<br>";
                cell2.appendChild(element2at);
                var element2b = document.createElement("input");
                element2b.type = "radio";
                element2b.value = "female";
                element2b.name = "sex"+(rowCount-1).toString();
                element2b.id = "radiobuttonF"+rowCount.toString();
                cell2.appendChild(element2b);
                var element2bt = document.createElement("label");
                element2bt.for = "radiobuttonF"+rowCount.toString();
                element2bt.innerHTML = "Female<br>";
                cell2.appendChild(element2bt);
                var cell3 = row.insertCell(2);
                var element3 = document.createElement("input");
                element3.type = "number";
                element3.name = "age[]";
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


        if (isset($_POST["submitschoolstudent"]))
        {
      
                foreach ( $_POST["name"] as $key => $value ) 
                {
                        if (strlen($_POST["name"][$key]) > 0) 
                        {
                                $wpdb->query( $wpdb->prepare( 
                                "
                                INSERT INTO participants
                                ( school_id, name, gender, age, remarks, created_at, updated_at )
                                VALUES ( %d, %s, %s, %d, %s, now(), now() )
                                ",
                                $_POST["school_id"],
                                $_POST["name"][$key],
                                $_POST["sex$key"],
                                $_POST["age"][$key],
                                $_POST["remarks"][$key] ) );
                        }
                }
                        
                echo "<h2>Students inserted successfully</h2>";

        }
        
?>

