<?php
/* 
 * ICS325 - Final Project
 * Final Project
 * Group: D for Dolphins
 * File: changePassword.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This will allow the user to change their password
 *   
 * */

 require("../include_files/header.php");
 require("../controllers/db2.php");
  
 if(!isset($_SESSION)) {
     
     session_start();
     
 }
  
 
 if(!isset($_SESSION['uname'])) {
     
     header("Location: login.php");
     
 }


?>

</body>

</html>