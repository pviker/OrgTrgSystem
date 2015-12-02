<?php

	session_start();
	
	if(isset($_POST['updateYear'])) {
		$_SESSION['currentYear'] = $_POST['year'];
		$_SESSION['message'] = "Current working year updated successfully!";
		header("Location: ../plans/changeYear.php");
	}

?>