<!DOCTYPE html>
<head>
<script>
setTimeout(function(){
   window.location.replace("http://roctrial.sportsontheweb.net/?page_id=26");
}, 5000);
</script>
</head>



<body>
        <div class="page-wrapper">
	<div class="page-content">
        <?php
		
                global $wpdb;
                
                //echo current_time('mysql', 1);
                
                $wpdb->query( $wpdb->prepare( 
                        "
                                INSERT INTO $wpdb->schools
                                ( organization_type, primary_name, alternative_names, address, contact_numbers, email, fax_numbers, website, contact_persons, title, remarks, contact_persons )
                                VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s )
                        ", 
                        'school', 
                                $_POST["primary_name"], 
                                $_POST["alternative_names"],
                                $_POST["address"],
                                $_POST["contact_numbers"],
                                $_POST["email"],
                                $_POST["fax_numbers"],
                                $_POST["website"],
                                $_POST["contact_persons"],
                                $_POST["title"],
                                'UNPITCHED',
                                $_POST["remarks"],
                                $_POST["contact_persons"]
                ) );
                
                echo "<h2>Record inserted successfully</h2>";


	?> 
<footer class="entry-meta"></footer>