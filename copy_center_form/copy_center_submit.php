<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/GraphicServices/";
	$srvr_name="POLA-SQLTEST"; // Server Name
	$db_user="graphics"; // Database Username
	$db_pwd="Graphics@service"; // Database Password
	$db_name="Graphics_Services"; // Database Name
	$tbl_name="users"; // Table name
?>
<?php
	//Connect to the Database
	$connection = odbc_connect("Driver={SQL Server};Server=$srvr_name;Database=$db_name",$db_user,$db_pwd );

	//Received Saved Data in Current Session
	session_start();
	$portEmail = $_SESSION['portEmail'];

	//Receive Posts from Form
echo "<p>";
echo $_POST['project_title'],'<br>';
	$job_name = $_POST['project_title'];
echo $job_name,'<br>';
	$due_date_string =$_POST['year']."/".$_POST['month']."/".$_POST['day']." ".$_POST['hour'].":".$_POST['minute'].":00";
echo $due_date_string, '<br>';
	//Produce DateTimes
	$current_datetime = new DateTime();
	$expected_datetime = new DateTime($due_date_string);

echo "Data:<br>";
echo $current_datetime->format('Y-m-d H:i:s'), '<br>';
echo $expected_datetime->format('Y-m-d H:i:s'), '<br>';
echo $job_name, '<br>';
echo $portEmail, '<br>';
echo "</p>";
	

	//Run a Select Query on User Table with Email Address
	$sql = "INSERT INTO requests (requester, date_requested, date_expected, job_description) VALUES(?,?,?,?)";
	$res = odbc_prepare($connection, $sql) or die (odbc_errormsg());
	$success = odbc_execute($res, 
		array($portEmail, $current_datetime->format('Y-m-d H:i:s'),
							 $expected_datetime->format('Y-m-d H:i:s'), $job_name))
							or die (odbc_errormsg());
	if($success)
		echo "<p>Success</p>";
	else
		echo "<p>Failed</p>";
?>