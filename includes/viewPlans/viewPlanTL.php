<?php

if($_SESSION['role'] == "Team Lead") {
                
       $selfPlanQuery = "select plan from plans where id='" . $_SESSION['userID'] . 
       "' and pYear='" . $_SESSION['currentYear'] . "'";
    
       $selfPlanResult = mysqli_query($connection, $selfPlanQuery);
    
       $selfPlanRow = mysqli_fetch_assoc($selfPlanResult);
    
       $selfPlan = $selfPlanRow['plan'];
       
       if(strtoupper($selfPlan) == "NULL") {
        
        header("Location: ../plans/createPlan.php");
        exit;
       }
        
       $drQuery = "select id from employees where organization_name ='" . $_SESSION['orgName'] . "' and role = 'Employee'";
       
       $drResult = mysqli_query($connection, $drQuery);
       
       $drPlanView = "";
       $drPlanCreate = "";
       
       while($drRow = mysqli_fetch_assoc($drResult)) {
                   
             $drPlanQuery = "select plan from plans where id = '" . $drRow['id'] . 
             "' and pYear='" . $_SESSION['currentYear'] . "'";
           
             $drPlanResult = mysqli_query($connection, $drPlanQuery);
             
             $drPlanRow = mysqli_fetch_assoc($drPlanResult);
             
             $drPlanView .= $drPlanRow['plan'] . "<br>";
             
             $drPlanCreate .= $drPlanRow['plan'] . "\n\n";
           
       }
       
     }
     
?>