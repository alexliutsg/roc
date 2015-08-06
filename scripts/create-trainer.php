<!DOCTYPE html>
<html>
<body>
		<?php
		
		require_once( dirname( __FILE__ ) . '/../wp-blog-header.php' );
		require_once "../wp-includes/user.php";
		
		$email_address = $_POST["email"];
		$user_name = $_POST["username"];
		
		if( null == username_exists( $user_name ) ) {
		  
		  $password = wp_generate_password( 12, false );
		  $user_id = wp_create_user( $user_name, $password, $email_address );
		  
		  wp_update_user(
			array(
			  'ID'          =>    $user_id,
			  'nickname'    =>    $email_address
			)
		  );
		
		$user = new WP_User( $user_id );
		$user->set_role( 'trainer' );
		wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $password );
		
		
		global $wpdb;
		
		$wpdb->query( $wpdb->prepare
						( 
                        "
                                INSERT INTO trainer_user_id_list
                                ( id_user )
                                VALUES ( $user_id )
                        "		
                        ) 
					);
		}
		
		echo "<h2>Record inserted successfully</h2>";
        
		
		?>

</body>
</html>