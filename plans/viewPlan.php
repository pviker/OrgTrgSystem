<?php 

    require("../controllers/db2.php");
	require("../includes/header.php");
	require("../includes/topmenu.php");
    foreach (glob("../includes/viewPlans/*.php") as $filename){
	    require $filename;
	}
    
    
     if(isset($_SESSION['passConfirmMessage'])) {
        echo $_SESSION['passConfirmMessage'];
        unset($_SESSION['passConfirmMessage']);
     }
	 
	 // formatted session var dump script
//	include("../misc_files/seshVarDumpFn.php");
    
    
    if($_SESSION['role'] == "Employee") {     
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
</div>
  <?php } else { ?>
      
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
    
    if(isset($drPlanView)) {
               
           echo $drPlanView;
    }
    
    ?>
    </p>
  </div>
</div>
<?php } ?>
	
	<a href="createPlan.php" id="createLink">Create Plan</a>
	
</body>
</html>

