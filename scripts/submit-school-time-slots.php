<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html lang="en-US">
<!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>1. Update School Information | Force For Good</title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="http://roctrial.sportsontheweb.net/xmlrpc.php">
	<!--[if lt IE 9]>
	<script src="http://roctrial.sportsontheweb.net/wp-content/themes/twentythirteen/js/html5.js"></script>
	<![endif]-->
	<link rel="alternate" type="application/rss+xml" title="Force For Good &raquo; Feed" href="http://roctrial.sportsontheweb.net/?feed=rss2" />
<link rel="alternate" type="application/rss+xml" title="Force For Good &raquo; Comments Feed" href="http://roctrial.sportsontheweb.net/?feed=comments-rss2" />
<link rel="alternate" type="application/rss+xml" title="Force For Good &raquo; 1. Update School Information Comments Feed" href="http://roctrial.sportsontheweb.net/?feed=rss2&#038;page_id=53" />
<link rel='stylesheet' id='frm-forms-css'  href='http://roctrial.sportsontheweb.net/wp-content/plugins/formidable/css/frm_display.css?ver=1.07.11' type='text/css' media='all' />
<link rel='stylesheet' id='open-sans-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.1.1' type='text/css' media='all' />
<link rel='stylesheet' id='dashicons-css'  href='http://roctrial.sportsontheweb.net/wp-includes/css/dashicons.min.css?ver=4.1.1' type='text/css' media='all' />
<link rel='stylesheet' id='admin-bar-css'  href='http://roctrial.sportsontheweb.net/wp-includes/css/admin-bar.min.css?ver=4.1.1' type='text/css' media='all' />
<link rel='stylesheet' id='frm_fonts-css'  href='http://roctrial.sportsontheweb.net/wp-content/plugins/formidable/css/frm_fonts.css?ver=1.07.11' type='text/css' media='all' />
<link rel='stylesheet' id='twentythirteen-fonts-css'  href='//fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C400%2C700%2C300italic%2C400italic%2C700italic%7CBitter%3A400%2C700&#038;subset=latin%2Clatin-ext' type='text/css' media='all' />
<link rel='stylesheet' id='genericons-css'  href='http://roctrial.sportsontheweb.net/wp-content/themes/twentythirteen/genericons/genericons.css?ver=3.03' type='text/css' media='all' />
<link rel='stylesheet' id='twentythirteen-style-css'  href='http://roctrial.sportsontheweb.net/wp-content/themes/twentythirteen/style.css?ver=2013-07-18' type='text/css' media='all' />
<!--[if lt IE 9]>
<link rel='stylesheet' id='twentythirteen-ie-css'  href='http://roctrial.sportsontheweb.net/wp-content/themes/twentythirteen/css/ie.css?ver=2013-07-18' type='text/css' media='all' />
<![endif]-->
<script type='text/javascript' src='http://roctrial.sportsontheweb.net/wp-includes/js/jquery/jquery.js?ver=1.11.1'></script>
<script type='text/javascript' src='http://roctrial.sportsontheweb.net/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://roctrial.sportsontheweb.net/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://roctrial.sportsontheweb.net/wp-includes/wlwmanifest.xml" /> 
<meta name="generator" content="WordPress 4.1.1" />
<link rel='canonical' href='http://roctrial.sportsontheweb.net/?page_id=53' />
<link rel='shortlink' href='http://roctrial.sportsontheweb.net/?p=53' />
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
	<style type="text/css" id="twentythirteen-header-css">
			.site-header {
			background: url(http://roctrial.sportsontheweb.net/wp-content/themes/twentythirteen/images/headers/circle.png) no-repeat scroll top;
			background-size: 1600px auto;
		}
		@media (max-width: 767px) {
			.site-header {
				background-size: 768px auto;
			}
		}
		@media (max-width: 359px) {
			.site-header {
				background-size: 360px auto;
			}
		}
		</style>
	<style type="text/css" media="print">#wpadminbar { display:none; }</style>
<style type="text/css" media="screen">
	html { margin-top: 32px !important; }
	* html body { margin-top: 32px !important; }
	@media screen and ( max-width: 782px ) {
		html { margin-top: 46px !important; }
		* html body { margin-top: 46px !important; }
	}
</style>
<script>
setTimeout(function(){
   window.location.replace("http://roctrial.sportsontheweb.net/?page_id=57");
}, 500);
</script>
</head>



<body>
        <div class="page-wrapper">
	<div class="page-content">
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
		//echo "Connected successfully";	
		
		$sql = "INSERT INTO `1823734_1023`.`school_time_slots` (`school_id`,`date`,`start_time`,`end_time`,`remarks`) VALUES (1,'".$_POST["date"]."','".$_POST["start_time"]."','".$_POST["end_time"]."','".$_POST["remarks"]."')";

		if ($conn->query($sql) === TRUE) {
			echo "<h2>Record inserted successfully</h2>";
		} else {
			echo "<h2>Error inserting record: <h2>" . $conn->error;
		}
		$conn->close();

	?> 
<footer class="entry-meta"></footer>