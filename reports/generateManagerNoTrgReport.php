<?php
// header for all pages
	
	if (!isset($_SESSION)) session_start();

?>

<!DOCTYPE html>

<html>
    
<head>
	
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href="/ics325/OrgTrgSystem/styles/main.css" rel="stylesheet">
	
	<script type="text/javascript" src="../js/confirmDelete.js"> </script>
	<link href="/ics325/OrgTrgSystem/styles/generated.css" rel="stylesheet">
	
	<script src="/ics325/OrgTrgSystem/js/sweetalert-master/dist/sweetalert.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="/ics325/OrgTrgSystem/js/sweetalert-master/dist/sweetalert.css">
	
</head>

<body onload="printPage()">
	<script>
		function printPage() {
		    window.print();
		}
	</script>
     

<?php 

	if(!isset($_SESSION["uname"])){
		header("Location: ../index.php");
	}
	
	if (isset($_SESSION["adminFlag"])){
		if($_SESSION["adminFlag"] != 1){
			header("Location: ../index.php");
		}
	}
	
//	require("../includes/topmenu.php");
	require("../controllers/db2.php");
	
    //Query for user info
    // $userInfoQuery = "select credentials.id, username, admin, name, email, organization_name, role, manager_email
    					 // from credentials, employees, plans where credentials.id = employees.id and role='manager' order by role";
     
    $userInfoQuery = "select credentials.id, plan, username, admin, name, email, organization_name, role, manager_email
						from credentials, employees, plans
    					where credentials.id IN (select plans.id from plans where plan IS NULL or plan = '')
    					and credentials.id = employees.id
    					and credentials.id = plans.id
    					and role = 'manager'
    					and pYear = " . $_SESSION['currentYear'] . "
						order by organization_name";
     
    $results = mysqli_query($connection, $userInfoQuery);
    
	//var_dump($results);
     
?>
	<h1 class="center">Automatically Generated Report</h1>
	<h3 class="center">*Managers who do not have a training plan for the year <?php echo $_SESSION['currentYear'] ?></h3>
	
		<div class="left-align">
    	Created on: 
    	<?php 
    		date_default_timezone_set("America/Chicago"); 
    		echo date("m-d-Y h:i:sa"); 
    	?>
    </div>
     
    <div class="user-table">
    	<table>
        	<tr>
                 <td>User name</td>
                 <!-- <td>Admin</td> -->
                 <td>Name</td>
                 <td>Email</td>
                 <td>Team</td>
                 <td>Role</td>
                 <td>Manager Email</td>
             </tr>
             
             <?php 
             
	             //Print rows from database records into table
	             while($row = mysqli_fetch_assoc($results)) {
	                 
					 // $admin = "";
					 // if($row["admin"] == 1){
					 	// $admin = "Yes";
					 	// $delete = "";
					 // } else if($row["admin"] == 0){
					 	// $admin = "No";
					 // }
					   
	                 echo "<tr>
	                 		
	                 		<td>" . $row["username"] . "</td>
	
	                 		
	                 		<td>" . $row["name"] . "</td>
	                 		<td>" . $row["email"] . "</td>
	                 		<td>" . $row["organization_name"] . "</td>
	                 		<td>" . $row["role"] . "</td>
	                 		<td>" . $row["manager_email"] . "</td>                 		
	                 	   </tr>";    
	             }
             ?>
             
        </table>
	</div>
		

     
		<?php     
		  
		    //Free results from memory
		  //  mysqli_free_result($results);
		    //Close database connection
		    mysqli_close($connection);
		 
		?>

	</body>

</html>