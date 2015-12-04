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
	
?>

	<div class="main-content-wrapper">
		<h1 class="indexH1">Add New Employee</h1>		
    
        <form class="edit-user-form" name="addUser" action="persistNewUser.php" method="post">
            
            <fieldset class="fieldset">
            	               
               <label>Email:</label>
                   <input type="text" name="username" placeholder="Will be used as username" class="fields" value="" size="25"><br>
                   
               <label>Password:</label>
               	   <input type="password" name="password" class="fields" id="password" value="" size="25"><br />
               
               <label>Confirm: </label>
                   <input type="password" name="passwordConfirm" class="fields" onkeyup="validatePwd()" id="confirmPassword" value="" size="25"><br />
               
               <span id="spanPassword" style="color: #283018">...</span><br />
            
            </fieldset>   
            
            <fieldset class="fieldset">   
               <label>Admin:</label>
                  <select name="admin">      
                    <option value="1">Yes</option>
					<option value="0" selected>No</option>
               	  </select><br />
            
               <label>Name:</label>
                   <input type="text" name="name" class="fields" value="" size="25"><br>
                 
               <label>Organization:</label>
                   <!-- <input type="text" name="orgName" class="fields" value="<?php echo $orgName ?>" size="25"><br> -->
                    <select name="orgName">      
                    <option value="CEO">CEO</option>
                    <option value="QA">QA</option>
                    <option value="HR">HR</option>
                    <option value="Software">Software</option>
                    <option value="Admin">Admin</option>
                   
                  </select><br />
                   
               <label>Role:</label>
                  <select name="role">      
                    <option value="CEO">CEO</option>
					<option value="Manager">Manager</option>
					<option value="Team Lead">Team Lead</option>
					<option value="Employee">Employee</option>
					<option value="Admin">Admin</option>
               	  </select><br /> 
                   
               <label>Mgr Email:</label>
                   <input type="text" name="mgrEmail" class="fields" value="" size="25"><br>
	             <br />
               		<input type="submit" name="adduser" value="Add User" id="submit" class="formButton">
               		<input type="reset" name="reset" class="formButton">
       		</fieldset>
    	</form>
	</div> 
  </body>
</html>

