<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/pola-graphic-services/";
?>
<?php
	/*session_start();
	if(isset($_SESSION['validEmail'])){
		$isValidEmail = $_SESSION['validEmail'];
		$requestType = $_SESSION['requestType'];
		if(!$isValidEmail || $requestType != "Design"){
			header("Location: $host");
			//Unset any previously saved session variables
			session_unset();
		}else{
			$portEmail = '';
			$portEmail = $_SESSION['portEmail'];
		}
	}else{
		header("Location: $host");
	}*/
?>
<!DOCTYPE html>

<html lang="en">
    <head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/dates.js"></script>
		<base href=<?php echo $host;?>>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/form.css"/>
		
        <title></title>
    </head>
    <body>
		<div class="wrapper">
			<div class="header">
				<h1>Design Request Form</h1>
			</div>
			<div class="content">
				<select name="month">
					<option value="1" selected="selected" >January</option>
					<option value="2" >February</option>
					<option value="3" >March</option>
					<option value="4" >April</option>
					<option value="5" >May</option>
					<option value="6" >June</option>
					<option value="7" >July</option>
					<option value="8" >August</option>
					<option value="9" >September</option>
					<option value="10" >October</option>
					<option value="11" >November</option>
					<option value="12" >December</option>
				</select>
				<select name="day">
					<?php
						/*Display Select Menu For Days of the Month*/
						for($day=1;$day<29;$day++){
							echo "<option value=\"$day\">$day</option>";
						}
						for($day=29;$day<=31;$day++){
							echo "<option name=\"added_day\" value=\"$day\">$day</option>";
						}
					?>
					<script>
						monthDayOption();
					</script>
				</select>
				<select name="year">
					 <?php
						$year = (int) date('Y');
						for($i=0;$i<4;$i++){
							echo "<option value=\"$year\">$year</option>";
							$year += 1;
						}
					?>
				</select>
			</div>
        </div>
    </body>
</html>
