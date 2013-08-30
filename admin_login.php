<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/pola-graphic-services/";
?>
<?php
	session_start();
	if(isset($_SESSION['validName'])){
		$isValidName = $_SESSION['validName'];
		$firstName = '';
		$lastName = '';
		if(isset($_SESSION['firstName'])){
			$firstName = $_SESSION['firstName'];
		}
		if(isset($_SESSION['lastName'])){
			$lastName = $_SESSION['lastName'];
		}
	}else{
		$isValidName = TRUE;
	}
	if(isset($_SESSION['validPassword'])){
		$isValidPassword = $_SESSION['validPassword'];
	}else{
		$isValidPassword = TRUE;
	}
	if(isset($_SESSION['validAccess'])){
		$isValidAccess = $_SESSION['validAccess'];
	}else{
	}
	
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
					if(!$isValidName){
						echo "Please Check Your Name and Try Again.";
					}else if(!$isValidAccess){
						echo "You have not been granted the privledge to access. Please talk to a Graphics Department Administrator to gain access.";
					}else if(!$isValidPassword){
						echo "Please Check Your Password and Try Again."; 
					}
					?>
				</p>
				<label for="first-name">First Name <sup>*</sup></label><br />
				
				<input type="text" name="first-name" class="order-input" id="first-name" value="<?php echo $firstName;?>"/><br />
				
				<br clear="all" />
				
				<label for="last-name">Last Name <sup>*</sup></label><br />
				<input type="text" name="last-name" class="order-input" id="last-name" value="<?php echo $lastName;?>"/><br />
				<br clear="all" />
				
				<label for="password">Password<sup>*</sup></label><br />
				<input type="password" name="password" class="order-input" id="password" /><br />
				<br clear="all" />
				
				<br>
				<div class="submit-hold"><input type="submit" name="submit-order" value="Submit" class="submit-order" /></div>
			</form>
			<input type='button' class='button' style="width:80px;height:30px;margin-bottom:10px;background-size: 100% 100%;'" value="Back" onclick="location.href = ''">
		</div>
	</div>
</body>
</html>