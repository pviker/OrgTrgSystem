<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    }

require("../controllers/db2.php");

foreach (glob("../includes/viewPlans/*.php") as $filename)
{
    require $filename;
}

require("sources/sourceDR.php");


?>