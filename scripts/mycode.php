 <?php
$servername = "fdb4.agilityhoster.com";
$username = "1823734_1023";
$password = "ForceForG00d!";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$user_ID = get_current_user_id();
echo "User id is ".$user_ID;		
?> 
