<?php 

    session_start();
    
	require("../controllers/db2.php");
	
	if(!isset($_SESSION['uname'])){
		header("Location: admin.php");
	}
	
	if(isset($_SESSION['adminFlag'])){
		if($_SESSION['adminFlag'] != 1){
			header("Location: admin.php");
		}
	}

	if(isset($_POST['adduser'])) {
	   
//	    $employeeID = $_POST['employeeID'];
		/// credentials2 table
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		$admin = $_POST['admin'];
		
		/// employees table
		$name = $_POST['name'];
		$email = $_POST['username'];;
		$orgName = $_POST['orgName'];
		$role = $_POST['role'];
		$mgrEmail = $_POST['mgrEmail'];

		$insert = "INSERT INTO employees (name, email, organization_name, role, manager_email) 
					VALUES ('$name', '$email', '$orgName', '$role', '$mgrEmail')";
					
		
	   	 
		/// insert into employees  
		if(mysqli_query($connection, $insert)){
			
			$last_id = mysqli_insert_id($connection);
			$insert = "INSERT INTO credentials2 (id, username, password, admin)
							VALUES ('$last_id', '$username', '$password', '$admin')";
							
			echo $insert;
							
			if(mysqli_query($connection, $insert)){
				
				$insert = "INSERT INTO plans (id, shared)
								VALUES ('$last_id', '0')";
				
				if(mysqli_query($connection, $insert)){
					$_SESSION['message'] = "User " . $username . ", successfully added.";
					header("Location: manageUsers.php");
				}
			}
		}
	}

   mysqli_close($connection);
          
?>
       