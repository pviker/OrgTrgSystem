<?php 

    session_start();
    
	require("../controllers/db2.php");

	if(isset($_POST['updateUser'])) {
	   
	    $employeeID = $_POST['employeeID'];
		$username = $_POST['username'];
		$admin = $_POST['admin'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$orgName = $_POST['orgName'];
		$role = $_POST['role'];
		$mgrEmail = $_POST['mgrEmail'];
		   
		$updateQuery = "update credentials, employees set admin='" . $admin . "', name='" . $name . 
						"', email='" . $email . "', organization_name='" . $orgName . "', role='" . $role . "', manager_email='" . 
						$mgrEmail . "' where credentials.id='" . $employeeID . "' and employees.id='" . $employeeID . "'";
	   	   
	   	
		if(mysqli_query($connection, $updateQuery)){
			
			require("../includes/header.php");
			require("../includes/topmenu.php");
?>
		     
	<div class="main-content-wrapper">
		You have successfully updated user: <?php echo $username ?><br /><br />
		Would you like to change the password for the user? <br />
		<a href="#?id=<?php echo $employeeID ?>">YES</a> | <a href="manageUsers.php">NO</a>
	</div>
<?php
		}
	}

   mysqli_close($connection);
          
?>
       