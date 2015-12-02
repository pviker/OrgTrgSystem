<?php 

	require("../includes/header.php");
	
	if(!isset($_SESSION["uname"])){
		header("Location: ../index.php");
	}
	
	if (isset($_SESSION["adminFlag"])){
		if($_SESSION["adminFlag"] != 1){
			header("Location: ../index.php");
		}
	}
	
	require("../includes/topmenu.php");
	
?>

	<div class="main-content-wrapper">
		
		<h1>Administration Page</h1>
		
		<div>
			<h3>What kind of report would you like to generate?</h3>
		</div>
		
		<div>
			<span><a href="generateEmployeeReport.php" target="_blank" class="formButton">All Employees</a></span>
			<span><a href="#" target="_blank" class="formButton">Employees without a manager</a></span><br /><br />
			<span><a href="#" target="_blank" class="formButton">Managers without training plans for selected year</a></span>
			<span><a href="#" target="_blank" class="formButton">All employees without training plans for selected year</a></span>
		</div>
		
	</div> <!-- /container -->


</body>
</html>
