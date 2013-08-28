
<?php
	ini_set('display_errors', 'On'); 
	error_reporting(E_ALL);
	$db_host="POLA-SQLTEST"; // Host name
	$db_user="graphics"; // Mysql username
	$db_pwd="Graphics@service"; // Mysql password
	$db_name="Graphics_Services"; // Database name
	$tbl_name="users"; // Table name

	//Connect
	$connection = odbc_connect("Driver={SQL Server};Server=$db_host;Database=$db_name",$db_user,$db_pwd );
	
	$firstName=$_POST['first-name'];
	$lastName=$_POST['last-name'];
	$requestType=$_POST['request-type'];
		
	$sql = "SELECT * FROM users WHERE first_name='$firstName' and last_name='$lastName'";
	$res = odbc_prepare($connection, $sql);
	$success = odbc_execute($res);

	$count = odbc_num_rows($res);
	
	session_start(); 
	$_SESSION['firstName'] = $firstName;
	$_SESSION['lastName'] = $lastName;
	$_SESSION['requestType'] = $requestType;
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	if($count === 1){
		$_SESSION['division'] = odbc_result($res, "division");
		$_SESSION['phone_number'] = odbc_result($res, "phone_number");
		$_SESSION['email'] = odbc_result($res, "email");
		if($requestType === "Copy Center Request"){
			$extra = 'copy_center.php';
		}else if($requestType === "Design Request"){
			$extra = 'design_request.php';
		}else if($requestType === "Audio/Video Request"){
			$extra = 'av_request.php';
		}else{
		
		}
		//$extra = 'main_login.php';
	}else{
		//$extra = 'main_login.php';
	}
	header("Location: http://$host$uri/$extra");	


?>