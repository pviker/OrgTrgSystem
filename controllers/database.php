<?php
    
/* UNCOMMENT FOR LOCAL DB CREDENTIALS */
	$dbUser = "user1";			
	$dbPass = "abc123";				
	$db = "orgtrn";			

/* UNCOMMENT FOR SERVER DB CREDENTIALS */
	// $dbUser = "ics325fa1528";		
	// $dbPass = "983278";				
	// $db = "ics325fa1528";			
	
    //Database connection
    @ $dbc = mysqli_connect('localhost', $dbUser, $dbPass, $db);
    
    if(mysqli_connect_errno() ) {
                echo "Error: could not connect to database. Please try again later.";
                exit;
	}
?>
  