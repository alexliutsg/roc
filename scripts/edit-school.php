	<?php
        
        global $wpdb, $school_id, $address, $contact_number, $email, $fax_number, $website, $contact_person, $title, $remarks, $pitching_cycle, $pitching_status ;
        
        if (isset($_POST["goform"]))
        {
                $school_id = $_POST["school_id"];
                
				$school_details = $wpdb->get_results( 'SELECT `id`,`primary_name`, `alternative_name`, `address`, `contact_number`, `email`, `fax_number`, `website`, `contact_person`, `title`, `remarks`, `pitching_cycle`, `pitching_status` FROM `schools` WHERE `id`='.$school_id, OBJECT );
                
				$primary_name = $wpdb->get_var( "SELECT `primary_name` FROM `schools` WHERE id=$school_id");
                $alternative_name = $wpdb->get_var( "SELECT `alternative_name` FROM `schools` WHERE id=$school_id");
                $address = $wpdb->get_var( "SELECT `address` FROM `schools` WHERE id=$school_id");
                $contact_number = $wpdb->get_var( "SELECT `contact_number` FROM `schools` WHERE id=$school_id");
                $email = $wpdb->get_var( "SELECT `email` FROM `schools` WHERE id=$school_id");
                $fax_number = $wpdb->get_var( "SELECT `fax_number` FROM `schools` WHERE id=$school_id");
                $website = $wpdb->get_var( "SELECT `website` FROM `schools` WHERE id=$school_id");
                $contact_person = $wpdb->get_var( "SELECT `contact_person` FROM `schools` WHERE id=$school_id");
                $title = $wpdb->get_var( "SELECT `title` FROM `schools` WHERE id=$school_id");
                $remarks = $wpdb->get_var( "SELECT `remarks` FROM `schools` WHERE id=$school_id");
                $pitching_cycle = $wpdb->get_var( "SELECT `pitching_cycle` FROM `schools` WHERE id=$school_id");
                $pitching_status = $wpdb->get_var( "SELECT `pitching_status` FROM `schools` WHERE id=$school_id");
                
				
				?>
                
                
                <form action="" method="POST">
                        <input type="hidden" name="goform" value="true">
                        <input type="hidden" name="school_id" value="<?php echo $school_id ?>">
						
						<fieldset>
						<legend>Pitching Radar - Edit School</legend>
						<p>School Name (English): </p>
						<input name="primary_name" type="text" disabled value="<?php echo $primary_name; ?>"/>
						<p>School Name (Chinese): </p>
						<input name="alternative_name" type="text" disabled value="<?php echo $alternative_name; ?>"/>
						<p>Address: </p>
						<input name="address" type="text" value="<?php echo $address; ?>"/>
						<p>Email: </p>
						<input name="email" type="text" value="<?php echo $email; ?>"/>
						<p>Phone: </p>
						<input name="contact_number" type="text" value="<?php echo $contact_number; ?>"/>
						<p>Fax: </p>
						<input name="fax" type="text" value="<?php echo $fax_number; ?>"/>
						<p>Website: </p>
						<input name="website" type="text" value="<?php echo $website; ?>"/>
						<p>Contact Person: </p>
						<input name="contact_person" type="text" value="<?php echo $contact_person; ?>"/>
						<p>Title of Contact Person: </p>
						<input name="title" type="text" value="<?php echo $title; ?>"/>
						<p>Remarks: </p>
						<input name="remarks" type="text" value="<?php echo $remarks; ?>"/>
						<p>Pitching cycle: </p>
						<input name="pitching_cycle" type="text" value="<?php echo $pitching_cycle; ?>"/>
						<p>Pitching status: </p>
						<select name="pitching_status">
						<option <?php if($pitching_status == 'pitched') echo"selected"; ?> value="pitched">Pitched</option>
						<option <?php if($pitching_status == 'unpitched') echo"selected"; ?> value="unpitched">Unpitched</option>
						<option <?php if($pitching_status == 'success') echo"selected"; ?> value="success">Pitching successfully</option>
						<option <?php if($pitching_status == 'unsuccess') echo"selected"; ?> value="unsuccess">Pitching unsuccessfully</option>
						</select>
						</fieldset>

                        
                        <input type="submit" name="selectlesson" value="Edit Details" />
                        
                        
                <?php
					$primary_name = $_POST["primary_name"];
					$alternative_name = $_POST["alternative_name"];
					$address = $_POST["address"];
					$email = $_POST["email"];
					$contact_number = $_POST["contact_number"];
					$fax = $_POST["fax"];
					$website = $_POST["website"];
					$contact_person = $_POST["contact_person"];
					$title = $_POST["title"];
					$remarks = $_POST["remarks"];
					$pitching_cycle = $_POST["pitching_cycle"];
					$pitching_status = $_POST["pitching_status"];
					
					
				?>
					<?php

					if (isset($_POST["selectlesson"])) {
					
					
					global $wpdb;
					$wpdb->query($wpdb->prepare(
					 "
					UPDATE schools 
					set address=%s,
						contact_number=%s,
						email=%s,
						fax_number=%s,
						website=%s,
						contact_person=%s,
						title=%s,
						remarks=%s,
						pitching_cycle=%s,
						pitching_status=%s
					WHERE
						id=%d
					", 
					$address,
					$contact_number,
					$email,
					$fax,
					$website,
					$contact_person,
					$title,
					$remarks,
					$pitching_cycle,
					$pitching_status,
					$school_id
					));
					
					/*
					global $wpdb;
					$wpdb->query($wpdb->prepare(
					 "
					UPDATE school 
					set address=%s,
						contact_number=%s,
						email=%s,
						fax_number=%s,
						website=%s,
						contact_person=%s,
						title=%s,
						remarks=%s,
						pitching_cycle=%s,
						pitching_status=%s
					WHERE
						id=%d
					", 
					$_POST["address"],
					$_POST["contact_number"],  
					$_POST["email"],
					$_POST["fax"], 
					$_POST["website"],
					$_POST["contact_person"],
					$_POST["title"], 
					$_POST["remarks"], 
					$_POST["pitching_cycle"], 
					$_POST["pitching_status"],
					$school_id
					));
					*/

					/*
					$wpdb->query($wpdb->prepare(
					"INSERT INTO schools
					( id, organization_type, primary_name, alternative_name, address, contact_number, email, fax_number, website, contact_person, title, remarks )
					VALUES ( %d, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
					$school_id,
					'school',
					$_POST["primary_name"],
					$_POST["alternative_name"],
					$_POST["address"],
					$_POST["contact_number"],
					$_POST["email"],
					$_POST["fax_number"],
					$_POST["website"],
					$_POST["contact_person"],
					$_POST["title"],
					$_POST["remarks"]
					));
					*/
					
					echo "<h2>Record inserted successfully</h2>";
					}

					}
					?>
                
     