
<?php
//phpinfo();
$db_host="POLA-SQLTEST"; // Host name
$db_user="graphics"; // Mysql username
$db_pwd="Graphics@service"; // Mysql password
$db_name="Graphics_Services"; // Database name
$tbl_name="users"; // Table name

try {  
  # MS SQL Server with PDO_DBLIB  
  $DBH = new PDO("sqlsrv:host=$db_host;dbname=$db_name", $db_user, $db_pwd, 80);  
  echo "<p>BITCHES</p>";
}  
catch(PDOException $e) {  
    echo $e->getMessage();
echo "<p>cock suckers...</p>"; 	
} 

//Connect
//$mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
//$result=mysql_query($sql);
//if ($mysqli->connect_errno) {
 //   echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
//}
//echo $mysqli->host_info . "\n";


//$sql="SELECT * FROM $tbl_name WHERE first_name='$myusername' and last_name='$mypassword'";

// Mysql_num_row is counting table row
//$count=mysql_num_rows($result);

?>