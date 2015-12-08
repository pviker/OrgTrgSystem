<?php

if($_POST['sources'] == "Peers") {
    
    $peersPlanQuery = "select plan from employees, plans where employees.id=plans.id and organization_name='" . $_SESSION['orgName'] . "' 
    and role='" . $_SESSION['role'] . "' and plans.shared='1' 
    and pyear='" . $_SESSION['currentYear'] . "' and plans.id !='" . $_SESSION['userID'] . "'";
    
    $peersPlanResult = mysqli_query($connection, $peersPlanQuery);
    
    $_SESSION['peersPlan'] = "";
    
    while($peersPlanRow = mysqli_fetch_assoc($peersPlanResult)) {
        
        $_SESSION['peersPlan'] .= $peersPlanRow['plan'] . "\n\n";
        
    }
    
}
   
   
?>