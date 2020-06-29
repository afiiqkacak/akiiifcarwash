<!DOCTYPE html>
<html lang="en">
<head>
	<title>AKIF CARWASH</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="icon" href="akif.png" type="image/gif">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('shining-car.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="ic" placeholder="IC No.">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password" maxlength="8">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<input class="login100-form-btn" name="login" type="submit" value="Login" />
							
						
					</div>
					<div  style="text-align: center;">
					<a href="forget.php">Forgot Password</a></i></div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

</body>

<?php 
$session_lifetime = 3600 * 24 * 2; // 2 days
session_set_cookie_params ($session_lifetime);
session_start();
include('connection/connect.php');
		if(isset($_GET['login'])){
			$ic = $_GET['ic'];
			$hash = $_GET['pass'];
			$sql = "SELECT * FROM staff WHERE ic='$ic' AND password='$hash'";
			$execute=mysqli_query($connect, $sql) or die (mysqli_error($connect));

				if(mysqli_num_rows($execute)>0){
					while($row = mysqli_fetch_assoc($execute)) {
						$_SESSION ['staff_id'] = $row ["staff_id"];
						$_SESSION ['ic'] = $row ["ic"];
						$_SESSION ['name'] = $row ["name"];
						$_SESSION ['address'] = $row ["address"];
						$_SESSION ['role'] = $row ["role"];
						$_SESSION ['phone_number'] = $row ["phone_number"];
						$_SESSION ['password'] = $row ["password"];
						$_SESSION ['question'] = $row ["question"];
						echo "<script>alert('Welcome ".$_SESSION ['name']."!');</script>";
						echo"<meta http-equiv='refresh' content='0; url=dashboard.php'/>";
						if ($_SESSION ['password'] == '123'){
							echo "<script>alert('You are currently using the default password. Please change it ASAP.');</script>";
							echo"<meta http-equiv='refresh' content='0; url=dashboard.php'/>";
							if($_SESSION ['question'] == NULL){
							echo "<script>alert('Please update your security question.');</script>";
							echo"<meta http-equiv='refresh' content='0; url=dashboard.php'/>";
							}
						}elseif($_SESSION ['question'] == NULL){
							echo "<script>alert('Please update your security question.');</script>";
							echo"<meta http-equiv='refresh' content='0; url=dashboard.php'/>";
						}

					}
					}else{
						echo "<script>alert('Wrong IC or password.');</script>";
						echo "<meta http-equiv='refresh' content='0; url=loginpage.php'/>";

						}		
			}

?>

</html>