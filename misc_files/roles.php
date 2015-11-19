<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	require("../controllers/database.php");
	
	$username= $_SESSION['uname']; 
?>

	<h3> Direct Reports </h3>
<?php
	$rolesQuery = "SELECT *  FROM employees WHERE manager_email = '" . $username . "'";
    $result = mysqli_query($dbc, $rolesQuery);
    
	while ($row = mysqli_fetch_row($result)){
	echo $row[1]."</br>";  
	}
?>
	<h3> Peers </h3> 
<?php
	$mangQuery = "SELECT role FROM employees WHERE email = '".$username."'"; 
	$result = mysqli_query($dbc, $mangQuery); 
	$row = mysqli_fetch_row($result); 
	$role = $row[0]; 
	mysqli_free_result($result);
	
	$peerQuery = "SELECT * FROM employees WHERE role = '".$role."'";
    $result = mysqli_query($dbc, $peerQuery);
    
	while ($row = mysqli_fetch_row($result)){
	echo $row[1]."</br>";  
	}	
	
?>