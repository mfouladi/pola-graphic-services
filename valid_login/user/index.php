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
	
	//Determine Which Button Was Clicked on Form
	if($_POST['copyCenter']){
		$requestType=$_POST['copyCenter'];
	}else if($_POST['audioVideo']){
		$requestType=$_POST['audioVideo'];
	}else if($_POST['design']){
		$requestType=$_POST['design'];
	}
	
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
	$_SESSION['requestType'] = $requestType;
	$uri = '';
	if($count === 1){
		$_SESSION['division'] = odbc_result($res, "division");
		$_SESSION['phoneNumber'] = odbc_result($res, "phone_number");
		$_SESSION['email'] = odbc_result($res, "email");
		
		if($requestType === "Copy Center"){
			$uri = 'copy_center_form/';
		}else if($requestType === "Design"){
			$uri = 'design_form/';
		}else if($requestType === "Audio/Video"){
			$uri = 'av_form/';
		}
	}else{
		$_SESSION['validName']= FALSE;
	}
	header("Location: $host$uri");

?>