<?php

	session_start();
	
	if(isset($_POST['updateYear'])) {
		$_SESSION['currentYear'] = $_POST['year'];
		$_SESSION['message'] = "Current working year updated to <strong>" . $_SESSION['currentYear'] . "</strong>!";
		header("Location: ../plans/createPlan.php");
	}

?>