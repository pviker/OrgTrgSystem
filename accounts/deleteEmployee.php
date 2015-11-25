<?php 

	require("../includes/header.php");

	if(!isset($_SESSION["uname"])){
		header("Location: ../index.php");
	}
	
	if (isset($_SESSION["adminFlag"])){
		if($_SESSION["adminFlag"] != 1){
			header("Location: ../index.php");
		}
	}
	
	require("../includes/topmenu.php");
	require("../controllers/db2.php");
	
?>

	<div class="main-content-wrapper">DELETED</div>



<!-- WILL BE USED TO DELETE USER, WAITING TO PERSIST THIS -->

<?php 



?>