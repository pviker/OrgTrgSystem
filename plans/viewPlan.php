<?php 

	require("../includes/header.php");
	require("../includes/topmenu.php");
    
    
	
?>

<div class="main-content-wrapper">
    
<?php 
    
     if(isset($_SESSION['passConfirmMessage'])) {
        
        echo $_SESSION['passConfirmMessage'];
        unset($_SESSION['passConfirmMessage']);
     }
    
?>
	
	<h1>Current Plan</h1>
	
</div>

