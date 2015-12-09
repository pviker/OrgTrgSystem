<?php

if($_SESSION['role'] == "Employee") {
        
       $planQuery = "select plan from plans where id='" . $_SESSION['userID'] . "' 
       and pYear='" . $_SESSION['currentYear'] . "'";
    
       $planResult = mysqli_query($connection, $planQuery);
    
       $planRow = mysqli_fetch_assoc($planResult);
    
       $selfPlan = $planRow['plan'];
    
       if(strtoupper($selfPlan) == "NULL") {
        
        header("Location: ../plans/createPlan.php");
        exit;
       }
    
    }

?>