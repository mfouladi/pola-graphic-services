<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/pola-graphic-services/";
?>
<?php
	session_start();
	if(isset($_SESSION['validEmail'])){
		$isValidEmail = $_SESSION['validEmail'];
		$requestType = $_SESSION['requestType'];
		if(!$isValidEmail || $requestType != "Copy Center"){
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
				<h1>Copy Center Request Form</h1>
			</div>
			<div class="content">
				<div class="table_wrapper">
				
					<form action="copy_center_form/copy_center_submit.php" method="post">
					
						<div class="section" id="job_name">
							<b>Job Name</b>
							<input type="text" name="project_title">
						</div>
						
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
						
						<table class="" id="CopyDetails">
							<tr>
								<td colspan="2">
									# of Copies:
									<input class="third"  type="text" name="copy_amount">
								</td>
								<td colspan="3">
									Print On:
									<input type="radio" name="bf_print" id="one-sided" value= "one-sided">
									<label for="one-sided"> 1-sided</label>
									<input type="radio" name="bf_print" id="two-sided" value= "two-sided">
									<label for="two-sided">2-sided</label>
								</td>
								<td>
									# of Originals:
									<input class="third" type="text" name="original_amount">
								</td>
							</tr>
						</table>
						
						<table class="" id="PaperOptions">
							<td>
								Paper Size
								<ul>
									<li>
										<input type="radio" name="paper_size" id="s8x11" value= "8.5x11">
										<label for="s8x11">8 1/2" x 11"</label>
									</li>
									<li>
										<input type="radio" name="paper_size" id="s8x14" value= "8.5x14">
										<label for="s8x14">8 1/2" x 14"</label>
									</li>
									<li>
										<input type="radio" name="paper_size" id="s11x17" value= "11x17">
										<label for="s11x17">11" x 17"</label>
									</li>
								</ul>
							</td>
							
							<td>
								Stock Specifications
								<ul>
									<li>
										<input type="checkbox" name="stock_spec" id="bond_white_20lb" value= "">
										<label for="bond_white_20lb">20 lb. Bond White</label>
									</li>
									<li>
										<input type="checkbox" name="stock_spec" id="letterhead" value= "">
										<label for="letterhead">Letterhead</label>
									</li>
									<li>
										<input type="checkbox" name="stock_spec" id="stock_spec_other" value= "">
										<label for="stock_spec_other">Other</label>
										<input type="text" name="">
									</li>
								</ul>
							</td>
							
							<td>
								20 lb. Color Stock
								<ul>
									<li>
										<input type="checkbox" name="color_stock" id="color_stock_green" value= "Green">
										<label for="color_stock_green">Green</label>
									</li>
									<li>
										<input type="checkbox" name="color_stock" id="color_stock_blue" value= "Blue">
										<label for="color_stock_blue">Blue</label>
									</li>
									<li>
										<input type="checkbox" name="color_stock" id="color_stock_canary" value= "Canary">
										<label for="color_stock_canary">Canary</label>
									</li>
									<li>
										<input type="checkbox" name="color_stock" id="color_stock_pink" value= "Pink">
										<label for="color_stock_pink">Pink</label>
									</li>
								</ul>
							</td>
						</table>
						
						<h3>Finishing Operations</h3>
						
						<table class="" id="FinishingOptions">		
							<td>
								Binding
								<ul>
									<li>
										<input type="radio" name="binding" id="collate" value= "Collate">
										<label for="collate">Collate</label>
									</li>
									<li>
										<input type="radio" name="binding" id="staple" value= "Staple">
										<label for="staple">Staple</label>
									</li>
									<li>
										<input type="radio" name="binding" id="laminate" value= "Laminate">
										<label for="laminate">Laminate</label>
									</li>
									<li>
										<input type="radio" name="binding" id="spiralbound" value= "Spiral-Bound">
										<label for="spiralbound">Spiral-Bound</label>
									</li>
									<li>
										<input type="radio" name="binding" id="velobound" value= "Velo-Bound">
										<label for="velobound">Velo-Bound</label>
									</li>
									<li>
										<input type="radio" name="binding" id="tapebound" value= "Tape-Bound">
										<label for="tapebound">Tape-Bound</label>
									</li>
								</ul>
							</td>
							
							<td>
								Pad
								<ul>
									<li>
										<input type="radio" name="pad" id="pad_fifty" value= "50">
										<label for="pad_fifty">50</label>
									</li>
									<li>
										<input type="radio" name="pad" id="pad_hundred" value= "100">
										<label for="pad_hundred">100</label>
									</li>
									<li>	
										<input type="radio" name="pad" id="pad_trim" value= "Finishing Trim">
										<label for="pad_trim">Finishing Trim</label>
									</li>
								</ul>
							</td>
							
							<td>
								Hole Punch
								<ul>
									<li>
										<input type="radio" name="hole_punch" id="hole_punch_two" value= "2">
										<label for="hole_punch_two">2</label>
									</li>
									<li>
										<input type="radio" name="hole_punch" id="hole_punch_three" value= "3">
										<label for="hole_punch_three">3</label>
									</li>
								</ul>
							</td>
							
							<td>
								Fold
								<ul>
									<li>
										<input type="radio" name="fold" id="fold_letter" value= "Letter">
										<label for="fold_letter">Letter</label>
									</li>
									<li>
										<input type="radio" name="fold" id="fold_z" value= "Z Fold">
										<label for="fold_z">Z Fold</label>
									</li>
									<li>								
										<input type="radio" name="fold" id="fold_single" value= "Single (1/2)">
										<label for="">Single (1/2)</label>
									</li>	
								</ul>
							</td>
						</table>
									
						<table class="" id="PrintingOptions">
							<tr>
								<td>
									SCAN to File (printing):
									<label for="scan_originals"># of Originals</label> 
									<input class="third" type="text" name="scan_originals">
								</td>
								<td>
									Format:
									<input type="radio" name="scan_format" id="scan_jpg" value= "jpg">
									<label for="scan_jpg"> jpg </label>
									<input type="radio" name="scan_format" id="scan_pdf" value= "pdf">
									<label for="scan_pdf"> pdf </label>
									<input type="radio" name="scan_format" id="scan_other" value= "other">
									<label for="scan_other"> other </label>
									<input class="third" type="text" name="scan_other_text">
								</td>
							</tr>
							
							<tr>
								<td>
									SCAN & Email To:
									<input class="third" type="text" name="scan_email">
								</td>
								<td>
									Save To:
									<input type="radio" name="save_format" id="save_cd" value= "cd">
									<label for="save_cd"> CD </label>
									<input type="radio" name="save_format" id="save_dvd" value= "dvd">
									<label for="save_dvd"> DVD </label>
									<input type="radio" name="save_format" id="save_other" value= "other">
									<label for="save_other"> other </label>
									<input class="third"  type="text" name="save_other_text">
								</td>
							</tr>
						</table>
						
						<h4>Additional Information (Optional)</h4>
						<textarea class="" name="additional_info"></textarea>
						
						
						<div class="submit">
							<input type='submit' name="submit" class='button' value="Submit">
						</div>
						
						<div class="back">
							<input type='button' name="back" class='button' value="Back" onclick="location.href = ''">
						</div>
						
					</form>
					
				</div>
			</div>
		</div>
    </body>
</html>


