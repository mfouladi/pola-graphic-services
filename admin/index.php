<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/pola-graphic-services/";
?>
<?php
	$db_host="POLA-SQLTEST"; // Host name
	$db_user="graphics"; // Mysql username
	$db_pwd="Graphics@service"; // Mysql password
	$db_name="Graphics_Services"; // Database name
	$tbl_name="users"; // Table name
?>
<!DOCTYPE html>
<html>
<head>
	<base href=<?php echo $host;?>>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body>
	<div id="container">
		<div class="order-header">
			<h1>Graphics Service Request</h1>
		</div>
		<div class="content">		
			<p class="introduction">
				This is the admin page.<br>
				<span>Still Under Construction. Coming soon.</span>
			</p>
			<?php
				
				//Connect
				$connection = odbc_connect("Driver={SQL Server};Server=$db_host;Database=$db_name",$db_user,$db_pwd );
				$sql = "SELECT * FROM users";
				$res = odbc_prepare($connection, $sql);
				$success = odbc_execute($res);
				echo "<table>";
					echo "<tr>";
						echo "<td>";
							echo "First Name";
						echo "</td>";
						echo "<td>";
							echo "Last Name";
						echo "</td>";
						echo "<td>";
							echo "Middle Initial";
						echo "</td>";
						echo "<td>";
							echo "Division";
						echo "</td>";
						echo "<td>";
							echo "Email";
						echo "</td>";
						echo "<td>";
							echo "Phone Number";
						echo "</td>";
						echo "<td>";
							echo "Password";
						echo "</td>";
						echo "<td>";
							echo "Access Permissions";
						echo "</td>";
					echo "</tr>";
				while(odbc_fetch_row($res))
				{
					echo "<tr>";
						$nextRow[0] = odbc_result($res, "first_name");
						$nextRow[1] = odbc_result($res, "last_name");
						$nextRow[2] = odbc_result($res, "middle_initial");
						$nextRow[3] = odbc_result($res, "division");
						$nextRow[4] = odbc_result($res, "email");
						$nextRow[5] = odbc_result($res, "phone_number");
						$nextRow[6] = odbc_result($res, "password");
						$nextRow[7] =odbc_result($res, "access_type");
						for($i=0; $i<8; $i+=1)
						{
							if($nextRow[$i] == NULL)
							{
								echo "<td>&nbsp</td>";
							}
							else
							{
								echo "<td>$nextRow[$i]</td>";
							}
						}
					echo "</tr>";
				}
				echo "</table>";
			?>
		</div>
	</div>
</body>
</html>