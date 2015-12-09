<?php 

    //session_start();
    
	//require("../controllers/db2.php");
	
	if(!isset($_SESSION['uname'])){
		header("Location: admin.php");
	}
	
	$userID = $_SESSION['userID'];
	$pYear = "2015";
	
	$query = "select * from plans where id=" . $userID . " and pYear='2015'";
	
   	$result = mysqli_query($connection, $query);

   	$row = mysqli_fetch_assoc($result);

  	$plan = $row['plan'];
  	$pYear = $row['pYear'];
  	$insertUpdate = "insert";
  	
  	var_dump($row);
	
		if($plan != "" || $plan != null){
			$insertUpdate = "update";
		}
	
          
?>