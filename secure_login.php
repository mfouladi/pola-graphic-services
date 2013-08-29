<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./index.css" />
	<link rel="stylesheet" type="text/css" href="./button.css" />
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
			<form method="post" action="admin_login.php" class="order-form" id="order">
				<label for="first-name">First Name <sup>*</sup></label><br />
				
				<input type="text" name="first-name" class="order-input" id="first-name" 
				value="<?php echo htmlspecialchars($firstName);?>"/><br />
				
				<br clear="all" />
				
				<label for="last-name">Last Name <sup>*</sup></label><br />
				<input type="text" name="last-name" class="order-input" id="last-name" 
				value="<?php echo htmlspecialchars($lastName);?>"/><br />
				<br clear="all" />
				
				<label for="password">Password<sup>*</sup></label><br />
				<input type="password" name="password" class="order-input" id="password" /><br />
				<br clear="all" />
				
				<br>
				<div class="submit-hold"><input type="submit" name="submit-order" value="Submit" class="submit-order" /></div>
			</form>
			<input type='button' class='button' style="width:80px;height:30px;margin-bottom:10px;background-size: 100% 100%;'" value="Back" onclick="location.href = './index.html'">
		</div>
	</div>
</body>
</html>