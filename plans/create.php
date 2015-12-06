

<?php
	
	require("../controllers/database.php");
		
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	
	if (!isset($_SESSION['uname'])){
		header ('Location:../accounts/login.php'); 
	}
	print_r($_SESSION);
	
	$username= $_SESSION['uname']; 
	$idQuery = "SELECT id FROM credentials2 WHERE username = '".$username."'" ; 
	$result = mysqli_query($dbc, $idQuery);
	$row = mysqli_fetch_row($result);
    $userid = $row[0];
	echo $userid; 
?>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<select name='year' > 
		<option value =''> Select </option>
		<option value='2014'> 2014 </option>
		<option value='2015'> 2015 </option>
		<option value='2016'> 2016 </option>
	</select></br>
    <textarea name="plan" rows = '25' cols = '100'>Start your plan:</textarea>
    <input name="submit" type="submit" value="submit" />
</form>

<?php
    if (isset($_POST['submit'])) {
		$year = $_POST['year']; 
        $text = mysql_real_escape_string($_POST['plan']); 
		mysql_connect ("localhost", "user1", "abc123") or die ('Error: ' . mysql_error());
        mysql_select_db("orgtrn") or die ('Data error:' . mysql_error());
        $query="INSERT INTO plans VALUES ('$userid' , '$year', '$text', '1')" ;
        mysql_query($query) or die ('Error updating database ' . mysql_error());
    }
?>