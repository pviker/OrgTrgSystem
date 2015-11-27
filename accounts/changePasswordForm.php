<?php
/* 
 * ICS325 - Final Project
 * Final Project
 * Group: D for Dolphins
 * File: changePasswordForm.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: This is the form for changing a password
 *   
 * */
 
 require("../includes/header.php");
 require("../includes/topmenu.php");
 require("../controllers/db2.php");
  
 if(!isset($_SESSION)) {
     session_start();
 }
  
 
 if(!isset($_SESSION['uname'])) {
     header("Location: login.php");
 }
 
 $msg = "";
 
 if(isset($_SESSION['blankPassMessage'])) {
     
     $msg = $_SESSION['blankPassMessage'];
     unset($_SESSION['blankPassMessage']);
 }
 
 if(isset($_SESSION['passNotMatch'])) {
     
     $msg = $_SESSION['passNotMatch'];
     unset($_SESSION['passNotMatch']);
 }
 
 if(isset($_SESSION['passLengthMessage'])) {
     
     $msg = $_SESSION['passLengthMessage'];
     unset($_SESSION['passLengthMessage']);
 }

?>

	<div class="main-content-wrapper" >
		
		<?php echo $msg ?>

		<form name="changePassword" action="changePassword.php" method="post" class="change-password">
            
            <fieldset id="field1" class="fieldset">
                <legend>Change Password</legend>

                <label>Old Password:</label><input type="password" name="oldPassword" placeholder="Enter old password" size="25" class="fields" id="oldPass" /><br />
                <label>New Password:</label><input type="password" name="newPassword" placeholder="Enter new password" size="25" class="fields" id="newPass" /><br />
                <label>Confirm New Password:</label><input type="password" name="confirmPassword" placeholder="Confirm new password" size="25" class="fields" id="confirmPass" /><br />

            </fieldset>
			<br />
            <div class="buttons">
                <input type="submit" class="formButton" name="Send" alt="Send" value="Send" />
                <input type="reset" class="formButton" name="Reset" value="Reset" />
            </div> 

            
        </form>
        
	</div>

</body>

</html>