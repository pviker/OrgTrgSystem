<?php 

	require("../includes/header.php");
	
	if(!isset($_GET['id'])){
		header("Location: manageUsers.php");
	}
	

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
	
?>

	<div class="main-content-wrapper">
		<h1 class="indexH1">Edit Employee</h1>		
		
		<?php   
		            
		    $employeeID = $_GET['id'];
		    
		    $userQuery = "select username, admin, name, email, organization_name, role, manager_email
							 from credentials, employees where credentials.id = " . $employeeID . " and employees.id = " . $employeeID;
		    
		    $result = mysqli_query($connection, $userQuery); 
		    $row = mysqli_fetch_assoc($result);
		    
		    $username = $row['username'];
		    $admin = $row['admin'];
		    $name = $row['name'];
		    $email = $row['email'];
		    $orgName = $row['organization_name'];
		    $role = $row['role'];
		    $mgrEmail = $row['manager_email'];
		        
			mysqli_free_result($result);
		
		?>                       
            
        <form class="edit-user-form" name="editUser" action="updateuser.php" method="post">
            
            <fieldset class="fieldset">
            	
            	<input type="hidden" value="<?php echo $employeeID ?>" />
                
               <label>Username:</label>
                   <input type="text" name="username" readonly="true" class="fields" value="<?php echo $username ?>" size="25"><br>
                
               <label>Password:</label>
                   <input type="text" name="password" placeholder="New password" class="fields" value="" size="25"><br> 
                   
               <label>Admin:</label>
                  <select name="admin">      
                    <option value="1" <?php if($admin == 1) {echo "selected";} ?> >Yes</option>
					<option value="0" <?php if($admin == 0) {echo "selected";} ?> >No</option>
               	  </select><br />
            
               <label>Last Name:</label>
                   <input type="text" name="name" class="fields" value="<?php echo $name ?>" size="25"><br>
                
               <label>E-mail:</label>
                   <input type="text" name="email" class="fields" value="<?php echo $email ?>" size="25"><br>
                   
               <label>Organization:</label>
                   <input type="text" name="orgName" class="fields" value="<?php echo $orgName ?>" size="25"><br>
                   
               <label>Role:</label>
                   <input type="text" name="role" class="fields" value="<?php echo $role ?>" size="25"><br>
                   
               <label>Mgr Email:</label>
                   <input type="text" name="mgrEmail" class="fields" value="<?php echo $mgrEmail ?>" size="25"><br>
	             <br />
               		<input type="submit" name="updateUser" value="Update User" class="formButton">
       		</fieldset>
    	</form>
	</div> 
  </body>
</html>
