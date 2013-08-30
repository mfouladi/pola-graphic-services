<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/pola-graphic-services/";
	$srvr_name="POLA-SQLTEST"; // Server Name
	$db_user="graphics"; // Database Username
	$db_pwd="Graphics@service"; // Database Password
	$db_name="Graphics_Services"; // Database Name
	$tbl_name="users"; // Table name
?>
<?php
	//Connect to the Database
	$connection = odbc_connect("Driver={SQL Server};Server=$srvr_name;Database=$db_name",$db_user,$db_pwd );
	
	//Receive Posts from Form
	$firstName=$_POST['first-name'];
	$lastName=$_POST['last-name'];
	$input_password=$_POST['password'];
	$requestType=$_POST['request-type'];
	
	//Run a Select Query on User Table with First and Last Name
	$sql = "SELECT * FROM users WHERE first_name='$firstName' and last_name='$lastName'";
	$res = odbc_prepare($connection, $sql);
	$success = odbc_execute($res);
	
	//Run a Select Query on User Table with First and Last Name
	$count = odbc_num_rows($res);
	
	//Unset any previously saved session variables
	session_unset();	
	
	//Starts Saving Specified Data in Current Session
	session_start(); 
	$_SESSION['firstName'] = $firstName;
	$_SESSION['lastName'] = $lastName;
	$_SESSION['validName']= FALSE;
	$_SESSION['validAccess']= FALSE;
	$_SESSION['validPassword']= FALSE;
	$uri = 'admin_login.php';
	if($count === 1){
		$_SESSION['validName']= TRUE;
		$accessType = odbc_result($res, "access_type");
		if($accessType > 0){
			$_SESSION['validAccess']= TRUE;
			$_SESSION['division'] = odbc_result($res, "division");
			$_SESSION['phoneNumber'] = odbc_result($res, "phone_number");
			$_SESSION['email'] = odbc_result($res, "email");
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

/*$real_password === $input_password*/
?>