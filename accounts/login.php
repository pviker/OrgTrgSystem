<?php 	
/* 
 * ICS325 - Final Project
 * Final Project
 * Group: D for Dolphins
 * File: login.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This will be the login page for user login.
 *   
 * */
 
 
	require("../controllers/db2.php");
//	require("includes/header.php");
 
 
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	
	if(isset($_POST['Send'])) {   
		$username = $_POST['userName'];
		$password = $_POST['password'];
	}  
	
	if((!isset($username)) || (!isset($password))) {
		header("Location: ../index.php");
	} 
	
	// if admin
	else {
    
	    $adminQuery = "select count(*) from credentials2 where username = '" . $username . "' and 
	    password = sha1('" . $password . "') and admin = '1'";
	    
	    $result = mysqli_query($connection, $adminQuery);
        
        $userInfoQuery = "select organization_name, role from employees, credentials2 where employees.id=credentials2.id 
        and credentials2.username='" . $username . "'";
        
        $userInfoResult = mysqli_query($connection, $userInfoQuery);
          
   		if(!$result || !$userInfoResult) {
        
	        $_SESSION["message"] = "ERROR: Cannot run query.";
			header("Location: ../index.php");
	        exit; 
    	}
    	
	    $userRow = mysqli_fetch_assoc($userInfoResult);
	    
	    $_SESSION['orgName'] = $userRow['organization_name'];
	    $_SESSION['role'] = $userRow['role'];
	        
	    $row = mysqli_fetch_row($result);
	    $count = $row[0];
	    
	    if($count > 0) {
	    	
		    $idQuery = "select id from credentials2 where username = '".$username."'" ; 
		    $result = mysqli_query($connection, $idQuery);
		    $row = mysqli_fetch_assoc($result);
		    
		    $_SESSION['userID'] = $row['id'];
	        $_SESSION['uname'] = $username;
	        $_SESSION['confirmMessage'] = "Welcome " . $_SESSION['uname'];
	        $_SESSION['adminFlag'] = 1;
	        $_SESSION['currentYear'] = 2015;

	        header("Location: admin.php");
			
	    } 
	    
	    // not an admin
	    else {
	    
		    $query = "select count(*) from credentials2 where username = '" . $username . "' and 
		    password = sha1('" . $password . "')";
		    
		    $result = mysqli_query($connection, $query);
	        
	        $userInfoQuery = "select organization_name, role from employees, credentials2 where employees.id=credentials2.id 
	        and credentials2.username='" . $username . "'";
	        
	        $userInfoResult = mysqli_query($connection, $userInfoQuery);
	    
		    if(!$result || !$userInfoResult) {
		        
		            $_SESSION["message"] = "ERROR: Cannot run query.";
		            header("Location: ../index.php");
		            exit; 
		    }
	    
		    $userRow = mysqli_fetch_assoc($userInfoResult);
		    
		    $_SESSION['orgName'] = $userRow['organization_name'];
		    $_SESSION['role'] = $userRow['role'];
		    
		    $row = mysqli_fetch_row($result);
		    $count = $row[0];
		    
		    if($count > 0) {
		  
			    $idQuery = "select id from credentials2 where username = '".$username."'" ; 
			    $result = mysqli_query($connection, $idQuery);
			    $row = mysqli_fetch_assoc($result);
				
			    $_SESSION['userID'] = $row['id']; 
		        $_SESSION['uname'] = $username;        
		        $_SESSION['confirmMessage'] = "Welcome " . $_SESSION['uname'];
		        $_SESSION['adminFlag'] = 0;
		        $_SESSION['currentYear'] = 2015;
		        
		        header("Location: ../plans/viewPlan.php");
		        
		    }	else {
		      	
				$_SESSION["message"] = "Your username or password are not correct. Please try again.";
				header("Location: ../index.php");
		        exit;
		       
		        }
		    }
}
?>