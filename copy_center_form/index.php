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
					<form action="" method="post">
					
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
						
					</form>
					
				</div>
			</div>
		</div>
    </body>
</html>"


