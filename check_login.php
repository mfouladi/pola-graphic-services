
<?php
	//phpinfo();
	ini_set('display_errors', 'On'); 
	error_reporting(E_ALL);
	$db_host="POLA-SQLTEST"; // Host name
	$db_user="graphics"; // Mysql username
	$db_pwd="Graphics@service"; // Mysql password
	$db_name="Graphics_Services"; // Database name
	$tbl_name="users"; // Table name

	//Connect
	$connection = odbc_connect("Driver={SQL Server};Server=$db_host;Database=$db_name",$db_user,$db_pwd );
	if($connection)
		echo "<p>Successfully Connect</p>";
	else
		echo "<p>Failed to Connect</p>";
	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName']; 
		
	$sql = "SELECT first_name FROM users WHERE first_name='$firstName' and last_name='$lastName'";
	$res = odbc_prepare($connection, $sql);
	$success = odbc_execute($res);
	if($success)
		echo "<p>Successful Query</p>";
	else
		echo "<p>Failed to Query</p>";
	$count = odbc_num_rows($res);
	echo $count;
	
	
	
	
	// username and password sent from form
	/*$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName']; 
	echo "<p>Successfully Received Data</p>";
	$tsql = "SELECT first_name FROM users";
	echo "<p> $tsql </p>";
	//$connection->query($tsql);

	echo "<p>Successfully Got Count</p>";*/


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