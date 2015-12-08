<?php

       $peersQuery = "select count(*) from employees, plans where employees.id=plans.id and employees.organization_name='" . $_SESSION['orgName'] . "'
                      and employees.role='" . $_SESSION['role'] . "' and plans.shared='1'";
                      
       $peersResult = mysqli_query($connection, $peersQuery);
       
       $peersRow = mysqli_fetch_row($peersResult);
       
       $_SESSION['peersFlag'] = "";
           
           if($peersRow[0] == "0") {
               
               $_SESSION['peersFlag'] = 0;
               
           }
           
?>