<?php

if($_SESSION['role'] == "CEO") {
                
       $selfPlanQuery = "select plan from plans where id='" . $_SESSION['userID'] . 
       "' and pyear='" . $_SESSION['currentYear'] . "'";
    
       $selfPlanResult = mysqli_query($connection, $selfPlanQuery);
    
       $selfPlanRow = mysqli_fetch_assoc($selfPlanResult);
    
       $selfPlan = $selfPlanRow['plan'];
        
       $drQuery = "select id from employees where role = 'Manager'";
       
       $drResult = mysqli_query($connection, $drQuery);
       
       $drPlanView = "";
       $drPlanCreate = "";
       
       while($drRow = mysqli_fetch_assoc($drResult)) {
                   
             $drPlanQuery = "select plan from plans where id = '" . $drRow['id'] . 
             "' and pyear='" . $_SESSION['currentYear'] . "'";
           
             $drPlanResult = mysqli_query($connection, $drPlanQuery);
             
             $drPlanRow = mysqli_fetch_assoc($drPlanResult);
             
             $drPlanView .= $drPlanRow['plan'] . "<br>";
             
             $drPlanCreate .= $drPlanRow['plan'] . "\n\n";
           
       }
       
     }
     
?>