<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/scripts/jquery.dataTables.css">
</head>
<body>

        <?php
		global $wpdb;
                //$columns = $wpdb->get_results( 'SHOW COLUMNS FROM schools ', OBJECT );
		$school = $wpdb->get_results( "
		select schools.id as school_id, schools.primary_name as school_name, course_id, courses.course_code,
lesson_id, student_id, participants.name as student_name, IF(attended=1,'Yes','No') attended from attendance
inner join courses on course_id = courses.id
inner join schools on courses.school_id = schools.id
inner join participants on student_id = participants.id",OBJECT);

        ?>

        <table id="attendance" class="display" cellspacing="0" width="100%">
            <?php
            if (count($school) > 0) {
                echo "<thead><tr><th>School ID</th><th>School Name</th><th>Course ID</th><th>Course Code</th><th>Lesson ID</th><th>Student ID</th><th>Student Name</th><th>Attended?</th></tr></thead>";
                echo "<tbody>";
                foreach ( $school as $row )
                {
                    echo "<tr><td>".$row->school_id."</td><td>".$row->school_name."</td><td>".$row->course_id."</td><td>".$row->course_code."</td><td>".$row->lesson_id."</td><td>".$row->student_id."</td><td>".$row->student_name."</td><td>".$row->attended."</td></tr>";
                }
                echo "</tbody>";
            } else {
                echo "There is no attendance record.";
            }
            ?>
        </table>

        <script type="text/javascript" charset="utf8" src="/scripts/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" charset="utf8" src="/scripts/jquery.dataTables.min.js"></script>
        <script>
            $(function(){
                $("#attendance").dataTable();
            })
        </script>
</body>
</html>
