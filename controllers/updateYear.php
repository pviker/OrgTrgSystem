<?php

	if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    
    require("db2.php");
    
	if(isset($_POST['updateYear'])) {
		$_SESSION['currentYear'] = $_POST['year'];
		//$_SESSION['message'] = "Current working year updated to <strong>" . $_SESSION['currentYear'] . "</strong>!";
        
    }
	
	if(isset($_GET['ref'])){
		if($_GET['ref'] == "reports"){
			header("Location: ../accounts/reports.php");
			exit;
		}
	}
    
    foreach (glob("../includes/viewPlans/*.php") as $filename){
        require $filename;
    }
    
        $_SESSION['pyPlan'] = $selfPlan;
        
		header("Location: ../plans/createPlan.php");
		exit;
	

?>