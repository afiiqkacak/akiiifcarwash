<!DOCTYPE html>
<html lang="en">
 <head>
<!--   	<meta http-equiv="refresh" content="5"/> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AKIF CARWASH</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="akif.png" type="image/gif">
    <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">




<style>
	.foo {
  float: left;
  width: 100px;
  height: 55px;
  margin: 5px;
  border: 2px solid rgba(0, 0, 0, .2);
}

.queue {
  background: #f2dede;
}

.blue {
  background: rgba(0, 0, 0, 0.075);
}

.completed {
  background: #fcf8e3;
}

.collected {
  background: #dff0d8;
}

.unstyled-button {
  border: none;
  padding: 0;
  background: none;
}

</style>




  </head>
  <body>
<div class="limiter">
<div class="container-login100" style="background-image: url('shining-car.jpg');">
<div class="row" >

				<div class="wrap-login100 p-t-30 p-b-50">
					<form action="" method="post">
						<div class="form-group">
							 <span style="margin:auto; display:table; font-weight:bold; color: red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> NOTICE: Your password will be reseted to default password IF you manage to answer the security question correctly.</span><br>
					<label for="ic" style="color:white;">
						IC Number: <span style="color:red;">*</span>
					</label>
					<input class="form-control" name="ic" type="number" min="0" placeholder="eg: 950101305451" required>
					<label for="ic" style="color:white;">
						What was the name of the hospital that you were born? (Case-sensitive) <span style="color:red;">*</span>
					</label>
					<input class="form-control" name="question" type="text" maxlength="50" required>
					 
						</div>
						<button type="submit" onclick="location.href='loginpage.php';" class="btn btn-danger">Cancel <i class="fa fa-ban" aria-hidden="true"></i>

						</button>
						<button type="submit" name="submit" class="btn btn-info">Reset Password <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>

						</button>
				
					</form>
				</div>
			</div></body>
			<?php
include('connection/connect.php');
if(isset($_POST['submit'])){
	$ic=$_POST['ic'];
	$question=$_POST['question'];


	$sql1 = "SELECT question FROM `staff` WHERE ic='$ic'";
	$execute1=mysqli_query($connect, $sql1) or die (mysqli_error($connect));
	$row = mysqli_fetch_assoc($execute1);
	$soklan = $row ["question"];

			if($question == $soklan){
				$sql = "UPDATE `staff` SET `password`='123' WHERE `ic`='$ic'";
				$result = mysqli_query($connect, $sql);

					if(mysqli_affected_rows($connect) >0 ){
						echo '<script language="javascript">';
						echo 'alert("Password reseted to default. Please change your password once you have logged in.");';
						echo 'window.location.href="loginpage.php";';
						echo '</script>';
					}
						echo '<script language="javascript">';
						echo 'alert("You are currently using the default password.");';
						echo 'window.location.href="loginpage.php";';
						echo '</script>';

			}else{
						echo '<script language="javascript">';
						echo 'alert("Unable to reset password. Make sure your IC number and security answer is correct.");';
						echo 'window.location.href="forget.php";';
						echo '</script>';

			}
		}


	
	
	


?>
</html>