<?php


//error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors",1);
require_once 'excel_reader2.php';
require_once '../controllers/db2.php';

$data = new Spreadsheet_Excel_Reader("orgtest.xls");

// echo "Total Sheets in this xls file: ".count($data->sheets)."<br /><br />";
// 
// $html="<table border='1'>";
for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
{	
	if(count($data->sheets[$i]['cells'])>0) // checking sheet not empty
	{
		// echo "Sheet $i:<br /><br />Total rows in sheet $i:  ".count($data->sheets[$i]['cells'])."<br />";
		for($j=2;$j<=count($data->sheets[$i]['cells']);$j++) // loop used to get each row of the sheet
		{ 
			// $html.="<tr>";
			// for($k=1;$k<=count($data->sheets[$i]['cells'][$j]);$k++) // This loop is created to get data in a table format.
			// {
				// $html.="<td>";
				// $html.=$data->sheets[$i]['cells'][$j][$k];
				// $html.="</td>";
			// }
            
			$name = mysqli_real_escape_string($connection,$data->sheets[$i]['cells'][$j][1]);
			$email = mysqli_real_escape_string($connection,$data->sheets[$i]['cells'][$j][2]);
            $orgName = mysqli_real_escape_string($connection,$data->sheets[$i]['cells'][$j][3]);
			$managerEmail = mysqli_real_escape_string($connection,$data->sheets[$i]['cells'][$j][4]);
			$role = mysqli_real_escape_string($connection,$data->sheets[$i]['cells'][$j][5]);
            
            $empQuery = "select name, email from employees where name='" . $name . "' and 
            email='". $email . "'";
            
            $empResult = mysqli_query($connection, $empQuery);
            
            $count = mysqli_num_rows($empResult);
            
            
            if($count > 0) {
                
                $empUpdateQuery = "update employees set name ='". $name . "',
                email='" . $email . "', organization_name='" . $orgName . "', manager_email='" . $managerEmail . "', role='" . $role . "' 
                where name='" . $name . "' and email='" . $email . "'";
                
                mysqli_query($connection, $empUpdateQuery);
                
                
            }  else {  
            
            
            $empInsertQuery = "insert into employees(name, email, organization_name, manager_email, role) 
			values ('".$name."','".$email."','".$orgName."','".$managerEmail."','".$role."')";
            
            mysqli_query($connection, $empInsertQuery);
            
            $last_id = mysqli_insert_id($connection);
            
            $defaultPswd = str_shuffle("abcdefg12345");
            
            $file = fopen("../misc_files/passwords.txt", "a") or die("Unable to open file!");
            
            fwrite($file, $defaultPswd . "\n");
            
            $credInsertQuery = "insert into credentials (id, username, password, admin)
            values ('" . $last_id . "', '" . $email . "', sha1('" . $defaultPswd . "'), '0')";
            
            mysqli_query($connection, $credInsertQuery);
            
            $planInsertQuery = "insert into plans (id, shared)
            values ('" . $last_id . "', '0')";
            
            mysqli_query($connection, $planInsertQuery);
            
            
           
            }
            
            // $html.="</tr>";
            
		}
	}

}


// $html.="</table>";
// echo $html;
// echo "<br />Data Inserted in database";
//echo $data->dump(true, true);
?>