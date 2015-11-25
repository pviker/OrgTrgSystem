<?php

function passwordValidate($newPassIn) {
    
    $flag = 1;
    $length = strlen($newPassIn);
    
    if($length < 8) {
        
        $_SESSION['passLengthMessage'] = "Password must be at least 8 characters long. ";
        $flag = 0;
        
    }
    
    if($newPassIn === "") {
        
        $_SESSION['blankPassMessage'] = "Password cannot be blank. ";
        $flag = 0;
        
    }
    
    if($flag == 0) {
        
        header("Location: changePasswordForm.php");
        exit;
        
    }
    
    
}

?>