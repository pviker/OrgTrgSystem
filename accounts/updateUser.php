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
		<strong><?php echo $username ?></strong>, has been successfully updated.<br /><br />
		Would you also like to change the password for <strong><?php echo $username ?></strong>?<br />
		<!-- <a href="#?id=<?php echo $employeeID ?>">YES</a> | <a href="manageUsers.php">NO</a> -->
		
		 <form class="edit-user-form" name="editPassowrd" action="changePasswordForm.php" method="post">
            
            <fieldset class="fieldset" style="border: none">
            	<input type="hidden" name="employeeID" value="<?php echo $employeeID ?>" /><br />
               	<input type="submit" name="updateUser" value="Yes, update password" class="formButton">
               	<a href="admin.php" class="formButton">No, take me to the admin page</a>
       		</fieldset>
    	</form>
		
	</div>
<?php
		}
	}

   mysqli_close($connection);
          
?>
       