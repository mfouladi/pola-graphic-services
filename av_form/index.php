<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/pola-graphic-services/";
?>
<?php
	session_start();
	if(isset($_SESSION['validEmail'])){
		$isValidEmail = $_SESSION['validEmail'];
		$requestType = $_SESSION['requestType'];
		if(!$isValidEmail || $requestType != "Audio/Video"){
			header("Location: $host");
			//Unset any previously saved session variables
			session_unset();
		}else{
			$portEmail = '';
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
					<h1>Job Name</h1>
					<input type="text" name="project_title">
				</div>
				
				<div class="section" id="select_date_time">
					<h1>Date Due</h1>
					<b>Date:</b>
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
					
					<label for="still_camera"><b>Still Camera:</b></label>
					<input type="checkbox" name="still_camera">
					
					<label for="video_camera"><b>Video Camera:</b></label>
					<input type="checkbox" name="video_camera">
					
					<label for="data_projector"><b>Data Projector - for Powerpoint, etc:</b></label>
					<input type="checkbox" name="data_projector">
					
					<label for="projection_screen"><b>Projection Screen:</b></label>
					<input type="checkbox" name="projection_screen">
					
					<label for="laser_pointer"><b>Laser Pointer:</b></label>
					<input type="checkbox" name="laser_pointer">
					
					<label for="clicker"><b>Clicker:</b></label>
					<input type="checkbox" name="clicker">
					
					<label for="power_cord"><b>Power Extension Cord/Power Strip:</b></label>
					<input type="checkbox" name="power_cord">
					
					<label for="dry_erase_board"><b>Dry Erase Board:</b></label>
					<input type="checkbox" name="dry_erase_board">
					
					<label for="paper_flip_chart"><b>Paper Flip Chart:</b></label>
					<input type="checkbox" name="paper_flip_chart">
					
					<label for="easels"><b>Easels:</b></label>
					<input type="checkbox" name="easels">
				
				</div>
				
				<div class="section" id="service_request">
					<h1>Service Request</h1>	
					
					<label for="exhibit"><b>Exhibit/Display:</b></label>
					<input type="checkbox" name="exhibit">
					
					<label for="sound_system"><b>Sound System - Speakers - Microphones:</b></label>
					<input type="checkbox" name="sound_system">
					
					<label for="av_setup"><b>AV Setup:</b></label>
					<input type="checkbox" name="av_setup">
					
					<label for="Photogrpahy"><b>Photography:</b></label>
					<input type="checkbox" name="">
					
					<label for="video_production"><b>Video Production:</b></label>
					<input type="checkbox" name="video_production">
					
				</div>
				
				<div class="section" id="add_details">
					<h1>Other/Additional Details</h1>
					<textarea name="add_details" rows="6" cols="70"></textarea>
				</div>
				
				<div class="submit">
					<input type='submit' name="submit" class='button' value="Submit">
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