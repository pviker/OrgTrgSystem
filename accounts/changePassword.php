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
   
 if(isset($_POST['employeeID'])){
 	$_SESSION['employeeID'] = $_POST['employeeID'];
	header("Location: adminChangePassword.php");
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
     
     $passQuery = "select password from credentials2 where username='" . $_SESSION['uname'] . "'";
     
     $passResult = mysqli_query($connection, $passQuery);
     
     $passRow = mysqli_fetch_assoc($passResult);
     
     $dbPassword = $passRow['password'];
     
     if($dbPassword === sha1($oldPassword)) {
 
        if($newPassword === $confirmPassword) {
     
           $passUpdate = "update credentials2 set password = sha1('" . $newPassword . "')
           where username = '" . $_SESSION['uname'] . "'";
           
           mysqli_query($connection, $passUpdate);
           
           $_SESSION['passConfirmMessage'] = "You have successfully changed your password.";
           
           header("Location: ../index.php");
     
        } else {
     
     $_SESSION['passNotMatch'] = "Passwords do not match. Please try again.<br>";
     header("Location: changePasswordForm.php");
     
        }
        
      }  else {
     
    $_SESSION['passNotMatch'] = "Passwords do not match. Please try again.<br>";
     header("Location: changePasswordForm.php");
     
        }


?>