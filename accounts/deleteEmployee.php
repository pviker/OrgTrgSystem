<?php 

	/** 
	 * 
	 * Dropping employee from DB is working.
	 * 
	 * **/
	
	session_start();

	if(!isset($_SESSION["uname"])){
		header("Location: ../index.php");
	}
	
	if (isset($_SESSION["adminFlag"])){
		if($_SESSION["adminFlag"] != 1){
			header("Location: ../index.php");
		} 
// 		else if($_SESSION['adminFlag'] == 1){
// 			header("Location: admin.php");
// 			$_SESSION['message'] = "Error: Cannot delete administrator";
// 		}
	}
	
	if(!isset($_GET['id'])){
		header("Location: admin.php");
	} else $employeeID = $_GET['id'];
	
	require("../includes/topmenu.php");
	require("../controllers/db2.php");
	   
    $query1 = "delete from credentials2 where id = " . $employeeID;
    $query2 = "delete from plans where id = " . $employeeID;
	$query3 = "delete from employees where id = " . $employeeID;
    
    if(mysqli_query($connection, $query1)){
    	if(mysqli_query($connection, $query2)){
    		if(mysqli_query($connection, $query3)){
	    		$_SESSION['message'] = "Employee deleted successfully";
				header("Location: admin.php");
    		}
    	}
    } else {
    	$_SESSION['message'] = "Database error";
    	header("Location: admin.php");
    }
	
?>