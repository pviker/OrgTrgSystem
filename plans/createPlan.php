

<?php
	
	require("../controllers/db2.php");
    require("../includes/header.php");
    require("../includes/topmenu.php");
		
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	
	if (!isset($_SESSION['uname'])){
		header ('Location:../index.php'); 
    }
	
	$username= $_SESSION['uname']; 
	$idQuery = "SELECT id FROM credentials WHERE username = '".$username."'" ; 
	$result = mysqli_query($connection, $idQuery);
	$row = mysqli_fetch_row($result);
    $userid = $row[0];
	// echo $userid; 
?>

<div class="sourceButtonDiv">
    
<form name="planSources" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<input type="submit" name="sources" value="Direct Reports" class="sourceButtons">
<input type="submit" name="sources" value="Peers" class="sourceButtons">
<input type="submit" name="sources" value="Organizational Template" class="sourceButtons">
<input type="submit" name="sources" value="Previous Years" class="sourceButtons">
<input type="submit" name="sources" value="Supervisor Template" class="sourceButtons">

</form>

</div>

<br><br><br>

<h3 id="textArea1H3">Plan Source:</h3>

<div class="textArea">
    
<textarea name="planSource" rows='30' cols='75' readonly></textarea>

</div>

<h3 id="textArea2H3">Create Your Plan:</h3>

<form method="post" class="textArea" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<!-- <select name='year' > 
		<option value =''> Select </option>
		<option value='2014'> 2014 </option>
		<option value='2015'> 2015 </option>
		<option value='2016'> 2016 </option>
	</select></br> -->
    <textarea name="createPlan" rows = '30' cols = '75' placeholder="Enter new plan here"></textarea><br>
    <input name="submit" type="submit" value="Submit Plan" />
</form>

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