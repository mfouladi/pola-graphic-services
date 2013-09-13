<?php
	//The base folder that is used
	$host = "http://".$_SERVER['HTTP_HOST']."/GraphicServices/";
	//Server information
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
	//And Initialize Variables
	$portEmail = $_POST['portEmail'];
	$requestType="";
	
	//Determine Which Button Was Clicked on Form
	if(isset($_POST['copyCenter'])){
		$requestType=$_POST['copyCenter'];
	}else if(isset($_POST['audioVideo'])){
		$requestType=$_POST['audioVideo'];
	}else if(isset($_POST['design'])){
		$requestType=$_POST['design'];
	}
	
	//Run a Select Query on User Table with Email Address
	$sql = "SELECT * FROM users WHERE email= ?";
	$res = odbc_prepare($connection, $sql);
	$success = odbc_execute($res, array($portEmail));
	
	//Get the number of results from the query
	$count = odbc_num_rows($res);
	
	//Unset any previously saved session variables
	session_unset();
	
	//Starts Saving Specified Data in Current Session
	session_start(); 
	$_SESSION['portEmail'] = $portEmail;
	$_SESSION['requestType'] = $requestType;
	//Used To grant access to form if email is valid
	$_SESSION['validEmail']= FALSE;
	
	//Used to redirect the user to the correct page
	//if email is not recognized, then user is sent back to login page
	$uri = '';
	
	//If the user was a unique entry within the table
	if($count === 1){
		
		//Store user information in current session
		$_SESSION['validEmail']= TRUE;
		$_SESSION['firstName'] = odbc_result($res, "first_name");
		$_SESSION['lastName'] = odbc_result($res, "last_name");
		$_SESSION['division'] = odbc_result($res, "division");
		$_SESSION['phoneNumber'] = odbc_result($res, "phone_number");
		
		//Sets the URI based on user input
		if($requestType === "Copy Center"){
			$uri = 'copy_center_form/';
		}else if($requestType === "Design"){
			$uri = 'design_form/';
		}else if($requestType === "Audio/Video"){
			$uri = 'av_form/';
		}
	}
	
	//Redirect user to proper page
	header("Location: $host$uri");

?>