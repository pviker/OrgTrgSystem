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
 require("../controllers/db2.php");
  
 if(!isset($_SESSION)) {
     session_start();
 }
  
 
 if(!isset($_SESSION['uname'])) {
     header("Location: login.php");
 }

?>

<form name="changePassword" action="changePassword.php" method="post">
            
            <fieldset id="field1">
                <legend>Change Password</legend>

                <label>Old Password:</label><input type="password" name="oldPassword" placeholder="Enter old password" size="25" class="fields" id="oldPass" /><br />
                <label>New Password:</label><input type="password" name="newPassword" placeholder="Enter new password" size="25" class="fields" id="newPass" /><br />
                <label>Confirm New Password:</label><input type="password" name="confirmPassword" placeholder="Confirm new password" size="25" class="fields" id="confirmPass" /><br />

            </fieldset>

            <div class="buttons">
                <input type="submit" class="buttons" name="Send" alt="Send" value="Send" />
                <input type="reset" class="buttons" name="Reset" value="Reset" />
            </div> 

            
        </form>

</body>

</html>