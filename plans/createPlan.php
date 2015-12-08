

<?php
	
	require("../controllers/db2.php");
    require("../includes/header.php");
    require("../includes/topmenu.php");
    foreach (glob("../includes/viewPlans/*.php") as $filename){
        require $filename;
    }
		
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	
	if (!isset($_SESSION['uname'])){
		header ('Location:../index.php'); 
    }
    
      
	
?>



<?php	

    if($_SESSION['role'] == "Employee") {
    
?>

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
</div>


<?php } else if($_SESSION['role'] == "CEO") { ?>
    
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



<?php } ?>

<br />

<h3 id="textArea1H3">Plan Source:</h3>

<div class="textArea">
    
	<textarea name="planSource" rows='30' cols='75' readonly><?php 
		
		if(isset($_SESSION['drPlan'])) {
		    echo $_SESSION['drPlan'];
		    unset($_SESSION['drPlan']);
	        
		} if(isset($_SESSION['pyPlan'])) {
		    echo($_SESSION['pyPlan']);
		    unset($_SESSION['pyPlan']);
	        
		}    
		    
		?>  
	</textarea>

</div>

<h3 id="textArea2H3">Create Your Plan:</h3>

<form method="post" class="textArea" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	
    <textarea name="createPlan" rows = '30' cols = '75' placeholder="Enter new plan here"><?php
    
     if(isset($_SESSION['currentPlan'])) {
         echo $_SESSION['currentPlan'];
     }   
     
        
     ?>   
    </textarea><br>
    <input name="submit" type="submit" value="Submit Plan" class="formButton" />
</form>
<br />
<?php
    // if (isset($_POST['submit'])) {
		// $year = $_POST['year']; 
        // $text = mysql_real_escape_string($_POST['plan']); 
		// mysql_connect ("localhost", "user1", "abc123") or die ('Error: ' . mysql_error());
        // mysql_select_db("orgtrn") or die ('Data error:' . mysql_error());
        // $query="INSERT INTO plans VALUES ('$userid' , '$year', '$text', '1')" ;
        // mysql_query($query) or die ('Error updating database ' . mysql_error());
    // }
?>

</body>

</html>