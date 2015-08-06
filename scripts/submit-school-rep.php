    <?php
        global $wpdb;


        if (isset($_POST["school-onbehalf"]))
        {
                $school_ID=$_POST["school-onbehalf"];
                
                echo "<h3>Update school information</h3>";
                
                $school = $wpdb->get_row( 'SELECT contact_person,title,email,contact_number,fax_number FROM `schools` WHERE `id`='.$school_ID);

        ?>
        
                <form action="" method="POST" accept-charset="UTF-8">
                        <input type="hidden" name="school_id" value="<?php echo $school_ID ?>">
                        <fieldset>
                                <legend>School Representative Information</legend>
                                Name:
                                <input name="name" type="text" value="<?php echo $school->contact_person ?>" />
                                Title:
                                <input name="title" type="text" value="<?php echo $school->title ?>" />
                                Email:
                                <input name="email" type="email" value="<?php echo $school->email ?>" />
                                Phone:
                                <input name="phone" type="text" value="<?php echo $school->contact_number ?>" />
                                Fax number:
                                <input name="fax" type="text" value="<?php echo $school->fax_number ?>" />
                        </fieldset>

                        <input type="submit" name="submitschoolrep" value="Update" />

                </form>
  
        <?php
        }
        ?>


<?php


        if (isset($_POST["submitschoolrep"]))
        {
 
                $wpdb->query( $wpdb->prepare( 
                        "
                        UPDATE schools SET
                        contact_person=%s, 
                        title=%s,
                        email=%s,
                        contact_number=%s,
                        fax_number=%s
                        WHERE
                        id=%d
                        ", 
                        $_POST["name"],
                        $_POST["title"],
                        $_POST["email"],
                        $_POST["phone"], 
                        $_POST["fax"],
                        $_POST["school_id"]
                        ) );
                      
                echo "<h2>Record updated successfully</h2>";

        }
        
?>

