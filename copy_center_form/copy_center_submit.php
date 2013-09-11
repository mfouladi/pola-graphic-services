<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/pola-graphic-services/";
?>
<?php
	$db_host="POLA-SQLTEST"; // Host name
	$db_user="graphics"; // Mysql username
	$db_pwd="Graphics@service"; // Mysql password
	$db_name="Graphics_Services"; // Database name
	$tbl_name="users"; // Table name
?>
<?php
	//Connect to the Database
	$connection = odbc_connect("Driver={SQL Server};Server=$srvr_name;Database=$db_name",$db_user,$db_pwd );
	
	//Receive Posts from Form
	$portEmail = $_POST['portEmail'];
	$input_password=$_POST['password'];
	
	//Run a Select Query on User Table with Email Address
	$sql = "SELECT * FROM users WHERE email= ?";
	$res = odbc_prepare($connection, $sql);
	$success = odbc_execute($res, array($portEmail));
	
	//Run a Select Query on User Table with Input Email Address
	$count = odbc_num_rows($res);
	
	//Unset any previously saved session variables
	session_unset();	
	
	//Starts Saving Specified Data in Current Session
	session_start(); 
	$_SESSION['email'] = $portEmail;
	$_SESSION['validEmail']= FALSE;
	$_SESSION['validAccess']= FALSE;
	$_SESSION['validPassword']= FALSE;
	$uri = 'admin_login.php';
	if($count === 1){
		$_SESSION['validEmail']= TRUE;
		$accessType = odbc_result($res, "access_type");
		if($accessType > 0){
			$_SESSION['validAccess']= TRUE;
			
			$_SESSION['firstName'] = odbc_result($res, "first_name");
			$_SESSION['lastName'] = odbc_result($res, "last_name");
			$_SESSION['division'] = odbc_result($res, "division");
			$_SESSION['phoneNumber'] = odbc_result($res, "phone_number");
			
			$real_password = odbc_result($res, "password");
			
			if($real_password === NULL){
				$real_password = "";
				//Should set up password
			}
			if($real_password === $input_password){
				$_SESSION['validPassword']= TRUE;
				$uri = 'admin/';
			}
			
		}	
	}
	header("Location: $host$uri");	

?>