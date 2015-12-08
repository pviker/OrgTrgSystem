<?php

    $initialYear = date("Y");
    
    $currentPlanQuery = "select plan from plans where id='" . $_SESSION['userID'] . "' and pyear='" . $initialYear . "'";
    
    $currentPlanResult = mysqli_query($connection, $currentPlanQuery);
    
    $currentPlanRow = mysqli_fetch_assoc($currentPlanResult);
    
    $_SESSION['currentPlan'] = $currentPlanRow['plan'];

?>