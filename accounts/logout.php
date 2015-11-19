<?php 
	session_start();    
/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: login.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This will be the login page for user login and to view all users.
 *   
 * */
 
	session_unset();
	session_destroy();
 
	session_start();
 
	$_SESSION['logoutMessage'] = "You have succesfully logged out.";
    
    header("Location: ../index.php");

?>
