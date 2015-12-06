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
            
        <form class="edit-user-form" name="editUser" action="updateUser.php" method="post">
            
            <fieldset class="fieldset">
            	
            	<input type="hidden" name="employeeID" value="<?php echo $employeeID ?>" />
                
               <label>Username:</label>
                   <input type="text" name="username" readonly="true" class="fields" value="<?php echo $username ?>" size="25"><br>
                  
              <div class="styled-select"> <label>Admin:</label>
                  <select name="admin">      
                    <option value="1" <?php if($admin == 1) {echo "selected";} ?> >Yes</option>
					<option value="0" <?php if($admin == 0) {echo "selected";} ?> >No</option>
               	  </select></div>
            
               <label>Name:</label>
                   <input type="text" name="name" class="fields" value="<?php echo $name ?>" size="25"><br>
                
               <label>E-mail:</label>
                   <input type="text" name="email" class="fields" value="<?php echo $email ?>" size="25"><br>
               <div class="styled-select">   
               <label>Organization:</label>
                   <!-- <input type="text" name="orgName" class="fields" value="<?php echo $orgName ?>" size="25"><br> -->
                    <select name="orgName">      
                    <option value="CEO" <?php if($orgName == "CEO") {echo "selected";} ?> >CEO</option>
                    <option value="QA" <?php if($orgName == "QA") {echo "selected";} ?> >QA</option>
                    <option value="HR" <?php if($orgName == "HR") {echo "selected";} ?> >HR</option>
                    <option value="Software" <?php if($orgName == "Software") {echo "selected";} ?> >Software</option>
                    <option value="Admin" <?php if($orgName == "Admin") {echo "selected";} ?> >Admin</option>
                   
                  </select></div>
               <div class="styled-select">   
               <label>Role:</label>
                  <select name="role">      
                    <option value="CEO" <?php if($role == "CEO") {echo "selected";} ?> >CEO</option>
					<option value="Manager" <?php if($role == "Manager") {echo "selected";} ?> >Manager</option>
					<option value="Team Lead" <?php if($role == "Team Lead") {echo "selected";} ?> >Team Lead</option>
					<option value="Employee" <?php if($role == "Employee") {echo "selected";} ?> >Employee</option>
					<option value="Admin" <?php if($role == "Admin") {echo "selected";} ?> >Admin</option>
               	  </select></div>
                   
               <label>Mgr Email:</label>
                   <input type="text" name="mgrEmail" class="fields" value="<?php echo $mgrEmail ?>" size="25"><br>
	             <br />
               		<input type="submit" name="updateUser" value="Update User" class="formButton">
       		</fieldset>
    	</form>
	</div> 
  </body>
</html>

