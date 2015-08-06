<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/scripts/jquery.dataTables.css">
</head>
<body>

        <?php
		global $wpdb;
                //$columns = $wpdb->get_results( 'SHOW COLUMNS FROM schools ', OBJECT );
		$participant = $wpdb->get_results( '
		    select schools.primary_name, schools.alternative_name, name, participants.email, participants.mobile, participants.gender, participants.age, participants.remarks
            from participants
            inner join schools on schools.id = participants.school_id', OBJECT);

                //echo count($columns);
        ?>

        <table id="participants" class="display" cellspacing="0" width="100%">
            <?php
            if (count($participant) > 0) {
                echo "<thead><tr><th>School Primary Name</th><th>Alternative Name</th><th>Name</th><th>Email</th><th>Mobile</th><th>Gender</th><th>Age</th><th>Remarks</th></tr></thead>";
                echo "<tbody>";
                foreach ( $participant as $row )
                {
                    echo "<tr><td>".$row->primary_name."</td><td>".$row->alternative_name."</td><td>".$row->name."</td><td>".$row->email."</td><td>".$row->mobile."</td><td>".$row->gender."</td><td>".$row->age."</td><td>".$row->remarks."</td></tr>";
                }
                echo "</tbody>";
            } else {
                echo "There is no participants.";
            }
            ?>
        </table>

        <script type="text/javascript" charset="utf8" src="/scripts/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/scripts/jquery.dataTables.min.js"></script>
        <script>
            $(function(){
                $("#participants").dataTable();
            })
        </script>

</body>
</html>
