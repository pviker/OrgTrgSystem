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
	} else {
    
	    $adminQuery = "select count(*) from credentials where username = '" . $username . "' and 
	    password = sha1('" . $password . "') and admin = '1'";
	    
	    $result = mysqli_query($connection, $adminQuery);
          
   		if(!$result) {
        
	        $_SESSION["message"] = "ERROR: Cannot run query.";
			header("Location: ../index.php");
	        exit; 
    	}
    
    $row = mysqli_fetch_row($result);
    $count = $row[0];
    
    if($count > 0) {
        
        $_SESSION['uname'] = $username;
        $_SESSION['confirmMessage'] = "Welcome " . $_SESSION['uname'];
        $_SESSION['adminFlag'] = 1;
        
        header("Location: admin.php");
		
    } else {
    
	    $query = "select count(*) from credentials where username = '" . $username . "' and 
	    password = sha1('" . $password . "')";
	    
	    $result = mysqli_query($connection, $query);
    
    if(!$result) {
        
        $_SESSION["message"] = "ERROR: Cannot run query.";
		header("Location: ../index.php");
        exit;
  
    }
    
    $row = mysqli_fetch_row($result);
    $count = $row[0];
    
    if($count > 0) {
        
        $_SESSION['uname'] = $username;        
        $_SESSION['confirmMessage'] = "Welcome " . $_SESSION['uname'];
        $_SESSION['adminFlag'] = 0;
        
        header("Location: ../plans/viewPlan.php");
        
    }	else {
      	
		$_SESSION["message"] = "Your username or password are not correct. Please try again.";
		header("Location: ../index.php");
        exit;
       
        }
    }
}
?>