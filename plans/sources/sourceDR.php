<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }

if($_POST['sources'] == "Direct Reports") {
    
    $_SESSION['drPlan'] = $drPlanCreate;  
   
    header("Location: createPlan.php");
    exit;
}

?>