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
    
    $planQuery = "select plan from plans where employee_id='" . $_SESSION['userID'] . "' and pyear='2015'";
    
    $planResult = mysqli_query($connection, $planQuery);
    
    $planRow = mysqli_fetch_assoc($planResult);
    
    $plan = $planRow['plan'];
    
     
    
?>
	
	<h3 id="textAreaPlanH3">Current Plan:</h3>

<div class="textArea">
    
<textarea name="planSource" rows='30' cols='75' readonly><?php echo $plan ?></textarea>

</div>
	


