<?php

	if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    
    require("db2.php");
    
	if(isset($_POST['updateYear'])) {
		$_SESSION['currentYear'] = $_POST['year'];
		$_SESSION['message'] = "Current working year updated to <strong>" . $_SESSION['currentYear'] . "</strong>!";
        
    }
    
    foreach (glob("../includes/viewPlans/*.php") as $filename){
        require $filename;
    }
    
        if($_SESSION['role'] == "CEO") {
            
            $_SESSION['pyPlan'] = $selfPlan;
            
        } else if($_SESSION['role'] == "Manager") {
            
            $_SESSION['pyPlan'] = $selfPlan;
            
        } else if($_SESSION['role'] == "Team Lead") {
            
            $_SESSION['pyPlan'] = $selfPlan;
            
        } else if($_SESSION['role'] == "Employee") {
            
            $_SESSION['pyPlan'] = $selfPlan;
            
        }
        
		header("Location: ../plans/createPlan.php");
	

?>