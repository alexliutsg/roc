<?php
require_once( dirname( __FILE__ ) . '/../wp-blog-header.php' );
//require_once "../wp-includes/user.php";

$email_address = $_POST["email"];
$user_name = $_POST["username"];
$pass = $_POST["password"];


if( null == username_exists( $user_name ) ) {

  // Generate the password and create the user
  $password = wp_generate_password( 12, false );
  $user_id = wp_create_user( $email_address, $password, $email_address );

  // Set the nickname
  wp_update_user(
    array(
      'ID'          =>    $user_id,
      'nickname'    =>    $email_address
    )
  );

  // Set the role
  $user = new WP_User( $user_id );
  $user->set_role( 'School Rep' );

  // Email the user
  wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $password );


      $servername = "fdb4.agilityhoster.com";
      $site_username = "1823734_1023";
      $site_password = "ForceForG00d!";

		// Create connection
		$conn = new mysqli($servername, $site_username, $site_password);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		//echo "Connected successfully";	

		//Get School Id from dropdpwn and insert it into school_rep_mmp
		
		$sql = "INSERT INTO `1823734_1023`.`school_rep_mmp` VALUES (default,$user_id,'$_POST[username]','$_POST[firstname]','$_POST[lastname]',$_POST[school_id])";
		//$result=$conn->query($sql);

		if ($conn->query($sql) === TRUE) {
			echo "<h2>Record updated successfully</h2>";
		} else {
			echo "<h2>Error updating record: <h2>" . $conn->error;
		}
		//$conn->close();
 
		//Insert User Id, School Id into user_school
        $sqlus = "INSERT INTO `1823734_1023`.`user_school` (`user_id`, `school_id`) VALUES ($user_id, $_POST[school_id])";
		
		//$result1 = $conn1->query($sql1);

		if ($conn->query($sqlus) === TRUE) {
			echo "<h2>Record updated successfully</h2>";
		} else {
			echo "<h2>Error updating record: <h2>" . $conn->error;
		}
		$conn->close();



} 

else
{
	echo "<h2>Email ID has already been used by another user</h2>";
}
