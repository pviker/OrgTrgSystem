<?php 

    require("../controllers/db2.php");
	require("../includes/header.php");
	require("../includes/topmenu.php");
    foreach (glob("../includes/viewPlans/*.php") as $filename){
	    require $filename;
	}
    
    $_SESSION['currentPlan'] = $selfPlan;
	 // formatted session var dump script
//	include("../misc_files/seshVarDumpFn.php");
?>

<div class="main-content-wrapper" style="margin-bottom: 1em;">
	<?php
	    if(isset($_SESSION['passConfirmMessage'])) {
	        echo $_SESSION['passConfirmMessage'];
	        unset($_SESSION['passConfirmMessage']);
     	}
		
		 if(isset($_SESSION['message'])) {
	        echo $_SESSION['message'];
	        unset($_SESSION['message']);
     	}
	 ?>
</div>

<?php
    
    if($_SESSION['role'] == "Employee") {     
?>



<div id="accordion">
  <h3>My Plan</h3>
  <div>
    <p>
    <?php
               
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

