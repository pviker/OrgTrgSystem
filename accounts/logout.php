<?php 
	session_start();
/* 
 * ICS325 - Final Project
 * Group: D for Dolphins
 * File: logout.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
<<<<<<< HEAD
 * Description: This will be the login page for user login and to view all users.
=======
 * Description: Logout function
>>>>>>> origin/master
 *   
 * */
 
	session_unset();
	session_destroy();
 
	session_start();
 
	$_SESSION['logoutMessage'] = "You have successfully logged out.";
    
    header("Location: login.php");

?>
