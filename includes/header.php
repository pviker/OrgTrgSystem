<?php
// header for all pages
if (!isset($_SESSION)) session_start();

// checks if file system is on server and corrects root directory for absolute URL paths
	$server = $_SERVER['SERVER_NAME'];
	if (strpos($server,'metrostate.edu') == true) {
		$server = "/~ics325fa1528";
	} else $server = "";

?>

<!DOCTYPE html>

<html>
    
<head>
	
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href="<?php echo $server ?>/ics325/OrgTrgSystem/styles/main.css" rel="stylesheet">
	<link href="<?php echo $server ?>/ics325/OrgTrgSystem/styles/generated.css" rel="stylesheet">
	

	<script type="text/javascript" src="../js/confirmDelete.js"> </script>
	<script type="text/javascript" src="../js/fieldValidate.js"></script>
	
	<script src="<?php echo $server ?>/ics325/OrgTrgSystem/js/sweetalert-master/dist/sweetalert.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="<?php echo $server ?>/ics325/OrgTrgSystem/js/sweetalert-master/dist/sweetalert.css">
	
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/accordion.js"></script>
	
</head>

<body>