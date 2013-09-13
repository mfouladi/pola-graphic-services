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
		if(!$isValidEmail || $requestType != "Design"){
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
				<h1>Design Request Form</h1>
			</div>
			<div class="content">
				
				<form action="design_form/design_submit.php" method="post">
				
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
					</div>
							
					<div class="section" id="type_of_design">
						<b>Design Type</b>
						<select name="design_type">
							<option value="" ></option>
							<option value="ad" >Ad</option>
							<option value="banner" >Banner</option>
							<option value="brochure" >Brochure</option>
							<option value="business_cards" >Business Cards</option>
							<option value="flyer" >Flyer</option>
							<option value="large_format_printing" >Large Format Printing</option>
							<option value="mounting" >Mounting</option>
						</select>
						<label class="hidden" for="mounting_option" id="mounting_option_label"><b>With Mounting?:</b></label>
						<input class="hidden" type="checkbox" name="mounting_option" id="mounting_option">
					</div>
					
					<div class="section hidden" id="size_quantity">
						<label for="width"><b>Width:</b></label>
						<input type="text" name="width" id="width">
						x <label for="height"><b>Height:</b></label>
						<input type="text" name="height" id="height">
						<label for="quantity"><b>Quantity:</b></label>
						<input type="text" name="quantity" id="quantity">
					</div>
					
					<div class="section hidden" id="color_options">
						<b>Color Options</b>
						
						<label for="color"><b>Color:</b></label>
						<input type="radio" value="true" name="isColor" id="color">
						
						<label for="black_white"><b>Black/White:</b></label>
						<input type="radio" value="false" name="isColor" id="black_white">
						
						<label class="hidden" for="specify_color" id="specify_color_label"><b>Specify Color:</b></label>
						<input class="hidden" type="text" name="specify_color" id="specify_color">
						
					</div>
					
					<div class="section hidden" id="add_details">
						<b>Additional Details</b>
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
   </body>
	
	<script src="js/jquery.js"></script>
	<script src="js/dates.js"></script>
	
	<script>
		
		$("select[name=month]").change(function() {
			monthDayOption();
		});
		
		$("select[name=year]").change(function() {
			monthDayOption();
		});
		
		$("select[name=design_type]").on("click", function() {
			$(".hidden").css("display", "none");
			var design_type = $('select[name=design_type] option:selected').val();
			switch(design_type){
				case "large_format_printing":
					$("#mounting_option").css("display", "inline");
					$("#mounting_option_label").css("display","inline");
				case "ad":
				case "banner":
				case "brochure":
				case "flyer":
					$("#size_quantity").css("display", "block");
					$("#color_options").css("display","block");
					$("#add_details").css("display", "block");
					break;
				case "business_cards":
				case "mounting":
					$("#add_details").css("display", "block");
					break;
				
			}
		});
		
		$("input[name=isColor]").on('click',function() {
			var color_option = $("input[name=isColor]:checked").val();
			if( color_option == "true" ){
				$("#specify_color").css("display","inline");
				$("#specify_color_label").css("display","inline");
			}else{
				$("#specify_color").css("display","none");
				$("#specify_color_label").css("display","none");
			}
		});
	
	</script>

</html>
