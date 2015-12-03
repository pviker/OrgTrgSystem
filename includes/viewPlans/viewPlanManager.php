<?php

if($_SESSION['role'] == "Manager") {
                
       $selfPlanQuery = "select plan from plans where id='" . $_SESSION['userID'] . 
       "' and pyear='" . $_SESSION['currentYear'] . "'";
    
       $selfPlanResult = mysqli_query($connection, $selfPlanQuery);
    
       $selfPlanRow = mysqli_fetch_assoc($selfPlanResult);
    
       $selfPlan = $selfPlanRow['plan'];
        
       $drQuery = "select id from employees where organization_name ='" . $_SESSION['orgName'] . "' and role = 'Team Lead'";
       
       $drResult = mysqli_query($connection, $drQuery);
       
       $drPlan = "";
       
       while($drRow = mysqli_fetch_assoc($drResult)) {
                   
             $drPlanQuery = "select plan from plans where id = '" . $drRow['id'] . 
             "' and pyear='" . $_SESSION['currentYear'] . "'";
           
             $drPlanResult = mysqli_query($connection, $drPlanQuery);
             
             $drPlanRow = mysqli_fetch_assoc($drPlanResult);
             
             $drPlan .= $drPlanRow['plan'] . "\n\n";
           
       }
       
     }
     
?>