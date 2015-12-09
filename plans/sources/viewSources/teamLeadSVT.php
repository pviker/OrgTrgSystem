<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }

if($_SESSION['role'] == "Team Lead") {
    
    $supervisorQuery = "select id from employees where organization_name='" . $_SESSION['orgName'] . "' 
    and role='Manager'";
    
    $supervisorResult = mysqli_query($connection, $supervisorQuery);
    
    $supervisorPlan = "";
    
    while($supervisorRow = mysqli_fetch_assoc($supervisorResult)) {
        
        $supervisorPlanQuery = "select plan from plans where id='" . $supervisorRow['id'] . "'
        and pYear='". $_SESSION['currentYear'] . "'";
        
        $supervisorPlanResult = mysqli_query($connection, $supervisorPlanQuery);
        
        $supervisorPlanRow = mysqli_fetch_assoc($supervisorPlanResult);
        
        $supervisorPlan .= $supervisorPlanRow['plan'] . "\n\n";
        
    }
    
    
}


?>