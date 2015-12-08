<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }

if($_POST['sources'] == "Organizational Template") {
    
   $initialDate = date("Y"); 
    
   $orgTempQuery = "select plan from plans, employees where plans.id=employees.id and employees.role='admin' 
   and plans.pyear= '" . $initialDate . "'";
   
   $orgTempResult = mysqli_query($connection, $orgTempQuery);
   
   $orgTempRow = mysqli_fetch_assoc($orgTempResult);
   
   $_SESSION['orgTemplate'] = $orgTempRow['plan'];
   
   header("Location: createPlan.php");
   exit;
}

?>