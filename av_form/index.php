<?php
	$host = "http://".$_SERVER['HTTP_HOST']."/pola-graphic-services/";
?>
<?php
	/*session_start();
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
	}*/
?>
<!DOCTYPE html>

<html lang="en">
    <head>
		<base href=<?php echo $host;?>>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/form.css"/>
        <title></title>
    </head>
    <body>
		<div class="wrapper">
			<div class="header">
				<h1>Audio/Video Request Form</h1>
			</div>
			<div class="content">
			
			</div>
        </div>
    </body>
</html>