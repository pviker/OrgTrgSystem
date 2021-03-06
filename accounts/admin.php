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
		
		<div><h3>
			<?php 
				if(isset($_SESSION['message'])){
					echo $_SESSION['message'];
					unset($_SESSION['message']);
			 	} 
			 ?>
		</h3></div>
		
		<div>
			<span><a href="manageUsers.php" class="formButton">Manage Users</a></span>
			<span><a href="reports.php" class="formButton">Generate Employee Reports</a></span>
			<!-- <span><a href="../plans/viewPlan.php" class="formButton">View My 2015 Admin Organization Template</a></span> --><br /><br />
			<span><a href="../plans/setOrgTemp.php" class="formButton">Set Organization Plan Template</a></span>
			<span><a href="../plans/updateOrgTemp.php" class="formButton">Update Organization Plan Template</a></span>
		</div>
		
	</div> <!-- /container -->


</body>
</html>
