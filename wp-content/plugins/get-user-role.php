<?php
/**
 * @package Get_User_Role
 * @version 0.1
 */
/*
Plugin Name: FFG Retrieve User Role
Plugin URI: empty
Description: This is a must-have plugin for Force For Good project
Author: Trevor Yuen
Version: 0.1
Author URI: empty
*/

if (basename($_SERVER['PHP_SELF']) == basename (__FILE__)) {
	die('Sorry, but you cannot access this page directly.');
}

// This just echoes the chosen line, we'll position it later
function get_user_role() {
        global $wp_roles;
        $current_user = wp_get_current_user();
        $roles = $current_user->roles;
        $role = array_shift($roles);
        return $role;
}

// Now we set that function up to execute when action is called
add_action( 'get_user_role', 'get_user_role' );


?>

