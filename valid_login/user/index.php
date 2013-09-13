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
	
	//Receive Posts from Form
	$portEmail = $_POST['portEmail'];
	$requestType="";
	
	//Determine Which Button Was Clicked on Form
	if($_POST['copyCenter']){
		$requestType=$_POST['copyCenter'];
	}else if($_POST['audioVideo']){
		$requestType=$_POST['audioVideo'];
	}else if($_POST['design']){
		$requestType=$_POST['design'];
	}
	
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
	$_SESSION['requestType'] = $requestType;
	$_SESSION['validEmail']= FALSE;
	$uri = '';
	
	if($count === 1){
		$_SESSION['validEmail']= TRUE;
		$_SESSION['firstName'] = odbc_result($res, "first_name");
		$_SESSION['lastName'] = odbc_result($res, "last_name");
		$_SESSION['division'] = odbc_result($res, "division");
		$_SESSION['phoneNumber'] = odbc_result($res, "phone_number");
		
		if($requestType === "Copy Center"){
			$uri = 'copy_center_form/';
		}else if($requestType === "Design"){
			$uri = 'design_form/';
		}else if($requestType === "Audio/Video"){
			$uri = 'av_form/';
		}
	}
	header("Location: $host$uri");

?>