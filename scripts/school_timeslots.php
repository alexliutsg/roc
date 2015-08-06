<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/scripts/jquery.dataTables.css">
</head>
<body>

        <?php
		global $wpdb;
                //$columns = $wpdb->get_results( 'SHOW COLUMNS FROM schools ', OBJECT );
		$school_timeslot = $wpdb->get_results( '
            select schools.primary_name, schools.alternative_name, name, participants.email, participants.mobile, participants.gender, participants.age, participants.remarks
            from participants
            inner join schools on schools.id = participants.school_id',
            OBJECT);
        ?>

        <table id="school_time_slots" class="display" cellspacing="0" width="100%">
            <?php
            if (count($school_timeslot) > 0) {
                echo "<thead><tr><th>School Primary Name</th><th>Alternative Name</th><th>Date</th><th>Start Time</th><th>End Time</th></tr></thead>";
                echo "<tbody>";
                foreach ( $school_timeslot as $row )
                {
                    echo "<tr><td>".$row->primary_name."</td><td>".$row->alternative_name."</td><td>".$row->date."</td><td>".$row->start_time."</td><td>".$row->end_time."</td></tr>";
                }
                echo "</tbody>";
            } else {
                echo "There is no school time slot.";
            }
            ?>
        </table>

        <script type="text/javascript" charset="utf8" src="/scripts/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/scripts/jquery.dataTables.min.js"></script>
        <script>
            $(function(){
                $("#school_time_slots").dataTable();
            })
        </script>
</body>
</html>
