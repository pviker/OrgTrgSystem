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
		
		<div>
			<?php if(isset($_SESSION['message'])){
						echo $_SESSION['message'];
						unset($_SESSION['message']);
			 		} 
			 ?>
		</div>
		
		<div><!-- Probably not needed for the admin template, but will be needed everywhere else -->
			Select year: <select></select>
		</div>
		
		<div>
			<!-- <span><a href="manageUsers.php" class="formButton">Manage Users</a></span>
			<span><a href="setOrgTemp.php" class="formButton">Set Organization Template</a></span>
			<span><a href="manageUsers.php" class="formButton">Manage Users</a></span> -->
		</div>
		
	</div>


</body>
</html>
