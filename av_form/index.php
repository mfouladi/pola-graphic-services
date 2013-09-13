<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/GraphicServices/";
?>
<?php
	session_start();
	
	//Initialize Variables
	$portEmail = '';
	
	//If Email is Valid and Request Type
	//Matches current page, stay on this page
	//Otherwise go back to the login page
	if(isset($_SESSION['validEmail'])){
		$isValidEmail = $_SESSION['validEmail'];
		$requestType = $_SESSION['requestType'];
		if(!$isValidEmail || $requestType != "Audio/Video"){
			header("Location: $host");
			//Unset any previously saved session variables
			session_unset();
		}else{
			$portEmail = $_SESSION['portEmail'];
		}
	}else{
		header("Location: $host");
	}
?>
<!DOCTYPE html>

<html lang="en">
    <head>
		<base href=<?php echo $host;?>>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/form.css"/>
		<link rel="stylesheet" type="text/css" href="css/button.css" />
        <title></title>
    </head>
    <body>
		<div class="wrapper">
			<div class="header">
				<h1>Audio/Video Request Form</h1>
			</div>
			<div class="content">
						
				<div class="section" id="job_name">
					<b>Job Name</b>
					<input type="text" name="project_title">
				</div>
				
				<form action="av_form/av_submit.php" method="post">
				
					<div class="section" id="select_date_time">
						<b>Date Due:</b>
						<select name="month">
							<option value="1" >January</option>
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
									echo "<option value=\"$day\">$day</option>\n\t\t\t\t\t\t";
								}
								for($day=29;$day<=31;$day++){
									echo "<option name=\"added_day\" value=\"$day\">$day</option>\n\t\t\t\t\t\t";
								}
							?>
						</select>
						<select name="year">
							 <?php
								$year = (int) date('Y');
								for($i=0;$i<4;$i++){
									echo "<option value=\"$year\">$year</option>\n\t\t\t\t\t\t";
									$year += 1;
								}
							?>
						</select>
						<b>Time:</b>
						<select name="hour">
							<?php
								for($hour=1;$hour<=12;$hour++){
									$hr_str = number_format((float)$hour);
									$hr_str = str_pad ( $hr_str, 2, $pad_string = "0", $pad_type = STR_PAD_LEFT );
									echo "<option value=\"$hr_str\">$hr_str</option>\n\t\t\t\t\t\t";
								}
							?>
						</select>
						<select name="minute">
							<?php
								for($minute=0;$minute<60;$minute+=5){
									$min_str = number_format((float)$minute);
									$min_str = str_pad ( $min_str, 2, $pad_string = "0", $pad_type = STR_PAD_LEFT );
									echo "<option value=\"$min_str\">$min_str</option>\n\t\t\t\t\t\t";
								}
							?>
						</select>
						<select name="ampm">
							<option value="am" >AM</option>
							<option value="pm" >PM</option>
						</select>
					</div>
					
					<div class="section" id="equipment_request">
						<h1>Equipment Checkout Request</h1>
						
						<table>
							<tr>
								<td>
									<input type="checkbox" id="still_camera">
								</td>
								<td>
									<label for="still_camera"><b>Still Camera</b></label>
								</td>
								
								<td>
									<input type="checkbox" id="video_camera">
								</td>
								<td>
									<label for="video_camera"><b>Video Camera</b></label>
								</td>
								<td>
									<input type="checkbox" id="data_projector">
								</td>
								<td>
									<label for="data_projector"><b>Data Projector - for Powerpoint, etc</b></label>
								</td>
							</tr>
							
							<tr>
								<td>
									<input type="checkbox" id="projection_screen">
								</td>
								<td>
									<label for="projection_screen"><b>Projection Screen</b></label>
								</td>
								<td>
									<input type="checkbox" id="laser_pointer">
								</td>
								<td>
									<label for="laser_pointer"><b>Laser Pointer</b></label>
								</td>
								<td>
									<input type="checkbox" id="clicker">
								</td>
								<td>
									<label for="clicker"><b>Clicker</b></label>
								</td>
							</tr>
							
							<tr>
								<td>
									<input type="checkbox" id="power_cord">
								</td>
								<td>
									<label for="power_cord"><b>Power Extension Cord/Power Strip</b></label>
								</td>
								<td>
									<input type="checkbox" id="dry_erase_board">
								</td>
								<td>
									<label for="dry_erase_board"><b>Dry Erase Board</b></label>
								</td>
								<td>
									<input type="checkbox" id="paper_flip_chart">
								</td>
								<td>
									<label for="paper_flip_chart"><b>Paper Flip Chart</b></label>
								</td>
							</tr>
							
							<tr>
								<td>
									<input type="checkbox" id="easels">
								</td>
								<td>
									<label for="easels"><b>Easels</b></label>
								</td>
							</tr>
						
						</table>
					
					</div>
					
					<div class="section" id="service_request">
						<h1>Service Request</h1>	
						
						<table>
						
							<tr>
								<td>
									<input type="checkbox" id="exhibit">
								</td>
								<td>
									<label for="exhibit"><b>Exhibit/Display</b></label>
								</td>
								<td>
									<input type="checkbox" id="sound_system">
								</td>
								<td>
									<label for="sound_system"><b>Sound System - Speakers - Microphones</b></label>
								</td>
								<td>
									<input type="checkbox" id="av_setup">
								</td>
								<td>
									<label for="av_setup"><b>AV Setup</b></label>
								</td>
							</tr>
							
							<tr>
								<td>
									<input type="checkbox" id="">
								</td>
								<td>
									<label for="Photogrpahy"><b>Photography</b></label>
								</td>
								<td>
									<input type="checkbox" id="video_production">
								</td>
								<td>
									<label for="video_production"><b>Video Production</b></label>
								</td>
							</tr>
						
						</table>
					</div>
					
					<div class="section" id="add_details">
						<h1>Other/Additional Details</h1>
						<textarea name="add_details" rows="6" cols="70"></textarea>
					</div>
					
					<div class="submit">
						<input type='submit' name="submit" class='button' value="Submit">
					</div>
					
				</form>
				
				<div class="back">
					<input type='button' name="back" class='button' value="Back" onclick="location.href = ''">
				</div>
				
			</div>
        </div>
	
	<script src="js/jquery.js"></script>
	<script src="js/dates.js"></script>
	
	<script>
		
		$("select[name=month]").change(function() {
			monthDayOption();
		});
		
		$("select[name=year]").change(function() {
			monthDayOption();
		});
		
	</script>
	
    </body>
</html>