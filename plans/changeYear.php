<?php 

	require("../includes/header.php");
	
	if(!isset($_SESSION["uname"])){
		header("Location: ../index.php");
	}
	
	require("../includes/topmenu.php");
	
?>

	<div class="main-content-wrapper">
		
		<div>
			<?php if(isset($_SESSION['message'])){
						echo $_SESSION['message'];
						unset($_SESSION['message']);
			 		} 
			 ?>
		</div><br />
		
		<div>
			<form action="../controllers/updateYear.php" method="post">
				<label>Select year: </label>
	                <select name="year">      
		                <option value="2015" <?php if($_SESSION['currentYear'] == 2015) {echo "selected";} ?> >2015</option>
						<option value="2014" <?php if($_SESSION['currentYear'] == 2014) {echo "selected";} ?> >2014</option>
	           	    	<option value="2013" <?php if($_SESSION['currentYear'] == 2013) {echo "selected";} ?> >2013</option>
	           	    	<option value="2012" <?php if($_SESSION['currentYear'] == 2012) {echo "selected";} ?> >2012</option>
	           	    	<option value="2011" <?php if($_SESSION['currentYear'] == 2011) {echo "selected";} ?> >2011</option>
	           	    	<option value="2010" <?php if($_SESSION['currentYear'] == 2010) {echo "selected";} ?> >2010</option>
	           	    </select>
	           	<input type="submit" name="updateYear" />
            </form>
		</div>
		
	</div>

</body>
</html>
