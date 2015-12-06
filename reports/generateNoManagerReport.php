<?php
// header for all pages
	
	if (!isset($_SESSION)) session_start();
	
	// checks if file system is on server and corrects root directory for absolute URL paths
	$server = $_SERVER['SERVER_NAME'];
	if (strpos($server,'metrostate.edu') == true) {
		$server = "/~ics325fa1528";
	} else $server = "";

?>

<!DOCTYPE html>

<html>
    
<head>
	
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href="<?php echo $server ?>/ics325/OrgTrgSystem/styles/main.css" rel="stylesheet">
	
	<script type="text/javascript" src="../js/confirmDelete.js"> </script>
	<link href="<?php echo $server ?>/ics325/OrgTrgSystem/styles/generated.css" rel="stylesheet">
	
	<script src="<?php echo $server ?>/ics325/OrgTrgSystem/js/sweetalert-master/dist/sweetalert.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="<?php echo $server ?>/ics325/OrgTrgSystem/js/sweetalert-master/dist/sweetalert.css">
	
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
    $userInfoQuery = "select credentials2.id, username, name, email, organization_name, role, manager_email
    					 from credentials2, employees where credentials2.id = employees.id and manager_email='' 
    					 order by organization_name, role";
     
    $results = mysqli_query($connection, $userInfoQuery);
    
	//var_dump($results);
     
?>
		<h1 class="center">Automatically Generated Report</h1>
		<h3 class="center">*All Current Employees Without Assigned Manager</h3>
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