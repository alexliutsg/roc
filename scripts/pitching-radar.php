<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/scripts/jquery.dataTables.css">
</head>
<body>

        <?php
		global $wpdb;
                
		$school = $wpdb->get_results( 'SELECT pitching_cycle, primary_name, alternative_name, title, contact_person, contact_number, email, pitching_status, remarks from schools order by pitching_cycle', OBJECT);

        ?>

        <table id="school" class="display" cellspacing="0" width="100%">
            <?php
            if (count($school) > 0) {
                echo "<thead><tr><th>Pitching Cycle</th><th>Primary Name</th><th>Alternative Name</th><th>Title</th><th>Contact Person</th><th>Contact Number</th><th>Email</th><th>Pitching Status</th><th>Remarks</th></tr></thead>";
                echo "<tbody>";
                foreach ( $school as $row )
                {
                    echo "<tr><td>".$row->pitching_cycle."</td><td>".$row->primary_name."</td><td>".$row->alternative_name."</td><td>".$row->title."</td><td>".$row->contact_person."</td><td>".$row->contact_number."</td><td>".$row->email."</td><td>".$row->pitching_status."</td><td>".$row->remarks."</td></tr>";
                }
                echo "</tbody>";
            } else {
                echo "There is no pitching result.";
            }
            ?>
        </table>

        <script type="text/javascript" charset="utf8" src="/scripts/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/scripts/jquery.dataTables.min.js"></script>
        <script>
            $(function(){
                $("#school").dataTable();
            })
        </script>
</body>
</html>

