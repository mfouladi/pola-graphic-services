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
	$input_password=$_POST['password'];
	
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
	
	//User is only granted access if their email is in the database,
	//They are allowed admin or technician access, and their password
	//is correct
	$_SESSION['validEmail']= FALSE;
	$_SESSION['validAccess']= FALSE;
	$_SESSION['validPassword']= FALSE;
	
	//Used to redirect the user to the correct page
	//if email is not recognized, then user is sent back to admin login page
	$uri = 'admin_login.php';
	
	//If the user was a unique entry within the table
	if($count === 1){
		$_SESSION['validEmail']= TRUE;
		$accessType = odbc_result($res, "access_type");
		
		//if user has correct priveldges, they will be greater than 0
		if($accessType > 0){
			$_SESSION['validAccess']= TRUE;
			
			//Store user information in current session
			$_SESSION['firstName'] = odbc_result($res, "first_name");
			$_SESSION['lastName'] = odbc_result($res, "last_name");
			$_SESSION['division'] = odbc_result($res, "division");
			$_SESSION['phoneNumber'] = odbc_result($res, "phone_number");
			
			//Get the password that is in the database for current user
			$real_password = odbc_result($res, "password");
			
			//If password has not been set up yet
			if($real_password === NULL){
				$real_password = "";
				//Should set up password for future access
				//Or be given an error telling them to ask admin to
				//set up a password for them
			}
			//If passwrods match, allow access to admin page
			if($real_password === $input_password){
				$_SESSION['validPassword']= TRUE;
				$uri = 'admin/';
			}
			
		}	
	}
	//Redirect user to proper page
	header("Location: $host$uri");	

?>