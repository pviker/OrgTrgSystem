<?php 

    session_start();
    
	require("../controllers/db2.php");
	
	if(!isset($_SESSION['uname'])){
		header("Location: admin.php");
	}
	
	if(isset($_SESSION['adminFlag'])){
		if($_SESSION['adminFlag'] != 1){
			header("Location: admin.php");
		}
	}

	if(isset($_POST['submit'])) {
		
		$userID = $_SESSION['userID'];
		$pYear = "2015";
		$plan = $_POST['createPlan'];
		$shared = 0;

		$insert = "INSERT INTO plans (id, pYear, plan, shared) 
					VALUES ('$userID', '$pYear', '$plan', '$shared')";

		/// insert into plans  
		if(mysqli_query($connection, $insert)){
			$_SESSION['message'] = "Admin organization plan templated saved!";
			header("Location: ../accounts/admin.php");		
		}
	} 
	
	else if(isset($_POST['update'])) {
		
		$userID = $_SESSION['userID'];
		$pYear = "2015";
		$plan = $_POST['updatePlan'];
		$shared = 0;

		$insert = "UPDATE plans SET plan='".$plan."' WHERE id=".$userID." and pYear=2015"; 
		 
		if(mysqli_query($connection, $insert)){			
			$_SESSION['message'] = "Admin organization plan templated updated!";
			header("Location: ../accounts/admin.php");		
		}
	}

   mysqli_close($connection);
          
?>
       