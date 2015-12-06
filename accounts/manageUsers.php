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
		<?php 
			if(isset($_SESSION['message'])){
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			} 
		?>	
	</div>
    
<?php 
    
    //Query for user info
    $userInfoQuery = "select credentials2.id, username, admin, name, email, organization_name, role, manager_email
    					 from credentials2, employees where credentials2.id = employees.id order by organization_name, role";
     
    $results = mysqli_query($connection, $userInfoQuery);
     
?>

	 <h1 class="center">Administration Page</h1>
     <h2 class="center">Manage Current Employees</h2>
     
     
     <div class="right-align bottom-margin">
     	<strong><a href="addUser.php" class="formButton" target="_blank">Add new employee</a></strong>
     </div>
     
     <div class="user-table">
     	

         <table>
             <tr>
                 
                 <td>User name</td>
                 <!-- <td>Password</td> -->
                 <td>Admin</td>
                 <td>Name</td>
                 <td>Email</td>
                 <td>Team</td>
                 <td>Role</td>
                 <td>Manager Email</td>
                 <td></td>
             </tr>
             
             <?php 
             
             //Print rows from database records into table
             while($row = mysqli_fetch_assoc($results)) {
                 
				 $delete = " | <a href='#' class='confirmDelete' onclick='alertBox(" . $row['id'] . ")'>DELETE</a>";
				 $admin = "";
				 if($row["admin"] == 1){
				 	$admin = "Yes";
				 	$delete = "";
				 } else if($row["admin"] == 0){
				 	$admin = "No";
				 }
				   
                 echo "<tr>
                 		
                 		<td>" . $row["username"] . "</td>

                 		<td>" . $admin . "</td>
                 		<td>" . $row["name"] . "</td>
                 		<td>" . $row["email"] . "</td>
                 		<td>" . $row["organization_name"] . "</td>
                 		<td>" . $row["role"] . "</td>
                 		<td>" . $row["manager_email"] . "</td>
                 		<td> <a href=\"editUser.php?id=" . $row["id"] . "\" style=\"color:black\" >EDIT</a>" . $delete . 
                 		"</td>	
                 		
                 	   </tr>";    
             }
             				// backup, in case the css window popup ends up not working
			 				//"<a href=\"\" style=\"color:black\" onclick='confirmUserDelete()'>DELETE</a>"
             ?>
             
        	</table>
        	
		</div>
     
		<?php     
		  
		    //Free results from memory
		    mysqli_free_result($results);
		    //Close database connection
		    mysqli_close($connection);
		 
		?>

	</body>

</html>