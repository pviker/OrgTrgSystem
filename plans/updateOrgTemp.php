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
	require("../controllers/db2.php");
	
	$query = "select plan from plans where id=" . $_SESSION['userID'] . "
				and pYear=2015";
			
	$planResult = mysqli_query($connection, $query);
    $planRow = mysqli_fetch_assoc($planResult);
    $plan = $planRow['plan'];
	
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
			<h3 id="">Update your organization template:</h3>
			<form method="post" name="updateOrgTemp" class="orgTempTxtArea" action="persistOrgTemp.php">
			    <textarea name="updatePlan" rows ='30' cols ='75'>
			    	<?php echo $plan ?>
			    </textarea><br>
			    <input name="update" type="submit" value="Update Plan" class="formButton"/>
			</form>
		</div>
		
	</div>


</body>
</html>
