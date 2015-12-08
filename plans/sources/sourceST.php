<?php
    
    foreach (glob("sources/viewSources/*.php") as $filename)
{
    require $filename;
}
    
    if($_POST['sources'] == "Supervisor Template") {
        
        $_SESSION['supervisorPlan'] = $supervisorPlan;
        
    }
    
    header("Location: ../plans/createPlan.php");
    exit;
    
?>