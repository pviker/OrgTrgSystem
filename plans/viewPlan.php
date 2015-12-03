<?php 

    require("../controllers/db2.php");
	require("../includes/header.php");
	require("../includes/topmenu.php");
    foreach (glob("../includes/viewPlans/*.php") as $filename)
{
    require $filename;
}
    
    
     if(isset($_SESSION['passConfirmMessage'])) {
        echo $_SESSION['passConfirmMessage'];
        unset($_SESSION['passConfirmMessage']);
     }
	 
	 // formatted session var dump script
//	include("../misc_files/seshVarDumpFn.php");
         
?>

<div id="accordion">
  <h3>My Plan</h3>
  <div>
    <p>
    <?php
    
    if(isset($plan)) {
               
           echo $plan;
               
           }  
           
           if(isset($selfPlan)) {
               
               echo $selfPlan;
               
           }
    
    ?>
    </p>
  </div>
  <h3>Direct Reports</h3>
  <div>
    <p>
    <?php
    
    if(isset($drPlan)) {
               
               echo $drPlan;
    }
    
    ?>
    </p>
  </div>
</div>
	
	<!-- <h3 id="textAreaPlanH3">Current Plan:</h3>

	<div class="textArea">
	    
		<textarea name="planSource" rows='30' cols='75' readonly><?php 
		
		if(isset($plan)) {
		       
		   echo $plan . "\n\n";
		       
		   }  
		   
		   if(isset($selfPlan)) {
		       
		       echo $selfPlan . "\n\n";
		       
		   }
		   
		   if(isset($drPlan)) {
		       
		       echo $drPlan . "\n\n";
		   }
		   
		   ?>
		    
		</textarea>
	
	</div> -->
	
	<a href="createPlan.php" id="createLink">Create Plan</a>
	
</body>
</html>

