<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/GraphicServices/";
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
	<link rel="stylesheet" type="text/css" href="css/admin.css" />
	<link rel="stylesheet" type="text/css" href="css/button.css" />

	<title></title>
</head>
<body>
	<div class = "container">
		<div class="nav">
			<ul>
				<a href="admin/" title=""><li>Home</li></a>
				<a href="admin/" title=""><li>Current Jobs</li></a>
				<a href="admin/" title=""><li>New Requests</li></a>
				<a href="admin/users.php" title=""><li>User Management</li></a>
				<a href="admin/" title=""><li>Completed Jobs</li></a>
				<a href="admin/" title=""><li>Archive</li></a>
			</ul>
		</div>
		<div class="wrapper">
			<div class="header">
				<h1>Graphics Service Request</h1>
			</div>
			<div class="content">		
				<p class="introduction">
					This is the admin page.<br>
					<span>Still Under Construction. Coming soon.</span>
				</p>
			</div>
		</div>
	</div>
</body>
</html>