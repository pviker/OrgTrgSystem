<?php 
	
	// session_start();
/* 
 * ICS325 - Group Project
 * Iteration: 2
 * Group: D for Dolphins
 * File: index.php
 * Author: Kevin Casey, Jordan Grenier, Paul Schilmoeller, Patrick Viker, Joshua Wilson
 * Description: Main index page when going to the main site
 *   
 * */
 
	require("controllers/database.php");
		
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	if (!isset($_SESSION['uname'])){
		header ('Location:accounts/login.php'); 
	}
	print_r($_SESSION);
	
	$curYear = date("Y");  
	$username= $_SESSION['uname']; 
	
	$idQuery = "SELECT id FROM credentials WHERE username = '".$username."'" ; 
	$result = mysqli_query($dbc, $idQuery);
	$row = mysqli_fetch_row($result);
   	$userid = $row[0];
	mysqli_free_result($result);
	echo $userid."</br>";
	
	$planQuery = "SELECT plan FROM plans WHERE id = '".$userid."' AND pYear = '".$curYear."'"; 
	$result = mysqli_query($dbc, $planQuery); 
	$row = mysqli_fetch_row($result);
	$curPlan = $row[0];
	echo $curPlan; 

?>
	<div class="mainContentNoCrumbs" >
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
						else if(isset($_SESSION['emailMessage'])) {
							echo $_SESSION['emailMessage'];
							unset($_SESSION['emailMessage']);
						}
                		else {
                			echo "Welcome to Foo Oranization!";
                		} 
                	?> 
                </h1> <br /><br />
				<h3 class="indexH1">This website allows for us to share our plans for the future of our organization. </h3>
			</p>
			<a href='accounts/logout.php'> Log out </a> </br>
			<a href='plans/create.php'> Create </a> 
		</div>
		
	</body>
</html>
