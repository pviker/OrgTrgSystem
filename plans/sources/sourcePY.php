<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }

if($_POST['sources'] == "Previous Years") {
        header("Location: changeYear.php");
        exit;
}
    
?>