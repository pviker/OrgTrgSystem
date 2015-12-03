<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }

if($_POST['sources'] == "Direct Reports") {
    
    if($_SESSION['role'] == "CEO") {
    
    $_SESSION['drPlan'] = $drPlanCreate;
    
   } else if($_SESSION['role'] == "Manager") {
       
    $_SESSION['drPlan'] = $drPlanCreate;
    
   } else if($_SESSION['role'] == "Team Lead") {
       
    $_SESSION['drPlan'] = $drPlanCreate;   
       
   }
   
   header("Location: createPlan.php");
   exit;
}

?>