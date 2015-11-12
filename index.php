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
 
	if(null === session_id()){
		session_start();
	}	
	
	

print_r($_SESSION);
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
		</div>
		
	</body>
</html>