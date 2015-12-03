<?php

if($_SESSION['role'] == "Employee") {
        
       $planQuery = "select plan from plans where id='" . $_SESSION['userID'] . "' 
       and pyear='" . $_SESSION['currentYear'] . "'";
    
       $planResult = mysqli_query($connection, $planQuery);
    
       $planRow = mysqli_fetch_assoc($planResult);
    
       $plan = $planRow['plan'];
    
       if(strtoupper($plan) == "NULL") {
        
        header("Location: createPlan.php");
        exit;
       }
    
    }

?>