<?php
/* 
 * ICS325 - Final Project
 * Final Project
 * Group: D for Dolphins
 * File: changePassword.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This script changes the user password
 *   
 * */

	require("../includes/header.php");
	require("../controllers/db2.php");
	require("../includes/functions/passwordValidate.php");
	  
	if(!isset($_SESSION)) {
		session_start();
	}
   
	$id = "";
	if(!isset($_POST['employeeID'])){
		header("Location: admin.php");
	} else if(isset($_SESSION['employeeID'])) {
		$id = $_SESSION['employeeID'];
	} else {
		$id = $_POST['employeeID'];
		$_SESSION['employeeID'] = $id;
	}
 
	if(!isset($_SESSION['uname'])) {
		header("Location: login.php");
	}
	 
	if(isset($_POST['Send'])) {       
		$oldPassword = $_POST['oldPassword'];
		$newPassword = $_POST['newPassword'];
		$confirmPassword = $_POST['confirmPassword'];    
	}

    passwordValidate($newPassword);
     
    $passQuery = "select password from credentials where id='" . $id . "'";
    $passResult = mysqli_query($connection, $passQuery);
    $passRow = mysqli_fetch_assoc($passResult);
     
    $dbPassword = $passRow['password'];
     
    if($dbPassword === sha1($oldPassword)) {
    	if($newPassword === $confirmPassword) {
        	$passUpdate = "update credentials set password = sha1('" . $newPassword . "')
           						where id = '" . $id . "'";
           
            mysqli_query($connection, $passUpdate);
            
            $_SESSION['message'] = "You have successfully changed the password for employee <strong>" . $id ."</strong>.";
			unset($_SESSION['employeeID']);         
            header("Location: admin.php");
     
        } else {  
		    $_SESSION['passNotMatch'] = "Passwords do not match. Please try again.<br>";
		    header("Location: changePasswordForm.php");
		  }
      } else {
    		$_SESSION['passNotMatch'] = "Original password not correct. Please try again.<br>";
     		header("Location: changePasswordForm.php");
        }
?>