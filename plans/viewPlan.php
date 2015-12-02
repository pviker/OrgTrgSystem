<?php 

    require("../controllers/db2.php");
	require("../includes/header.php");
	require("../includes/topmenu.php");
    
    
     if(isset($_SESSION['passConfirmMessage'])) {
        
        echo $_SESSION['passConfirmMessage'];
        unset($_SESSION['passConfirmMessage']);
     }
     
    $username= $_SESSION['uname']; 
    $idQuery = "select id from credentials where username = '".$username."'" ; 
    $result = mysqli_query($connection, $idQuery);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['userID'] = $row['id'];
    
    if($_SESSION['role'] == "Employee") {
        
       $planQuery = "select plan from plans where employee_id='" . $_SESSION['userID'] . "' and pyear='2015'";
    
       $planResult = mysqli_query($connection, $planQuery);
    
       $planRow = mysqli_fetch_assoc($planResult);
    
       $plan = $planRow['plan'];
    
       if(strtoupper($plan) == "NULL") {
        
        header("Location: createPlan.php");
        exit;
       }
    
    }
    
    if($_SESSION['role'] == "Team Lead" && $_SESSION['orgName'] == "Software") {
                
       $selfPlanQuery = "select plan from plans where employee_id='" . $_SESSION['userID'] . "' and pyear='2015'";
    
       $selfPlanResult = mysqli_query($connection, $selfPlanQuery);
    
       $selfPlanRow = mysqli_fetch_assoc($selfPlanResult);
    
       $selfPlan = $selfPlanRow['plan'];
        
       $drQuery = "select id from employees where organization_name = 'Software' and role = 'Employee'";
       
       $drResult = mysqli_query($connection, $drQuery);
       
       $drPlan = "";
       
       while($drRow = mysqli_fetch_assoc($drResult)) {
                   
             $drPlanQuery = "select plan from plans where employee_id = '" . $drRow['id'] . "' and pyear='2015'";
           
             $drPlanResult = mysqli_query($connection, $drPlanQuery);
             
             $drPlanRow = mysqli_fetch_assoc($drPlanResult);
             
             $drPlan .= $drPlanRow['plan'] . "\n\n";
           
       }
       
     }
     
    
?>
	
	<h3 id="textAreaPlanH3">Current Plan:</h3>

<div class="textArea">
    
<textarea name="planSource" rows='30' cols='75' readonly>
    
   <?php 
   
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

</div>
	


