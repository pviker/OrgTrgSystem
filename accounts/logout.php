<?php 
/* 
 * ICS325 - Final Project
 * Group: D for Dolphins
 * File: logout.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Logout function
 *   
 * */
 
	session_unset();
	session_destroy();
 
	session_start();
 
	$_SESSION['logoutMessage'] = "You have succesfully logged out.";
    
    header("Location: login.php");

?>
