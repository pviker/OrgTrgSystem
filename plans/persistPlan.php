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
var_dump($_SESSION);
var_dump($_POST);
$id = $_SESSION['userID'];
$year = date("Y");
$year = (int)$year;
$id = (int)$id;


          if (isset($_POST['createPlan'])){
              $cp = $_POST['createPlan'];
          }
          if(isset($_POST['share']) && $_POST['share'] == "share")
          {
              $share = true;
          }
          else
          {
              $share = false;
          }

if ($_SESSION['currentPlan'] != ""){
    $sql = "UPDATE PLANS SET  plan='". $cp. "', shared='". $share. "' WHERE id ='". $id. "' and pYear ='". $year. "'";
}
else{
    $sql = "insert into PLANS (id,plan,pYear,shared)
                            values('" .$id. "', '" .$cp. "','" .$year. "', '" .$share. "')";
}


mysqli_query($connection, $sql);
$_SESSION['message'] = "Your Plan Was Saved To The System";
//header("Location:../accounts/admin.php");
xdebug_var_dump($id,$year);
var_dump($share);
