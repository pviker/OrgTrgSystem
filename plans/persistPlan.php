	<?php
	
	require("../controllers/db2.php");
	require("../includes/header.php");
	require("../includes/topmenu.php");
	require("checkPlan.php");
	
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	
	if (!isset($_SESSION['uname'])){
	    header ('Location:../index.php');
	}
	// var_dump($_SESSION);
	// var_dump($_POST);
	$id = $_SESSION['userID'];
	$year = date("Y");
	$year = (int)$year;
	$id = (int)$id;
	
	
          if (isset($_POST['createPlan'])){
              $cp = $_POST['createPlan'];
          }
          if(isset($_POST['share']) && $_POST['share'] == "share")
          {
              $share = 1;
          }
          else
          {
              $share = 0;
          }
	          
	if(isset($_POST['save'])) {
	    
	    $_SESSION['currentPlan'] = $_POST['createPlan'];
	    
	    header("Location: createPlan.php");
	    exit;
	}

	$cp = addslashes($cp);
	
	//echo $cp;
	
	if ($insertUpdate == "update"){
	    $sql = "UPDATE plans SET plan='". $cp. "', shared='". $share. "' WHERE id ='". $id. "' and pYear ='". $year. "'";
	}
	else{
	    $sql = "insert into plans (id,plan,pYear,shared)
	                            values('" .$id. "', '" .$cp. "','" .$year. "', '" .$share. "')";
	}
	
	//echo $sql;
	
	mysqli_query($connection, $sql);
	$_SESSION['message'] = "Your Plan Was Saved To The System";
	header("Location:../index.php");
	// xdebug_var_dump($id,$year);
	// var_dump($share);
