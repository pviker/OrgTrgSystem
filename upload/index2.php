<?php


//error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors",1);
require_once 'excel_reader2.php';
require_once 'db2.php';

$data = new Spreadsheet_Excel_Reader("orgtest.xls");

echo "Total Sheets in this xls file: ".count($data->sheets)."<br /><br />";

$html="<table border='1'>";
for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
{	
	if(count($data->sheets[$i]['cells'])>0) // checking sheet not empty
	{
		echo "Sheet $i:<br /><br />Total rows in sheet $i:  ".count($data->sheets[$i]['cells'])."<br />";
		for($j=2;$j<=count($data->sheets[$i]['cells']);$j++) // loop used to get each row of the sheet
		{ 
			$html.="<tr>";
			for($k=1;$k<=count($data->sheets[$i]['cells'][$j]);$k++) // This loop is created to get data in a table format.
			{
				$html.="<td>";
				$html.=$data->sheets[$i]['cells'][$j][$k];
				$html.="</td>";
			}
            
			$fname = mysqli_real_escape_string($connection,$data->sheets[$i]['cells'][$j][1]);
            $lname = mysqli_real_escape_string($connection,$data->sheets[$i]['cells'][$j][2]);
			$email = mysqli_real_escape_string($connection,$data->sheets[$i]['cells'][$j][3]);
			$bossmail = mysqli_real_escape_string($connection,$data->sheets[$i]['cells'][$j][4]);
			$elevel = mysqli_real_escape_string($connection,$data->sheets[$i]['cells'][$j][5]);
            
            $empQuery = "select first_name, last_name, email from employees where first_name='" . $fname . "' and 
            last_name='". $lname . "' and email='". $email . "'";
            
            $empResult = mysqli_query($connection, $empQuery);
            
            $count = mysqli_num_rows($empResult);
            
            
            if($count > 0) {
                
                $empUpdateQuery = "update employees set first_name ='". $fname . "', last_name='" . $lname . "',
                email='" . $email . "', boss_email='" . $bossmail . "', elevel='" . $elevel . "' 
                where first_name='" . $fname . "' and last_name='" . $lname . "' and email='" . $email . "'";
                
                mysqli_query($connection, $empUpdateQuery);
                
                
            }  else {  
            
            
            $empInsertQuery = "insert into employees(first_name, last_name, email, boss_email, elevel) 
			values ('".$fname."','".$lname."','".$email."','".$bossmail."','".$elevel."')";
            
            mysqli_query($connection, $empInsertQuery);
            
            $last_id = mysqli_insert_id($connection);
            
            $defaultPswd = str_shuffle("abcdefg12345");
            
            $credInsertQuery = "insert into credentials (id, username, password, admin)
            values ('" . $last_id . "', '" . $email . "', '" . $defaultPswd . "', '0')";
            
            mysqli_query($connection, $credInsertQuery);
            
            $planInsertQuery = "insert into plans (employee_id, shared)
            values ('" . $last_id . "', '0')";
            
            mysqli_query($connection, $planInsertQuery);
            
           
            }
            
            
            
            
            
            
            
			$html.="</tr>";
		}
	}

}

$html.="</table>";
echo $html;
echo "<br />Data Inserted in database";
//echo $data->dump(true, true);
?>