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
				<div class="section table_header" id="admin_header">
					<h1>Admin Table</h1>
					<img src="Images/dropDownArrow.png" id="admin_down" title="false">
				</div>
				
				<div class="section hidden" id="admin_table">
					<table>
						<tr>
							<td>Name</td>
							<td>Division</td>
							<td>Email</td>
							<td>Phone</td>
							<td>Password</td>
							<td>Admin</td>
							<td>Technician</td>
							<td>Receive Email?</td>
						</tr>
						<?php	
							//Connect
							$connection = odbc_connect("Driver={SQL Server};Server=$db_host;Database=$db_name",$db_user,$db_pwd );
							$sql = "SELECT * FROM users WHERE access_type>=64 ORDER BY first_name";
							$res = odbc_prepare($connection, $sql);
							$success = odbc_execute($res);
							while(odbc_fetch_row($res))
							{
								echo "<tr>";
									$middle_initial = odbc_result($res, "middle_initial");
									if($middle_initial === NULL){
										$middle_initial = " ";
									}else{
										$middle_initial=" ".$middle_initial." ";
									}
									$nextRow[0] = odbc_result($res, "first_name").$middle_initial.odbc_result($res, "last_name");
									$nextRow[1] = odbc_result($res, "division");
									$nextRow[2] = odbc_result($res, "email");
									$nextRow[3] = odbc_result($res, "phone_number");
									$nextRow[4] = odbc_result($res, "password");
									$access_type =odbc_result($res, "access_type");
									$av = $copy = $design = FALSE;
									$av_email = $copy_email = $design_email = FALSE;
									if( ($access_type & 0b11) > 0){
										$av = TRUE;
										if(($access_type & 0b11) > 1){
											$av_email = TRUE;
										}
									}
									if( (($access_type>>2)&0b11) > 0){
										$copy = TRUE;
										if((($access_type>>2)&0b11) > 1){
											$copy_email = TRUE;
										}
									}
									if( (($access_type>>4)&0b11) > 0){
										$design = TRUE;
										if((($access_type>>4)&0b11) > 1){
											$design_email = TRUE;
										}
									}
									
									for($i=0; $i<8; $i+=1){
										if($i===4){
											echo "<td><input type='password' value='$nextRow[$i]'></td>";
										}else if($i===5){
											echo "<td><input type='checkbox' checked></td>";
										}else if($i===6){
											echo "<td><select multiple><option";
											if($av){echo " selected";}
											echo ">A/V</option><option";
											if($copy){echo " selected";}
											echo ">Copy Center</option><option";
											if($design){echo " selected";}
											echo ">Design</option></select> </td>";
										}else if($i===7){
											echo "<td><select multiple><option";
											if($av_email){echo " selected";}
											echo ">A/V</option><option";
											if($copy_email){echo " selected";}
											echo ">Copy Center</option><option";
											if($design_email){echo " selected";}
											echo ">Design</option></select> </td>";
										}else if($nextRow[$i] === NULL){
											echo "<td>&nbsp</td>";
										}else {
											echo "<td>$nextRow[$i]</td>";
										}
									}
								echo "</tr>";
							}
						?>
					</table>
				</div>
				
				<div class="section table_header" id="tech_header">
					<h1>Technician Table</h1>
					<img src="Images/dropDownArrow.png" id="tech_down" title="false">
				</div>
				
				<div class="section hidden" id="tech_table">
					<table>
						<tr>
							<td>Name</td>
							<td>Division</td>
							<td>Email</td>
							<td>Phone</td>
							<td>Password</td>
							<td>Admin</td>
							<td>Technician</td>
							<td>Receive Email?</td>
						</tr>
						<?php	
							$sql = "SELECT * FROM users WHERE access_type<64 AND access_type>0 ORDER BY first_name";
							$res = odbc_prepare($connection, $sql);
							$success = odbc_execute($res);
							while(odbc_fetch_row($res))
							{
								echo "<tr>";
									$middle_initial = odbc_result($res, "middle_initial");
									if($middle_initial === NULL){
										$middle_initial = " ";
									}else{
										$middle_initial=" ".$middle_initial." ";
									}
									$nextRow[0] = odbc_result($res, "first_name").$middle_initial.odbc_result($res, "last_name");
									$nextRow[1] = odbc_result($res, "division");
									$nextRow[2] = odbc_result($res, "email");
									$nextRow[3] = odbc_result($res, "phone_number");
									$nextRow[4] = odbc_result($res, "password");
									$access_type =odbc_result($res, "access_type");
									$av = $copy = $design = FALSE;
									$av_email = $copy_email = $design_email = FALSE;
									if( ($access_type & 0b11) > 0){
										$av = TRUE;
										if(($access_type & 0b11) > 1){
											$av_email = TRUE;
										}
									}
									if( (($access_type>>2)&0b11) > 0){
										$copy = TRUE;
										if((($access_type>>2)&0b11) > 1){
											$copy_email = TRUE;
										}
									}
									if( (($access_type>>4)&0b11) > 0){
										$design = TRUE;
										if((($access_type>>4)&0b11) > 1){
											$design_email = TRUE;
										}
									}
									
									for($i=0; $i<8; $i+=1){
										if($i===4){
											echo "<td><input type='password' value='$nextRow[$i]'></td>";
										}else if($i===5){
											echo "<td><input type='checkbox'></td>";
										}else if($i===6){
											echo "<td><select multiple><option";
											if($av){echo " selected";}
											echo ">A/V</option><option";
											if($copy){echo " selected";}
											echo ">Copy Center</option><option";
											if($design){echo " selected";}
											echo ">Design</option></select> </td>";
										}else if($i===7){
											echo "<td><select multiple><option";
											if($av_email){echo " selected";}
											echo ">A/V</option><option";
											if($copy_email){echo " selected";}
											echo ">Copy Center</option><option";
											if($design_email){echo " selected";}
											echo ">Design</option></select> </td>";
										}else if($nextRow[$i] === NULL){
											echo "<td>&nbsp</td>";
										}else {
											echo "<td>$nextRow[$i]</td>";
										}
									}
								echo "</tr>";
							}
						?>
					</table>
				</div>
				
				<div class="section table_header" id="user_header">
					<h1>User Table</h1>
					<img src="Images/dropDownArrow.png" id="user_down" title="false">
				</div>
				
				<div class="section hidden" id="user_table">
					<table>
						<tr>
							<td>Name</td>
							<td>Division</td>
							<td>Email</td>
							<td>Phone</td>
							<td>Password</td>
							<td>Admin</td>
							<td>Technician</td>
							<td>Receive Email?</td>
						</tr>
							<?php	
							$sql = "SELECT * FROM users WHERE access_type=0 ORDER BY first_name";
							$res = odbc_prepare($connection, $sql);
							$success = odbc_execute($res);
							while(odbc_fetch_row($res))
							{
								echo "<tr>";
									$middle_initial = odbc_result($res, "middle_initial");
									if($middle_initial === NULL){
										$middle_initial = " ";
									}else{
										$middle_initial=" ".$middle_initial." ";
									}
									$nextRow[0] = odbc_result($res, "first_name").$middle_initial.odbc_result($res, "last_name");
									$nextRow[1] = odbc_result($res, "division");
									$nextRow[2] = odbc_result($res, "email");
									$nextRow[3] = odbc_result($res, "phone_number");
									$nextRow[4] = odbc_result($res, "password");
									$access_type =odbc_result($res, "access_type");
									$av = $copy = $design = FALSE;
									$av_email = $copy_email = $design_email = FALSE;
									if( ($access_type & 0b11) > 0){
										$av = TRUE;
										if(($access_type & 0b11) > 1){
											$av_email = TRUE;
										}
									}
									if( (($access_type>>2)&0b11) > 0){
										$copy = TRUE;
										if((($access_type>>2)&0b11) > 1){
											$copy_email = TRUE;
										}
									}
									if( (($access_type>>4)&0b11) > 0){
										$design = TRUE;
										if((($access_type>>4)&0b11) > 1){
											$design_email = TRUE;
										}
									}
									
									for($i=0; $i<8; $i+=1){
										if($i===4){
											echo "<td><input type='password' value='$nextRow[$i]'></td>";
										}else if($i===5){
											echo "<td><input type='checkbox'></td>";
										}else if($i===6){
											echo "<td><select multiple><option";
											if($av){echo " selected";}
											echo ">A/V</option><option";
											if($copy){echo " selected";}
											echo ">Copy Center</option><option";
											if($design){echo " selected";}
											echo ">Design</option></select> </td>";
										}else if($i===7){
											echo "<td><select multiple><option";
											if($av_email){echo " selected";}
											echo ">A/V</option><option";
											if($copy_email){echo " selected";}
											echo ">Copy Center</option><option";
											if($design_email){echo " selected";}
											echo ">Design</option></select> </td>";
										}else if($nextRow[$i] === NULL){
											echo "<td>&nbsp</td>";
										}else {
											echo "<td>$nextRow[$i]</td>";
										}
									}
								echo "</tr>";
							}
						?>
					</table>
				</div>
				
			</div>
		</div>
	</div>
	
	<script src="js/jquery.js"></script>
	<script>
		$("#admin_down").on("click", function() {
			var isDown = $("#admin_down").attr("title");
			if(isDown === "false"){
				$("#admin_down").attr("title", "true");
				$("#admin_table").css("display","block");
				$("#admin_down").attr("src", "Images/pullUpArrow.png");
			}else{
				$("#admin_down").attr("title", "false");
				$("#admin_table").css("display","none");
				$("#admin_down").attr("src", "Images/dropDownArrow.png");
			}
		});
		$("#tech_down").on("click", function() {
			var isDown = $("#tech_down").attr("title");
			if(isDown === "false"){
				$("#tech_down").attr("title", "true");
				$("#tech_table").css("display","block");
				$("#tech_down").attr("src", "Images/pullUpArrow.png");
			}else{
				$("#tech_down").attr("title", "false");
				$("#tech_table").css("display","none");
				$("#tech_down").attr("src", "Images/dropDownArrow.png");
			}
		});
		$("#user_down").on("click", function() {
			var isDown = $("#user_down").attr("title");
			if(isDown === "false"){
				$("#user_down").attr("title", "true");
				$("#user_table").css("display","block");
				$("#user_down").attr("src", "Images/pullUpArrow.png");
			}else{
				$("#user_down").attr("title", "false");
				$("#user_table").css("display","none");
				$("#user_down").attr("src", "Images/dropDownArrow.png");
			}
		});
			
	</script>
	
</body>
</html>