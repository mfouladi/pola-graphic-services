<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/pola-graphic-services/";
?>
<?php
	session_start();
	if(isset($_SESSION['validEmail'])){
		$isValidEmail = $_SESSION['validEmail'];
		$portEmail = '';
		if(isset($_SESSION['portEmail'])){
			$portEmail = $_SESSION['portEmail'];
		}
	}else{
		$isValidEmail = TRUE;
	}
	//Unset any previously saved session variables
	session_unset();
?>
<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo $host;?>">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<link rel="stylesheet" type="text/css" href="css/button.css" />
</head>
<body>
	<div id="container">
		<div class="order-header">
			<h1>Graphic Services Request</h1>
		</div>
		<div class="content">		
			<p class="introduction">
				Welcome to the Graphic Services Request form.<br>
				<span>Type in your name and request type to get started.</span>
			</p>
			<form method="post" action="valid_login/user/" class="order-form" id="order">
				<p class="login-error">
					<?php
					if(!$isValidEmail){
						echo "Please Check Your Email and Try Again.";
					}
					?>
				</p>
				
				<label for="portEmail">Port Email <sup>*</sup></label><br />
				<input type="text" name="portEmail" class="order-input" id="portEmail" value="<?php echo $portEmail;?>" /><br />
				<br clear="all" />
				
				<label for="request-type">Request Type <sup>*</sup></label><br />
				<br clear="all" />				
				<input type='submit' name="copyCenter" class='button' value="Copy Center">
				<input type='submit' name="audioVideo" class='button' value="Audio/Video">
				<input type='submit' name="design" class='button' value="Design">
			</form>
			<p class='login_message'>If you are an administrator, <a href="admin_login.php">login in here</a>.</p><br />
				
			<br clear="all" />
		</div>
	</div>
</body>
</html>