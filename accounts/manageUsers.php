<?php 

	require("../includes/header.php");
	require("../includes/topmenu.php");
	require("../controllers/db2.php");
	
?>

	<div class="main-content-wrapper">
		<h1 class="indexH1">Registered Users</h1>		
	</div>
    
<?php 
    
    //Query for user info
    $userInfoQuery = "select credentials.id, username, admin, name, email, organization_name, role, manager_email
    					 from credentials, employees where credentials.id = employees.id order by role";
     
    $results = mysqli_query($connection, $userInfoQuery);
     
?>
     
     <div class = "user-table">
     	
         
         <table>
             <tr>
                 <td>ID</td>
                 <td>User name</td>
                 <td>Password</td>
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
                 
				 $admin = "";
				 if($row["admin"] == 1){
				 	$admin = "Yes";
				 } else if($row["admin"] == 0){
				 	$admin = "No";
				 }
                     
                 echo "<tr>
                 		<td>" . $row["id"] . "</td>
                 		<td>" . $row["username"] . "</td>
                 		<td>" . $row["username"] . "</td>
                 		<td>" . $admin . "</td>
                 		<td>" . $row["name"] . "</td>
                 		<td>" . $row["email"] . "</td>
                 		<td>" . $row["organization_name"] . "</td>
                 		<td>" . $row["role"] . "</td>
                 		<td>" . $row["manager_email"] . "</td>
                 		<td><a href=\"edituser.php?id=" . $row["id"] . "\" style=\"color:black\" >EDIT</a></td>
                 	</tr>";    
             }
             
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