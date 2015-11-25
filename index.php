<?php 	
/* 
 * ICS325 - Final Project
 * Final Project
 * Group: D for Dolphins
 * File: login.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This will be the login page for user login.
 *   
 * */
 
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	
	if(isset($_SESSION["uname"])) {
		if($_SESSION["adminFlag"] == 1){
			header("Location: accounts/admin.php");
		} else header("Location: plans/viewPlan.php");
	}
		
  	require("controllers/db2.php");
	require("includes/header.php");  

?>	
	<!--START MAIN CONTENT-->
	<div class="main-content-wrapper">	
		
		<?php 
		
			if(isset($_SESSION["message"])){
				echo $_SESSION["message"];
				unset($_SESSION['message']);
			}
			
			if(isset($_SESSION['logoutMessage'])) {	    
	    		echo $_SESSION['logoutMessage'];
	    		unset($_SESSION['logoutMessage']);
	}
		
		?>
	    <br />
		<form name="login" action="accounts/login.php" method="post" class="login">
			
			<fieldset id="field1">
				<legend>Login</legend>

				<label>User name:</label>
					<input type="text" name="userName" placeholder="Enter username" size="25" class="fields" id="userName" /><br />
				<label>Password:</label>
					<input type="password" name="password" placeholder="Enter password" size="25" class="fields" id="password" /><br />

			</fieldset><br />

			<div class="buttons">
				<input type="submit" name="Send" alt="Send" value="Send" class="formButton" />
				<input type="reset" name="Reset" value="Reset" class="formButton" />
			</div> 

			
		</form>
	
	</div>

</body>

</html>