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
		
		<?php 
		
		//include('../misc_files/seshVarDumpFn.php');
		
		?>
		
		<h1>Administration Page</h1>
		
		<div>
			<?php 
				// if(isset($_SESSION['message'])){
						// echo $_SESSION['message'];
						// unset($_SESSION['message']);
			 	// } 
			 ?>
		</div>
		
		<div>
			<h3 id="">Create your organization template:</h3>
			<form method="post" name="orgTemp" class="orgTempTxtArea" action="persistOrgTemp.php">
			    <textarea name="createPlan" rows ='30' cols ='75' placeholder="Enter new plan here"></textarea><br>
			    <input name="submit" type="submit" value="Submit Plan" class="formButton"/>
			</form>
		</div>
		
	</div>


</body>
</html>
