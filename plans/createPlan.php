

<?php
	
	require("../controllers/db2.php");
    require("../includes/header.php");
    require("../includes/topmenu.php");
    require("checkForPeers.php");

		
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	
	if (!isset($_SESSION['uname'])){
		header ('Location:../index.php'); 
    }
    
      
	
?>



<?php	

    if($_SESSION['role'] == "Employee") {
        
        if($_SESSION['peersFlag'] == "0") {
    
?>

<div class="sourceButtonDivEmployeeNoPeers">

	<!-- <h3 id="textArea1H3">Plan Resources:</h3> -->

    
	<form name="planSources" action="sources.php" method="post">
								
		<input type="submit" name="sources" value="Organizational Template" class="sourceButtons">
		<input type="submit" name="sources" value="Previous Years" class="sourceButtons">
		<input type="submit" name="sources" value="Supervisor Template" class="sourceButtons">
					
	</form>
<br />
<div>
	Current selected year: <strong><?php echo $_SESSION['currentYear'] ?></strong> 
	<!-- <span class="small-link">(<a href="../plans/changeYear.php">change</a>)</span> -->
</div>
</div>


<?php } else { ?> 
    
    <div class="sourceButtonDivEmployee">

    <!-- <h3 id="textArea1H3">Plan Resources:</h3> -->

    
    <form name="planSources" action="sources.php" method="post">
                                
        <input type="submit" name="sources" value="Peers" class="sourceButtons">
        <input type="submit" name="sources" value="Organizational Template" class="sourceButtons">
        <input type="submit" name="sources" value="Previous Years" class="sourceButtons">
        <input type="submit" name="sources" value="Supervisor Template" class="sourceButtons">
                    
    </form>
<br />
<div>
    Current selected year: <strong><?php echo $_SESSION['currentYear'] ?></strong> 
    <!-- <span class="small-link">(<a href="../plans/changeYear.php">change</a>)</span> -->
</div>
 </div> <?php } } else if($_SESSION['role'] == "CEO") { ?>
    
<div class="sourceButtonDivCEO">

	<!-- <h3 id="textArea1H3">Plan Resources:</h3> -->

    
	<form name="planSources" action="sources.php" method="post">
	
		<input type="submit" name="sources" value="Direct Reports" class="sourceButtons">
		<input type="submit" name="sources" value="Organizational Template" class="sourceButtons">
		<input type="submit" name="sources" value="Previous Years" class="sourceButtons">
		
	</form>
<br />
<div>
	Current selected year: <strong><?php echo $_SESSION['currentYear'] ?></strong> 
	<!-- <span class="small-link">(<a href="../plans/changeYear.php">change</a>)</span> -->
</div>
</div>


<?php } else {
    if($_SESSION['peersFlag'] == "0") { ?>

<!-- <h3 class="center">Plan Resources:</h3> -->

<div class="sourceButtonDivNoPeers">
	
    
	<form name="planSources" action="sources.php" method="post">
	
		<input type="submit" name="sources" value="Direct Reports" class="sourceButtons">
		<input type="submit" name="sources" value="Organizational Template" class="sourceButtons">
		<input type="submit" name="sources" value="Previous Years" class="sourceButtons">
		<input type="submit" name="sources" value="Supervisor Template" class="sourceButtons">
		
	</form>
<br />
<div>
	Current selected year: <strong><?php echo $_SESSION['currentYear'] ?></strong> 
	<!-- <span class="small-link">(<a href="../plans/changeYear.php">change</a>)</span> -->
</div>
</div>



<?php } else { ?>
    
    <!-- <h3 class="center">Plan Resources:</h3> -->

<div class="sourceButtonDiv">
    
    
    <form name="planSources" action="sources.php" method="post">
    
        <input type="submit" name="sources" value="Direct Reports" class="sourceButtons">
        <input type="submit" name="sources" value="Peers" class="sourceButtons">
        <input type="submit" name="sources" value="Organizational Template" class="sourceButtons">
        <input type="submit" name="sources" value="Previous Years" class="sourceButtons">
        <input type="submit" name="sources" value="Supervisor Template" class="sourceButtons">
        
    </form>
<br />
<div>
    Current selected year: <strong><?php echo $_SESSION['currentYear'] ?></strong> 
    <!-- <span class="small-link">(<a href="../plans/changeYear.php">change</a>)</span> -->
</div>
</div>

<?php } } ?>

<br />

<h3 id="textArea1H3">Plan Source:</h3>

<div class="textArea">
    
	<textarea name="planSource" rows='30' cols='75' readonly><?php 
		
		if(isset($_SESSION['drPlan'])) {
		    echo $_SESSION['drPlan'];
		    unset($_SESSION['drPlan']);
	        
		} if(isset($_SESSION['pyPlan'])) {
		    echo$_SESSION['pyPlan'];
		    unset($_SESSION['pyPlan']);
	        
		}   
        
        if(isset($_SESSION['orgTemplate'])) {
            echo $_SESSION['orgTemplate'];
            unset($_SESSION['orgTemplate']);
        } 
        
        if(isset($_SESSION['supervisorPlan'])) {
            echo $_SESSION['supervisorPlan'];
            unset($_SESSION['supervisorPlan']); 
                
        }
        
        if(isset($_SESSION['peersPlan'])) {
            echo $_SESSION['peersPlan'];
            unset($_SESSION['peersPlan']);
            
        }
        
		    
		?>  
	</textarea>

</div>

<h3 id="textArea2H3">Create Your Plan:</h3>

<form method="post" class="textArea" action="persistPlan.php">
	
    <textarea name="createPlan" rows = '30' cols = '75' placeholder="Enter new plan here"><?php
    
     if(isset($_SESSION['currentPlan'])) {
         echo $_SESSION['currentPlan'];
     }   
     
        
     ?>   
    </textarea><br>
    <input name="submit" type="submit" value="Submit Plan" class="formButton" />
    <input type="checkbox" name="share" value="share"> Share plan
</form>


<br />


</body>

</html>