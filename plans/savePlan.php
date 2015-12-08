<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }

 $_SESSION['currentPlan'] = $_POST['createPlan'] . "\n\n";
 
 echo $_SESSION['currentPlan'];




?>