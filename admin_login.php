<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/GraphicServices/";
?>
<?php
	session_start();
	
	//Initialize Variables
	$portEmail = '';
	$displayEmailError = False;
	$displayPasswordError = False;
	$displayAccessError = False;
	
	//If User input in an invalid email
	//Display Email Error Message in HTML
	if(isset($_SESSION['validEmail'])){
		$displayEmailError = !$_SESSION['validEmail'];
		$portEmail = '';
		if(isset($_SESSION['portEmail'])){
			$portEmail = $_SESSION['portEmail'];
		}
	}
	
	//If User input in an invalid password
	//Display Password Error Message in HTML
	if(isset($_SESSION['validPassword'])){
		$displayPasswordError = !$_SESSION['validPassword'];
	}
	
	//If User is not allowed access as admin or technician
	//Display Access Error Message in HTML
	if(isset($_SESSION['validAccess'])){
		$displayAccessError = !$_SESSION['validAccess'];
	}
	
	//Unset any previously saved session variables
	session_unset();
?>
<!DOCTYPE html>
<html>
<head>
	<base href=<?php echo $host;?>>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/button.css" />
</head>
<body>
	<div id="container">
		<div class="order-header">
			<h1>Graphics Department Login</h1>
		</div>
		<div class="content">		
			<p class="introduction">
				Welcome to the Graphics Administrative Page.<br>
				<span>Type in your password to start session.</span>
			</p>
			<form method="post" action="valid_login/admin/" class="order-form" id="order">
				<p class="login-error">
					<?php
					if($displayEmailError){
						echo "Please Check Your Email and Try Again.";
					}else if($displayAccessError){
						echo "You have not been granted the privledge to access. Please talk to a Graphics Department Administrator to gain access.";
					}else if($displayPasswordError){
						echo "Please Check Your Password and Try Again."; 
					}
					?>
				</p>
				
				<label for="portEmail">Port Email <sup>*</sup></label><br />
				<input type="text" name="portEmail" class="order-input" id="portEmail" value="<?php echo $portEmail;?>" /><br />
				<br clear="all" />
				
				<label for="password">Password<sup>*</sup></label><br />
				<input type="password" name="password" class="order-input" id="password" /><br />
				<br clear="all" />
				
				<br>
				<div class="submit">
					<input type='submit' name="submit" class='button' value="Submit">
				</div>
			</form>
			
			<div class="back">
				<input type='button' name="back" class='button' value="Back" onclick="location.href = ''">
			</div>
		</div>
	</div>
</body>
</html>