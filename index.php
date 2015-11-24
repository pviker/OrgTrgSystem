<?php 

/* 
 * ICS325 - Final Project
 * Iteration: 1
 * Group: D for Dolphins
 * File: index.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Main index page when going to the main site
 *   
 * */
 	require("includes/header.php");

	require("controllers/database.php");
   
		
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	if (!isset($_SESSION['uname'])){
		header ('Location:accounts/login.php'); 
	}
//	print_r($_SESSION);
	
	$curYear = date("Y");  
	$username= $_SESSION['uname']; 
	
	$idQuery = "SELECT id FROM credentials WHERE username = '".$username."'" ; 
	$result = mysqli_query($dbc, $idQuery);
	$row = mysqli_fetch_row($result);
   	$userid = $row[0];
	mysqli_free_result($result);
//	echo $userid."</br>";
	
	$planQuery = "SELECT plan FROM plans WHERE id = '".$userid."' AND pYear = '".$curYear."'"; 
	$result = mysqli_query($dbc, $planQuery); 
	$row = mysqli_fetch_row($result);
	$curPlan = $row[0];
	echo $curPlan; 

	require("includes/topmenu.php");
?>

	<div class="main-content-wrapper" >
			<p id="indexContent">
				<h1 class="indexH1">
					<?php 
						if(isset($_SESSION['confirmMessage'])) {
							echo $_SESSION['confirmMessage'] . " to Foo Organization"; 
						} 
						else if(isset($_SESSION['logoutMessage'])) {
                  			echo $_SESSION['logoutMessage'];
                    		unset($_SESSION['logoutMessage']);
                		} 
						
                		else {
                			echo "Welcome to Foo Organization!";
                		} 
                	?> 
                </h1> 
				<h3 class="indexH1">This website allows for us to share our plans for the future of our organization.</h3>
			</p>
			<a href='plans/create.php'>Create your plan</a> 
		</div>
		
	</body>
</html>
