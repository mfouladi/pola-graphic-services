<?php
	session_start();
	if(isset($_SESSION['firstName']) && isset($_SESSION['lastName'])){
		$firstName = $_SESSION['firstName'];
		$lastName = $_SESSION['lastName'];
		$requestType = $_SESSION['requestType'];
	
		echo "<p>Welcome $firstName $lastName</p>";
		echo "<p>Your Request Type was $requestType</p>";
		unset($_SESSION['firstName']); 
		unset($_SESSION['lastName']); 
		unset($_SESSION['requestType']);
	}else{
		echo "<p>no</p>";
	}
	session_destroy();
?>

<html>
	<head>
	</head>
	<body>
		<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
			<tr>
				<form name="form1" method="post" action="./check_login.php">
					<td>
						<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
							<tr>
								<td colspan="3"><strong>Member Login </strong></td>
							</tr>
							<tr>
								<td width="78">First Name</td>
								<td width="6">:</td>
								<td width="294"><input name="firstName" type="text" id="firstName"> </td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td>:</td>
								<td><input name="lastName" type="text" id="lastName"></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input type="submit" name="Submit" value="Login"></td>
							</tr>
						</table>
					</td>
				</form>
			</tr>
		</table>
	</body>
</html>